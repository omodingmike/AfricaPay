<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = '/admin/home';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Http\Response
     */
    public function showResetForm(Request $request, $token)
    {
        $data['page_title'] = "Reset Password";
        $tk = DB::table('admin_password_resets')->where('token',$token)->first();

        if(is_null($tk))
        {
            $notification =  array('message' => 'Token Not Found!!','alert-type' => 'warning');
            return redirect()->route('admin.password.request')->with($notification);
        }else{
            $email = $tk->email;
            return view('admin.reset.reset',$data)->with(
                ['token' => $token, 'email' => $email]
            );
        }
    }


    public function reset(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'token' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);

        $reset = DB::table('admin_password_resets')->where('token', $request->token)->orderBy('created_at', 'desc')->first();
        $user = Admin::where('email', $reset->email)->first();
        if ( $reset->status == 1)
        {
            return redirect()->route('login')->with('alert', 'Invalid Reset Link');
        }
        else
        {
            if($request->password == $request->password_confirmation)
            {
                $user->password = bcrypt($request->password);
                $user->save();

                DB::table('admin_password_resets')->where('email', $user->email)->update(['status' => 1]);

                $msg =  'Password Changed Successfully';
                send_email($user->email,'Password Changed', $user->username, $msg);
                $sms =  'Password Changed Successfully';
                send_sms($user->mobile, $sms);

                return redirect()->route('login')->with('success', 'Password Changed');
            }
            else
            {
                return back()->with('alert', 'Password Not Matched');
            }
        }

    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('admins');
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
