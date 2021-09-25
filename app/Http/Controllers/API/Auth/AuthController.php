<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:25',
            'email' => 'email|required | unique:users',
            'password' => 'required | confirmed',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save;

        return response()->json($user, 201);
    }
}
