<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use App\User;
use Auth;

class UserController extends Controller
{

    public function init(){
        $user = Auth::user();
        
        return response()->json(['user' => $user], 200);
        // return response()->json(csrf_token());
    }

    public function register(Request $request)
    {
        $rules = [
            'IM_no' => 'required|unique:users',
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'phone' => 'required|min:8|max:10|regex:/^[0-9]+$/|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required',
            'photo' => 'required',
            'designation' => 'required',
            'classification' => 'required',
            'company' => 'required',
            'blood_group' => 'required',
            'company' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        if($request->hasFile('photo')) {
            $file = $request->photo;
            //Get file name with the extension
            $fileNameWithExt = $file->getClientOriginalName();
            // echo $fileNameWithExt;

            //Get just Filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just Extension
            $extension = $file->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            Storage::disk('local')->putFileAs('profile_pics', $file, $fileNameToStore);
        }

        $user = User::create([
            'IM_no' => $request->input('IM_no'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => (new BcryptHasher)->make($request->input('password')),
            'gender' => $request->input('gender'),
            'photo' => $fileNameToStore,
            'designation' => $request->input('designation'),
            'classification' => $request->input('classification'),
            'company' => $request->input('company'),
            'blood_group' => $request->input('blood_group'),
            'api_token' => Str::random(60),
        ]);

        return response()->json(["message" => "User created succesfully"], 201);
    }

    public function logout(Request $request)
    {
        $rules = [
            'api_token' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $api_token = $request->api_token;
        $user = User::where('api_token', $api_token)->first();

        if(is_null($user)){
            return response()->json(['status' => 'error', 'messege' => 'Not Logged in'], 401);
        }

        $user->api_token = null;
        $user->save();
        return response()->json(['status' => 'success', 'messege' => 'Logged out'], 200);
    }

    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(["message" => "User not found"], 404);
        }
        return $user;
    }

    public function updateUser(Request $request)
    {
        $rules = [
            'api_token' => 'required',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $api_token = $request->api_token;
        $user = User::where('api_token', $api_token)->first();
        
        if(is_null($user)){
            return response()->json(['status' => 'error', 'messege' => 'User not found'], 401);
        }

        if($request->hasFile('photo')) {
            $file = $request->photo;
            //Get file name with the extension
            $fileNameWithExt = $file->getClientOriginalName();
            // echo $fileNameWithExt;

            //Get just Filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just Extension
            $extension = $file->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            Storage::disk('local')->putFileAs('profile_pics', $file, $fileNameToStore);
            $user->photo = $fileNameToStore;
        }

        $user->IM_no = ( empty($request->get('IM_no')) ) ? $user->IM_no : $request->get('IM_no');
        $user->name = ( empty($request->get('name')) ) ? $user->name : $request->get('name');
        $user->phone = ( empty($request->get('phone')) ) ? $user->phone : $request->get('phone');
        $user->email =   ( empty($request->get('email')) ) ? $user->email : $request->get('email');
        $user->gender = ( empty($request->get('gender')) ) ? $user->gender : $request->get('gender');
        $user->designation = ( empty($request->get('designation')) ) ? $user->designation : $request->get('designation');
        $user->classification = ( empty($request->get('classification')) ) ? $user->classification : $request->get('classification');
        $user->company = ( empty($request->get('company')) ) ? $user->company : $request->get('company');
        $user->blood_group = ( empty($request->get('blood_group')) ) ? $user->blood_group : $request->get('blood_group');

        // $user->api_token = Str::random(60);
        $user->save();
        
        return response()->json(['status' => 'success', 'messege' => 'User updated'], 200);
    }

    public function search(Request $request)
    {
        $rules = [
            'term' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $term = $request->get('term');
        $users = User::where('phone', $term)
                        ->orWhere('name', $term)
                        ->orWhere('email', $term)
                        ->orWhere('designation', $term)
                        ->orWhere('classification', $term)
                        ->orWhere('company', $term)->get();
        return $users;
    }

    public function members(){
        $users = User::all();
        return response()->json(["users" => $users], 200);
    }

}
