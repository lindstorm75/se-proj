<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoogleAuthController extends Controller
{
    public function handleProviderRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        dd($user);

        if (auth()->attempt(["email" => $user->getEmail(), "password" => "lmaofuckyou"]))
        {
            return view("dashboard");
        }
    }
}
