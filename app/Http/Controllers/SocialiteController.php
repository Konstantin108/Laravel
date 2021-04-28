<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Services\SocialiteService;

class SocialiteController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function init()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    /**
     * @param SocialiteService $service
     */
    public function callBack(SocialiteService $service)
    {
        $user = Socialite::driver('vkontakte')->user();
        $service->userLogin($user);

        return redirect()->route('account');
    }
}
