<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User; 

class GithubLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
    }
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback()
    {
        
        $githubUser = Socialite::driver('github')->user();

        $user = User::where('email', $githubUser->getEmail())->first();

        if (!$user) {

            $user = User::create([
                'name' => $githubUser->getName(),
                'email' => $githubUser->getEmail(),
                'password' => bcrypt('11111111'), 
            ]);
        }

        auth()->login($user);

        return redirect('/home'); 
    }
}
