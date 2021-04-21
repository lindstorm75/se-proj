<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\SocialAccount;
use App\Role;
use App\Department;

class GoogleAuthController extends Controller
{
    public function handleProviderRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $providerUser = Socialite::driver('google')->user();

        $user = $this->createOrGetUser("google", $providerUser);
        auth()->login($user);
        return redirect()->route("home");
    }

    public function createOrGetUser($provider, $providerUser)
    {
        $account = SocialAccount::whereProvider($provider)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account)
        {
            return User::where("username", $account->user_provider_id)->first();
        } else {
            $userDetail = Socialite::driver($provider)->userFromToken($providerUser->token);
            $email = !empty($providerUser->getEmail()) ? $providerUser->getEmail() : $providerUser->getId() . '@' . $provider . '.com';

            if (auth()->check())
            {
                $user = auth()->user();
            }
            else
            {
                $user = User::whereEmail($email)->first();
            }

            if (!$user)
            {
                $user = User::create([
                    'full_name' => $providerUser->getName(),
                    'username' => $providerUser->getId(),
                    'email' => $email,
                    'password' => bcrypt(rand(1000, 9999)),
                    "department_id" => Department::where("id", 1)->first()->id,
                    'image' => $providerUser->getAvatar(),
                    "role_id" => Role::where("name", "user")->first()->id,
                ]);
                $account = new SocialAccount([
                    "user_id" => $user->id,
                    'provider_user_id' => $providerUser->getId(),
                    'provider' => $provider,
                ]);
            }

            return $user;
        }
    }
}
