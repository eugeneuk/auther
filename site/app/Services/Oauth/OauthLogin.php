<?php
namespace App\Services\Oauth;

use Illuminate\Support\Facades\Auth;

class OauthLogin
{
    public string $message = 'Wrong credentials';
    private array $credentials;


    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    public function auth()
    {
        if (!Auth::attempt($this->credentials))
            return response()->json(
                ['error' => $this->message],
                202
            );

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return json_encode([
            'access_token' => $accessToken,
            'user' => Auth::user()->toArray()
        ]);
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }




}
