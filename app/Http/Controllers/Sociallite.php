<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class Sociallite extends Controller
{
    public function github_redirect()
    {
        return Socialite::driver('github')->redirect();
    }
    public function github_callback()
    {
        $user = Socialite::driver('github')->user();
        User::updateOrCreate([
            'name' => $user->name,
            'email' => $user->email,
            'password' => bcrypt("github"),
            'role' => 'customer',
        ]);
        Auth::attempt(['email' => $user->email, 'password' => bcrypt("github")]);
        return Redirect('home');
    }
}
