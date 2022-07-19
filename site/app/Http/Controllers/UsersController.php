<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        return response()->json([
            'users' => User::all(),
            'status' => 'success'
        ], 200);
    }
}
