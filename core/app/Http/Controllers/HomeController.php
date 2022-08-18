<?php

    namespace App\Http\Controllers;

    use App\Deposit;
    use App\Epin;
    use App\Gateway;
    use App\GeneralSettings;
    use App\Invest;
    use App\Lib\GoogleAuthenticator;
    use App\Pay\SiliconPay;
    use App\Plan;
    use App\TimeSetting;
    use App\Transection;
    use App\User;
    use App\Withdraw;
    use App\WithdrawMethod;
    use Carbon\Carbon;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Str;
    use Intervention\Image\Facades\Image;
    use PDOException;


    class HomeController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware(['auth', 'ckstatus']);
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $pt             = "User Dashboard";
            $total_deposit  = Deposit::whereUserId(Auth::id())->whereStatus(1);
            $total_withdraw = Withdraw::whereUserId(Auth::id())->whereStatus(1);
            $total_trans    = Transection::whereUserId(Auth::id());
            $total_ref_com  = Transection::whereUserId(Auth::id())->where('type', 11);

            $investes  = Invest::whereUserId(Auth::id())->get();
            $totalinin = 0;
            foreach ($investes as $inv) {
                $totalinin += $inv->interest * $inv->return_rec_time;
            }

            $total_interest = $totalinin;

            $total_ref = User::where('ref_id', Auth::id());


            return view(activeTemp() . 'home', compact('pt', 'total_deposit', 'total_withdraw', 'total_interest', 'total_trans', 'total_ref', 'total_ref_com'));
        }


        public function indexTrans()
        {
            $pt    = "Transaction Detail";
            $trans = Transection::where('user_id', Auth::id())->latest()->paginate(15);
            return view(activeTemp() . 'user.tarns', compact('pt', 'trans'));
        }

        public function refComIndex()
        {
            $pt    = " Referral Commission History";
            $trans = Transection::where('user_id', Auth::id())->latest()->where('type', 11)->paginate(15);
            return view(activeTemp() . 'user.com_history', compact('pt', 'trans'));
        }

        public function indexWithdraw()
        {
            $pt    = "Withdraw Now";
            $trans = WithdrawMethod::where('status', 1)->get();
            return view(activeTemp() . 'user.withdraw.withdraw', compact('pt', 'trans'));
        }

        public function previewWithdraw(Request $request)
        {
            $this->validate($request, [
                'gateway' => 'required',
                'amount'  => 'required|numeric|min:1'
            ]);

            $amount      = $request->amount;
            $with_method = WithdrawMethod::find($request->gateway);
            $today       = Carbon::now();
            $today->setTimezone('Africa/Nairobi');


            if ($request->amount <= Auth::user()->interest_balance && $request->amount >= $with_method->min_amo && $request->amount <= $with_method->max_amo) {
                $pt = 'Confirm Withdraw';
                return view(activeTemp() . 'user.withdraw.withdraw_preview', compact('pt', 'with_method', 'amount'));
            } else {
                return redirect()->back()->with('alert', 'Withdraw amount not in the required range');
            }


//            if (strtolower($today->dayName) !== strtolower('saturday')) {
//                return redirect()->back()->with('alert', 'Withdraws only allowed on Saturday');
//            } else {
//                if ($request->amount <= Auth::user()->interest_balance && $request->amount >= $with_method->min_amo && $request->amount <= $with_method->max_amo) {
//                    $pt = 'Confirm Withdraw';
//                    return view(activeTemp() . 'user.withdraw.withdraw_preview', compact('pt', 'with_method', 'amount'));
//                } else {
//                    return redirect()->back()->with('alert', 'Withdraw amount not in the required range');
//                }
//            }


        }

        public function storeWithdraw(Request $request, $id)
        {
            $this->validate($request, [
                'amount' => 'required',
            ]);
            $withdraw_method = WithdrawMethod::findOrFail($id);
            $our_charge      = ($request->amount * $withdraw_method->chargepc) / 100;
            $charge          = $withdraw_method->chargefx + (($request->amount * $withdraw_method->chargepc) / 100);
            $payble_amount   = $request->amount - $charge;
            $in_method_cur   = $payble_amount / $withdraw_method->rate;
            $user            = User::find(Auth::user()->id);
            if ($request->amount <= $user->interest_balance &&
                $request->amount >= $withdraw_method->min_amo && $request->amount <= $withdraw_method->max_amo) {
                $today = Carbon::now();
                $today->setTimezone('Africa/Nairobi');


//                $withdraw_amount = ($request->amount) - $our_charge;
                $withdraw_amount = ($request->amount);
                $response        = (new SiliconPay())->withdraw($withdraw_amount, $id);
                info('withdraw');
                info($response);
                if (strtolower($response['message']) == strtolower('transfer accepted')) {
                    return redirect('/withdraw')->with('message', 'Withdraw Request Success, Wait for confirmation message');
                } else {
                    return redirect('/withdraw')->with('alert', 'Something went wrong');
                }


//                if (strtolower($today->dayName) == strtolower('saturday')) {
//                    $withdraw_amount = ($request->amount) - $our_charge;
//                    $response        = (new SiliconPay())->withdraw($withdraw_amount, $id);
//                    info('withdraw');
//                    info($response);
//                    if (strtolower($response['message']) == strtolower('transfer accepted')) {
//                        return redirect('/withdraw')->with('message', 'Withdraw Request Success, Wait for confirmation message');
//                    } else {
//                        return redirect('/withdraw')->with('alert', 'Something went wrong');
//                    }
//                } else {
//                    return redirect()->back()->with('alert', 'Withdraws only allowed on Saturday');
//                }

            } else {

                return redirect()->back()->with('alert', 'Withdraw amount not in the required range');
            }
        }

        public function historyWithdraw()
        {
            $pt    = "Withdraw History";
            $trans = Withdraw::where('user_id', Auth::id())->latest()->paginate(15);
            return view(activeTemp() . 'user.withdraw.history', compact('pt', 'trans'));
        }

        public function accountIndex()
        {
            $pt = "Account Settings";
            return view(activeTemp() . 'user.profile', compact('pt'));
        }

        public function accountUpdate(Request $request)
        {
            $this->validate($request, [
                'name'    => 'required',
                'email'   => 'required',
                'country' => 'required',
                'mobile'  => 'required',
            ]);

            $input['name']    = $request->name;
            $input['email']   = $request->email;
            $input['mobile']  = $request->mobile;
            $input['country'] = $request->country;

            User::whereId(Auth::id())->update($input);
            return back()->with('message', 'Update Successfully');
        }

        public function deposit()
        {
            $pt      = 'Deposit Methods';
            $gates   = Gateway::where('status', 1)->get();
            $deposit = Deposit::where('user_id', Auth::id())->orderBy('id', 'DESC')->where('status', 1)->paginate(15);
            return view(activeTemp() . 'user.deposit', compact('pt', 'gates', 'deposit'));
        }

        public function depositHistory()
        {
            $data['pt']      = 'Deposit History';
            $data['deposit'] = Deposit::where('user_id', Auth::id())->orderBy('id', 'DESC')->where('status', 1)->paginate(15);
            return view(activeTemp() . 'user.deposit_history', $data);
        }

        public function depositDataInsert(Request $request)
        : RedirectResponse
        {
            $this->validate($request, ['amount' => 'required|numeric', 'gateway' => 'required']);

            if ($request->amount <= 0) {
                return back()->with('alert', 'Invalid Amount');
            } else {
                //                $gateway = Gateway::findOrFail($request->gateway);
                $gateway = Gateway::where('name', 'Mobile Money')->first();
                if (isset($gateway)) {
                    if ($gateway->minamo <= $request->amount && $gateway->maxamo >= $request->amount) {

                        $charge = $gateway->fixed_charge + ($request->amount * $gateway->percent_charge / 100);
                        $usdamo = ($request->amount + $charge) / $gateway->rate;

                        $deposit['user_id']    = Auth::id();
                        $deposit['gateway_id'] = $gateway->id;
                        $deposit['amount']     = $request->amount;
                        $deposit['charge']     = $charge;
                        $deposit['usd_amo']    = round($usdamo, 2);
                        $deposit['btc_amo']    = 0;
                        $deposit['btc_wallet'] = '';
//                    $depo['trx']        = $this->str_random(16);
                        $deposit['trx']    = Str::random(16);
                        $deposit['try']    = 0;
                        $deposit['status'] = 0;
                        Deposit::create($deposit);

                        Session::put('Track', $deposit['trx']);

                        return redirect()->route('deposit.preview');
                    } else {
                        return back()->with('alert', 'Please Follow Deposit Limit');
                    }
                } else {
                    return back()->with('alert', 'Please Select Deposit gateway');
                }
            }
        }

        public function depositPreview()
        {
            $track = Session::get('Track');
            session()->forget('pranto');
            $data = Deposit::where('status', 0)->where('trx', $track)->first();
            $pt   = 'Deposit Preview';

            return view(activeTemp() . 'user.payment.preview', compact('pt', 'data'));
        }

        public function depositConfirm(Request $request)
        {
            $response = SiliconPay::pay($request->amount, $request->reference);
            if (strtolower($response['status']) == strtolower('Successful')) {
                return redirect('home')->with('success', $response['message']);
            } else {
                return redirect('/deposit')->with('alert', 'Something went wrong');
            }
        }


        public function indexPlan()
        {
            $pt    = 'Investment Plans';
            $gates = Plan::where('status', 1)->get();
            return view(activeTemp() . 'user.plan', compact('pt', 'gates'));
        }


        public function buyPlan(Request $request)
        {
            $request->validate([
                'amount'      => 'required|numeric|min:0',
                'plan_id'     => 'required',
                'wallet_type' => 'required',
            ]);


            $user = User::find(Auth::id());

            $plan = Plan::findOrFail($request->plan_id);


            if ($plan->fixed_amount == 0) {
                if ($request->amount < $plan->minimum || $request->amount > $plan->maximum) {
                    return back()->with('alert', 'Please Follow The Invest Range');
                }
            } else {
                if ($request->amount > $plan->fixed_amount) {
                    return back()->with('alert', 'Please Follow The Invest Range');
                }
            }

            if ($request->wallet_type == 1) {
                $wallet_bal = $user->balance;
            } elseif ($request->wallet_type == 2) {
                $wallet_bal = $user->interest_balance;
            } else {
                return back()->with('alert', 'Invalide Wallet Selection');
            }


            if ($request->amount > $wallet_bal) {
                return back()->with('alert', 'Insufficient Balance');
            }


            if ($request->wallet_type == 1) {
                $new_balance   = $user->balance - $request->amount;
                $user->balance = $new_balance;
            } else {
                $new_balance            = $user->interest_balance - $request->amount;
                $user->interest_balance = $new_balance;
            }

            $user->save();


            $gnl       = GeneralSettings::first();
            $time_name = TimeSetting::where('time', $plan->times)->first();
            $now       = Carbon::now();

            Transection::create([
                'trxid'   => 'TRX-' . rand(1000, 9999),
                'user_id' => $user->id,
                'des'     => 'Invested On ' . $plan->name,
                'amount'  => '-' . $request->amount,
                'balance' => round($new_balance, 4)
            ]);


            //start
            if ($plan->interest_status == 1) {
                $interest_amount = ($request->amount * $plan->interest) / 100;
            } else {
                $interest_amount = $plan->interest;
            }

            if ($plan->lifetime_status == 1) {
                $period = '-1';
            } else {
                $period = $plan->repeat_time;
            }
            //end


            $invest['user_id']        = $user->id;
            $invest['plan_id']        = $plan->id;
            $invest['amount']         = $request->amount;
            $invest['interest']       = $interest_amount;
            $invest['period']         = $period;
            $invest['time_name']      = $time_name->name;
            $invest['hours']          = $plan->times;
            $invest['next_time']      = Carbon::parse($now)->addHours($plan->times);
            $invest['status']         = 1;
            $invest['capital_status'] = $plan->capital_back_status;
            $a                        = Invest::create($invest);

            levelCommision($user->id, $request->amount);

            $message = "Congratulation, Successfully Invest complete. You invest " . $request->amount . ' ' . $gnl->currency . ' And you will get ' .
                $interest_amount . ' ' . $gnl->currency . ' interest.';
            send_email($user->email, $user->name, 'Invest Complete', $message);
            send_sms($user->mobile, $message);

            Session::flash('success', 'Package Purchased Successfully Complete');
            return back();
        }

        public function interestLog()
        {
            $pt    = 'Interest Log';
            $trans = Invest::where('user_id', Auth::id())->latest()->paginate(15);
            return view(activeTemp() . 'user.interest_log', compact('pt', 'trans'));
        }

        public function indexTransfer()
        {
            $pt = 'Balance Transfer';
            return view(activeTemp() . 'user.balance_tranfer', compact('pt'));
        }

        public function balTransfer(Request $request)
        {
            $this->validate($request, [
                'wallet_id' => 'required',
                'username'  => 'required',
                'amount'    => 'required|numeric|min:0',
            ]);


            // wallet_id 1 = deposit & 2 = interest wallet
            $gnl  = GeneralSettings::first();
            $user = User::find(Auth::id());

            $trans_user = User::where('username', $request->username)->orwhere('email', $request->username)->first();

            if ($trans_user == '') {
                return back()->with('alert', 'Username Not Found');
            }

            if ($trans_user->username == $user->username) {
                return back()->with('alert', 'Balance Transfer Not Possible In Your Own Account');
            }


            if ($request->wallet_id == 1) {
                $balance = $user->balance;
            } elseif ($request->wallet_id == 2) {
                $balance = $user->interest_balance;
            } else {
                return back()->with('alert', 'Invalide Wallet');
            }

            $charge = $gnl->bal_trans_fixed_charge + ($request->amount * $gnl->bal_trans_per_charge) / 100;
            $amount = $request->amount + $charge;

            if ($balance < $amount) {
                return back()->with('alert', 'Insufficient Balance');
            }

            if ($request->wallet_id == 1) {
                $new_balance   = $user->balance - $amount;
                $user->balance = $new_balance;
            } else {
                $new_balance            = $user->interest_balance - $amount;
                $user->interest_balance = $new_balance;
            }
            Transection::create([
                'trxid'   => 'TRX-' . rand(1000, 9999),
                'user_id' => $user->id,
                'des'     => 'Balance Transfer To ' . $trans_user->name,
                'amount'  => '-' . $request->amount,
                'balance' => round($new_balance, 4),
                'charge'  => $charge
            ]);
            $message = "Balance transferred successfully complete. You send " . $request->amount . '' . $gnl->currency . " to " . $trans_user->name . '<br>' .
                "And charge to transfer " . $charge . ' ' . $gnl->currency . ".Your current balance is " . $new_balance . ' ' . $gnl->currency;
            send_email($user->email, $user->name, 'Balance Transfer', $message);
            send_sms($user->mobile, $message);
            $user->save();

            $trans_new_bal       = $trans_user->balance + $request->amount;
            $trans_user->balance = $trans_new_bal;

            Transection::create([
                'trxid'   => 'TRX-' . rand(1000, 9999),
                'user_id' => $trans_user->id,
                'des'     => 'Balance Received From ' . $user->name,
                'amount'  => '-' . $request->amount,
                'balance' => round($new_balance, 4),
                'charge'  => $charge
            ]);

            $message = "Balance received successfully. You got " . $request->amount . '' . $gnl->currency . " from " . $user->name . '<br>' . ".Your current balance is " . $trans_new_bal . ' ' . $gnl->currency;
            send_email($user->email, $user->name, 'Balance Received', $message);
            send_sms($user->mobile, $message);

            $trans_user->save();
            return back()->with('message', 'Balance Transferred Successfully');
        }

        public function searchUser(Request $request)
        {
            $trans_user = User::where('id', '!=', Auth::id())->where('username', $request->username)->orwhere('email', $request->username)->count();

            if ($trans_user == 1) {
                return response()->json(['success' => true, 'message' => 'Correct User']);
            } else {
                return response()->json(['success' => false, 'message' => 'User Not Found']);
            }
        }

        public function twoFactorIndex()
        {
            $pt     = '2FA Security';
            $gnl    = GeneralSettings::first();
            $ga     = new GoogleAuthenticator();
            $secret = $ga->createSecret();

            $qrCodeUrl = $ga->getQRCodeGoogleUrl(Auth::user()->username . '@' . $_SERVER['HTTP_HOST'], $secret);
            $prevcode  = Auth::user()->secretcode;
            $prevqr    = $ga->getQRCodeGoogleUrl(Auth::user()->username . '@' . $_SERVER['HTTP_HOST'], $prevcode);

            return view(activeTemp() . 'user.two_factor', compact('secret', 'qrCodeUrl', 'prevcode', 'prevqr', 'pt'));
        }

        public function disable2fa(Request $request)
        {
            $this->validate($request, [
                'code' => 'required',
            ]);

            $user = User::find(Auth::id());
            $ga   = new GoogleAuthenticator();

            $secret   = $user->secretcode;
            $oneCode  = $ga->getCode($secret);
            $userCode = $request->code;

            if ($oneCode == $userCode) {
                $user               = User::find(Auth::id());
                $user['tauth']      = 0;
                $user['tfver']      = 1;
                $user['secretcode'] = '0';
                $user->save();

                $message = 'Google Two Factor Authentication Disabled Successfully';
                send_email($user['email'], $user->name, 'Google 2FA', $message);


                $sms = 'Google Two Factor Authentication Disabled Successfully';
                send_sms($user->mobile, $sms);

                return back()->with('message', 'Two Factor Authenticator Disable Successfully');
            } else {
                return back()->with('alert', 'Wrong Verification Code');
            }
        }

        public function create2fa(Request $request)
        {
            $user = User::find(Auth::id());
            $this->validate($request, [
                'key'  => 'required',
                'code' => 'required',
            ]);

            $ga = new GoogleAuthenticator();

            $secret   = $request->key;
            $oneCode  = $ga->getCode($secret);
            $userCode = $request->code;
            if ($oneCode == $userCode) {
                $user['secretcode'] = $request->key;
                $user['tauth']      = 1;
                $user['tfver']      = 1;
                $user->save();

                $message = 'Google Two Factor Authentication Enabled Successfully';
                send_email($user['email'], $user->name, 'Google 2FA', $message);


                $sms = 'Google Two Factor Authentication Enabled Successfully';
                send_sms($user->mobile, $sms);

                return back()->with('message', 'Google Authenticator Enabeled Successfully');
            } else {
                return back()->with('alert', 'Wrong Verification Code');
            }
        }

        public function checkTwoFactor(Request $request)
        {
            $user = User::find(Auth::id());

            $validate = Validator::make($request->all(), [
                'code' => 'required',
            ]);

            if ($validate->fails()) {
                return response(['errors' => $validate->errors()]);
            }

            $ga       = new GoogleAuthenticator();
            $secret   = $user->secretcode;
            $oneCode  = $ga->getCode($secret);
            $userCode = $request->code;

            if ($oneCode == $userCode) {
                return response()->json(['success' => true, 'message' => "ok"]);
            } else {
                return response()->json(['success' => false, 'message' => "Wrong Verification Code"]);
            }
        }


        public function passwordChange(Request $request)
        {
            $this->validate($request, [
                'passwordold' => 'required',
                'password'    => 'required|min:5|confirmed'
            ]);

            try {
                $c_password = User::find($request->id)->password;
                $c_id       = User::find($request->id)->id;
                $user       = User::findOrFail($c_id);

                if (Hash::check($request->passwordold, $c_password)) {

                    $password       = Hash::make($request->password);
                    $user->password = $password;
                    $user->save();

                    return redirect()->back()->with('message', 'Password Change Successfully.');
                } else {
                    session()->flash('alert', 'Password Not Match');
                    Session::flash('type', 'warning');
                    return redirect()->back();
                }
            } catch (PDOException $e) {
                session()->flash('message', 'Some Problem Occurs, Please Try Again!');
                Session::flash('type', 'warning');
                return redirect()->back();
            }
        }


        public function pinRecharge()
        {
            $pt = 'Recharege Wallet With E-PIN ';
            return view(activeTemp() . 'user.pinRecharge', compact('pt'));
        }


        public function pinRechargePost(Request $request)
        {
            $this->validate($request, [
                'pin' => 'required'
            ]);

            $pin = Epin::where('pin', $request->pin)->first();

            if ($pin == '') {
                return redirect()->back()->with('alert', 'Wrong Pin.');
            }
            if ($pin->status == 2) {
                return redirect()->back()->with('alert', 'Already Used.');
            }
            if ($pin->status == 1) {
                $pin->status  = 2;
                $pin->user_id = Auth::id();
                $pin->save();

                $user          = User::find(Auth::id());
                $new_balance   = $user->balance + $pin->amount;
                $user->balance = $new_balance;
                $user->save();

                $tlog['user_id'] = $user->id;
                $tlog['amount']  = $pin->amount;
                $tlog['balance'] = $user->balance;
                $tlog['des']     = 'E-Pin Recharge';
                $tlog['trxid']   = Str::random(16);
                Transection::create($tlog);
                return redirect()->back()->with('success', 'Balance Added Successfully.');
            }
        }

        public function depositBankPranto()
        {
            $track = Session::get('Track');

            if ($track != '') {
                $data   = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
                $method = Gateway::find($data->gateway_id);
                $pt     = "Deposit Now";
                return view(activeTemp() . 'user.bank_deposite', compact('method', 'data', 'pt'));
            }

            return redirect('home')->with('alert', 'Session Expired Please Try Again');
        }

        public function depositBankSubmit(Request $request)
        {
            $this->validate($request, [
                'detail' => 'required',
                'image'  => 'required|mimes:png,jpg,jpeg',
            ]);
            $track    = Session::get('Track');
            $data     = Deposit::find($request->data_id);
            $data_one = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
            if ($data->trx == $data_one->trx) {

                if ($request->hasFile('image')) {
                    $image    = $request->file('image');
                    $filename = time() . '.' . 'jpg';
                    $location = 'assets/images/deposit_prove/' . $filename;
                    Image::make($image)->save($location);
                    $data->image = $filename;
                }
                $data->detail = $request->detail;
                $data->save();


                return redirect('/home')->with('success', 'Submitted Successfully, Wait for confirmation');
            }
            return redirect()->back()->with('alert', 'Wrong Try');
        }

        public function refMy()
        {
            $pt = "My Referral";
            return view(activeTemp() . 'user.my_referral', compact('pt'));
        }


    }
