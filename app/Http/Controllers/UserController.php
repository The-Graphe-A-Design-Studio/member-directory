<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'IM_no' => 'required|unique:users',
            'name' => 'required',
            'phone' => 'required|max:13|unique:users',
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
        $api_token = $request->api_token;
        $user = User::where('api_token', $api_token)->first();

        if(!$user){
            return response()->json(['status' => 'error', 'messege' => 'Not Logged in'], 401);
        }

        $user->api_token = null;
        $user->save();
        return response()->json(['status' => 'success', 'messege' => 'Logged out'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(is_null($user)){
            return response()->json(["message" => "User not found"], 404);
        }
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function regapp(Request $request)
    {

        $this->validate($request, [
            'IM_no' => 'required',
            'name' => 'required|regex:/^[A-Za-z ]+$/',
            'phone' => 'required|min:8|max:10|unique:users|regex:/^[0-9]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required|regex:/^[^\W_]+$/|min:8|max:13',
            'gender' => 'required',
            'photo' => 'required',
            'designation' => 'required',
            'classification' => 'required',
            'company' => 'required',
            'blood_group' => 'required',
        ]);

        // if($request->hasFile('photo')) {
        //     $file = $request->photo;
        //     //Get file name with the extension
        //     $fileNameWithExt = $file->getClientOriginalName();
        //     // echo $fileNameWithExt;

        //     //Get just Filename
        //     $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

        //     //Get just Extension
        //     $extension = $file->getClientOriginalExtension();

        //     // Filename to store
        //     $fileNameToStore = $filename.'_'.time().'.'.$extension;

        //     //Upload Image
        //     Storage::disk('local')->putFileAs('about_us', $file, $fileNameToStore);
        // }

        $pass = $request->input('password');
        $password = (new BcryptHasher)->make($request->input('password'));

        $user = User::create([
            'IM_no' => $request->input('IM_no'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'password' => (new BcryptHasher)->make($request->input('password')),
            'gender' => $request->input('gender'),
            // 'photo' => $fileNameToStore,
            'designation' => $request->input('designation'),
            'classification' => $request->input('classification'),
            'company' => $request->input('company'),
            'blood_group' => $request->input('blood_group'),
            'api_token' => Str::random(60),
        ]);

        $user->save();
        return response()->json(['status' => 'success', 'message' => 'User registered'], 200);
    }

    public function simple()
    {
        $csrf = csrf_token();
        return "Hello";
    }
}