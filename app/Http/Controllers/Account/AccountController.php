<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(User $user)
    {
        $name  = Auth::check() ? Auth::user()->name : 'Гость';
        $isAdmin = Auth::user()->is_admin;
        return view('components.account', [
            'name' => $name,
            'isAdmin' => $isAdmin,
            'user' => $user
        ]);
    }
}
