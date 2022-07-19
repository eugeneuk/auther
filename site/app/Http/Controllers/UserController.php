<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        return new UserResource(Auth::user());
    }

    public function updateName(Request $request)
    {
        Auth::user()->name = $request->name;
        Auth::user()->save();

        return response()->json([
            'success' => true,
            'name' => Auth::user()->name
            ], 200);
    }

}
