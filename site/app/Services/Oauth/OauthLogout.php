<?php

namespace App\Services\Oauth;

use Illuminate\Support\Facades\Auth;

class OauthLogout
{
    private string $redirect;

    public function __construct($redirect = 'login')
    {
        $this->redirect = $redirect;
    }

    public function logout()
    {
        Auth::logout();
        return redirect($this->redirect);
    }
}
