<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AdminLoginController extends Controller
{
    public function login(Request $request) {
        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(!Auth::guard('admin')->attempt($login)){
            return response(['message' => 'Invalid login credentials']);
        }

        $accessToken = Auth::guard('admin')->user()->createToken('authToken')->accessToken;
        return response()->json(['admin' => Auth::guard('admin')->user(), 'access_token' => $accessToken]);
    }
}