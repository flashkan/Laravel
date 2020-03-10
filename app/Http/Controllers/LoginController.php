<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function loginVK()
    {
        return $this->login('vkontakte');
    }

    public function responseVK(UserRepository $userRepository)
    {
        return $this->response($userRepository, 'vkontakte');
    }

    public function loginFB()
    {
        return $this->login('facebook');
    }

    public function responseFB(UserRepository $userRepository)
    {
        return $this->response($userRepository, 'facebook');
    }

    public function login($socName)
    {
        session()->get('soc.token');
        if (Auth::id()) {
            return redirect()->route('home');
        }
        return Socialite::with($socName)->redirect();
    }

    public function response(UserRepository $userRepository, $socName)
    {
        if (Auth::id()) {
            return redirect()->route('home');
        }
        $user = Socialite::driver($socName)->user();
        session(['soc.token' => $user->token]);
        $userInSystem = $userRepository->getUserBySocId($user, $socName);
        if (!empty($userInSystem['massage'])) {
            return redirect()->route('home')->with('success', $userInSystem['massage']);
        }
        Auth::login($userInSystem);
        return redirect()->route('home');
    }
}
