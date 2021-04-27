<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __invoke()
    {
        $name  = Auth::check() ? Auth::user()->name : 'Гость';
        $isAdmin = Auth::user()->is_admin;
        return view('components.account', [
            'name' => $name,
            'isAdmin' => $isAdmin
        ]);
    }
}
