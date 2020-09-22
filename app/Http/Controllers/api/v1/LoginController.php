<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request) {
        $login = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        if(!Auth::attempt($login)){
            return response()->json(['status' => 'success', 'messege' => 'Invalid login credentials'], 200);
        }
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response()->json(['member' => Auth::user(), 'token' => $accessToken], 200);
    }

    public function reg(Request $request) {
        $rules = [
            'IM_no' => 'required|regex:/^[A-Za-z0-9 ]+$/',
            'name' => 'required|regex:/^[A-Za-z ]+$/',
            'dob' => 'required|date',
            'phone' => 'required|unique:users|min:10|max:10|regex:/^[0-9]+$/',
            'email' => 'required|unique:users|email',
            'password' => 'required|regex:/^[A-Za-z0-9 ]+$/',
            'gender' => 'required|in:Male,Female,Others',
            'club_name' => 'required|regex:/^[A-Za-z0-9 ]+$/',
            'designation' => 'required|regex:/^[A-Za-z0-9 ]+$/',
            'occupation' => 'required|regex:/^[A-Za-z0-9 ]+$/',
            'blood_group' => 'required|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'sponsorer' => 'required|regex:/^[A-Za-z0-9 ]+$/',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'IM_no' => $request->input('IM_no'),
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => (new BcryptHasher)->make($request->input('password')),
            'gender' => $request->input('gender'),
            'club_name' => $request->input('club_name'),
            'designation' => $request->input('designation'),
            'occupation' => $request->input('occupation'),
            'blood_group' => $request->input('blood_group'),
            'sponsorer' => $request->input('sponsorer'),
            'leo' => 1,
            'status' => 0,
        ]);

        if(!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            return response()->json(['status' => 'success', 'messege' => 'Invalid login credentials'], 200);
        }
        $accessToken = Auth::user()->createToken('authToken')->accessToken;
        return response()->json(['member' => Auth::user(), 'token' => $accessToken], 200);
    }
}
