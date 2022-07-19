<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class TestController extends Controller
{
    public function index()
    {
        //$role = Role::create(['name' => 'admin']);
        $user = User::find(4);
        $user->assignRole('admin');
        $users = User::role('admin')->get();
        dd($users);

    }
}
