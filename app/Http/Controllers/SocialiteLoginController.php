<?php

namespace App\Http\Controllers;

use App\Models\SocialiteLogin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteLoginController extends Controller
{
    //
/*    public function facebooklogin()
    {
        return Socialite::driver('facebook')->redirect();
    }*/

    public function redirectToGit(){
        return Socialite::driver('github')->redirect();
    }
    public function redirectToGoogle(){ //redirects to google via socialite
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $socialiteUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            ['email' => $socialiteUser->getEmail(),
            ],
            ['name' => $socialiteUser->getName(),
            ]
        );
        SocialiteLogin::firstOrCreate(
            [
                'user_id' => $user->id,
                'provider' => 'google',
            ],
            [
                'provider_id' => $socialiteUser->getId()
            ]
        );
        auth()->login($user);
        return redirect(Request::session()->get('url.intended') ?? '/admin') ;



    }
    public function handleGitCallback(){
        $socialiteUser = Socialite::driver('github')->user();

        $user = User::firstOrCreate(
            ['email' => $socialiteUser->getEmail(),
            ],
            ['name' => $socialiteUser->getName(),
            ]
        );
        SocialiteLogin::firstOrCreate(
            [
                'user_id' => $user->id,
                'provider' => 'github',
            ],
            [
                'provider_id' => $socialiteUser->getId()
            ]
        );
        auth()->login($user);
        return redirect(Request::session()->get('url.intended') ?? '/admin') ;

    }

}
