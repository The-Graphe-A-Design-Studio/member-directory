<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
use App\User;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request) {
<<<<<<< HEAD
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
=======
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
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
        }

        $user = User::create([
            'IM_no' => $request->input('IM_no'),
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => (new BcryptHasher)->make($request->input('password')),
            'gender' => $request->input('gender'),
<<<<<<< HEAD
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
=======
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
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
