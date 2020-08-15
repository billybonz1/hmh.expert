<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

class RegisterController extends AuthController
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
     * Handle a registration request for the application.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function register()
    {
        User::$rules['born_at'] = ['required', 'date'];
        User::$rules['country'] = ['required'];
        User::$rules['captcha'] = ['required', 'captcha'];
        User::$rules['cellphone'] = [];
        User::$rules['nickname'] = ['required', 'string', 'unique:users'];
        
        
        
        $attributes = request()->validate(User::$rules);

        event(new Registered($user = $this->create($attributes)));

        Auth::guard()->login($user);

        $this->logLogin(request(), 'registered');

        log_activity('User Registered', $user->fullname . ' registered as a new user.', $user);

        return redirect()->intended('/');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'nickname' => $data['nickname'],
            // 'cellphone' => $data['cellphone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'confirmation_token' => 'confirmation_token',
        ]);
        
        $user->lastname = $data['lastname'];
        $user->country = $data['country'];
        if(isset($data['city'])){
            $user->city = $data['city'];
        }
        $user->born_at = $data['born_at'];
        $user->save();
        $user->attachRole("user");
        return $user;
    }
    
    protected function refreshCaptcha(){
        return response()->json(['captcha' => captcha_img()]);
    }
}
