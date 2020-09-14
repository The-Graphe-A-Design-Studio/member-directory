<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request) {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response(['errors' => $validator->errors()]);
        }

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $err = array('message' => ['Invalid login credentials']);
            return response(['errors' => $err]);
        }

        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response()->json(['user' => Auth::user(), 'access_token' => $accessToken]);
    }

    public function register(Request $request) {
        // return $request->all();
        // return $this->validate($request, [
        // $request->validate([
        $rules = [
            'IM_no' => 'required|unique:users',
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'dob' => 'required',
            'phone' => 'required|min:8|max:10|regex:/^[0-9]+$/|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required',
            'designation' => 'required',
            'classification' => 'required',
            'company' => 'required',
            'blood_group' => 'required',
            'company' => 'required',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response(['errors' => $validator->errors()]);
        }

        $user = User::create([
            'IM_no' => $request->input('IM_no'),
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => (new BcryptHasher)->make($request->input('password')),
            'gender' => $request->input('gender'),
            'designation' => $request->input('designation'),
            'classification' => $request->input('classification'),
            'company' => $request->input('company'),
            'blood_group' => $request->input('blood_group'),
        ]);

        if(!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response(['message' => 'Invalid login credentials']);
        }
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response()->json(['user' => Auth::user(), 'access_token' => $accessToken]);
    }
}
