<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Отоборажает главную страницу новостей. Со всеми новостями.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all()
    {
        $users = User::query()->where('id', '!=', Auth::id())->get();
        return view('profile', ["users" => $users]);
    }

    public function toggle(User $user)
    {
        $user->is_admin = !$user->is_admin;
        $user->save();
        return redirect()->route('profile.all');
    }
}
