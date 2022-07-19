<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Oauth\OauthLogin;
use App\Services\Oauth\OauthLogout;


class LoginController extends Controller
{
    /*
     * Post Login
     */
    public function login(LoginRequest $request)
    {
        return (new OauthLogin($request->only('email', 'password')))->auth();
    }

    /*
     * Post Logout
     */
    public function logout()
    {
        return (new OauthLogout())->logout();
    }

    /*
     * Get Login
     */
    public function getLogin()
    {
        return response()->json([
            'error' => 'please login'
        ], 403);
    }


}
