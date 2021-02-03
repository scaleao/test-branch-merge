<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        if($user){
            $user->accessToken = $user->createToken('authToken')->accessToken;
            return response()->json($user);
        }
    }
}
