<?php

namespace App\Http\Controllers\Auth;

use App\GeneralSettings;
use App\User;
use App\Http\Controllers\Controller;
use App\WithdrawMethod;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public function showRegistrationForm()
    {
        $pt = "Sign Up";
        $withdraw = WithdrawMethod::whereStatus(1)->get();
        return view(activeTemp().'auth.register',compact('pt', 'withdraw'));
    }

    public function showRegistrationFormRef($username)
    {
        $ref_user = User::where('username', $username)->first();
        if (isset($ref_user))
        {
            $pt = "Sign Up";
            $withdraw = WithdrawMethod::whereStatus(1)->get();
            return view(activeTemp().'auth.register',compact('pt', 'withdraw', 'ref_user'));
        }else{
            return redirect()->route('register');
        }

    }


    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|unique:users|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $gnl = GeneralSettings::first();

        if ($gnl->emailver == 1){
            $e = 0;
        }else{
            $e = 1;
        }
        if ($gnl->smsver == 1){
            $s = 0;
        }else{
            $s = 1;

        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'mobile' => $data['mobile'],
            'country' => $data['country'],
            'ref_id' => $data['ref_id'],
            'status' => 1,
            'balance' => '0',
            'emailv' =>  $e,
            'smsv' =>  $s,
        ]);
    }
}
