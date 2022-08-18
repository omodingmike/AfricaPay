<?php

namespace App\Http\Controllers\Auth;

use App\GeneralSettings;
use App\Http\Controllers\Controller;
use App\User;
use App\WithdrawMethod;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */



    public function showLoginForm()
    {
        $pt = "Sign In";
        $withdraw = WithdrawMethod::whereStatus(1)->get();
        return view(activeTemp().'auth.login', compact('pt', 'withdraw'));
    }


    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */




    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {


        $this->validateLogin($request);


        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    public function username()
    {
        return 'username';
    }

    public function logout(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        if(Auth::user()->tauth==1)
        {
            $user['tfver'] = 0;
        }else{
            $user['tfver'] = 1;

        }
        $user->save();


        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/login');
    }

    public function redirectToProvider($provider)
    {
        $gnl = GeneralSettings::first();
        if ($provider == 'facebook'){

        Config::set('services.'.$provider,[
            'client_id' => $gnl->fb_client_id,
            'client_secret' => $gnl->fb_client_secret,
            'redirect' => url('/').'/login/facebook/callback',
        ]);

            return Socialite::driver('facebook')->redirect();

        }elseif ($provider == 'google'){

            Config::set('services.'.$provider,[
                'client_id' => $gnl->google_client_id,
                'client_secret' => $gnl->google_client_secret,
                'redirect' => url('/').'/login/google/callback',
            ]);
            return Socialite::driver('google')->redirect();

        }else{
            return back()->with('alert','Something Wrong');
        }

    }


    public function handleProviderCallback($provider)
    {

        $gnl = GeneralSettings::first();

        if ($provider == 'facebook'){

            Config::set('services.'.$provider,[
                'client_id' => $gnl->fb_client_id,
                'client_secret' => $gnl->fb_client_secret,
                'redirect' => url('/').'/login/facebook/callback',
            ]);
            $user = Socialite::driver('facebook')->user();

        }elseif ($provider == 'google'){

            Config::set('services.'.$provider,[
                'client_id' => $gnl->google_client_id,
                'client_secret' => $gnl->google_client_secret,
                'redirect' => url('/').'/login/google/callback',
            ]);
            $user = Socialite::driver('google')->user();
        }


        $exist = User::where('provider',$provider)->where('provider_id', $user->id)->first();


        if ($exist){
            Auth::login($exist);
            return redirect()->route('home');

        }else{
            $new = User::create([
                'name' => $user->name,
                'email' => isset($user->email)? $user->email:$user->id . '@' . $provider,
                'password' => Hash::make($provider),
                'username' => isset($user->email)? explode('@',$user->email)[0] :$user->id ,
                'provider' => $provider,
                'provider_id' => $user->id,
                'status' => 1,
                'balance' => 0,
                'tauth' => 0,
                'tfver' => 1,
                'emailv' =>  1,
                'smsv' =>  1,
            ]);
            Auth::login($new);
            return redirect()->route('home');

        }


    }
}
