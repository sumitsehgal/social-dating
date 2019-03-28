<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon as Carbon;
use Socialite;
use App\User;

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
    protected $redirectTo = '/home';

    public function socialLogin($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social)
   {
       $userSocial = Socialite::driver($social)->user();
       $user = User::where(['email' => $userSocial->getEmail()])->first();
       if($user)
       { 
            $user->update([
                'avatar' => $userSocial->avatar,
                'provider' => $social,
                'provider_id' => $userSocial->id,
                'access_token' => $userSocial->token
            ]);
           Auth::login($user);
       }
       else
       {
            $dateTime = Carbon::now();
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'avatar' => $userSocial->getAvatar(),
                'provider' => $social,
                'provider_id' => $userSocial->getId(),
                'access_token' => $userSocial->token,
                'email_verified_at' => $dateTime->toDateTimeString(),
                // user can use reset password to create a password
                'password' => ''
            ]);
            // ToDo : Password Change Notification IF Blank
            Auth::login($user);
       }

        if($user->role == User::ROLE_ADMIN){
            return redirect()->route('dashboard') ;
            exit;
        }

       return redirect($this->redirectTo);
   }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
