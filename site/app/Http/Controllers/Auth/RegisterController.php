<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = $this->createUser($request);
        Auth::login($user);

        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        return json_encode([
            'access_token' => $accessToken,
            'user' => new UserResource($user)
        ]);
    }

    protected function createUser($request)
    {
        $user = new User();
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();
        return $user;
    }
}
