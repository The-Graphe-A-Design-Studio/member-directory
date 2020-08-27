<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // if(is_uploaded_file($data['photo'])){
        //     $file = $data['photo'];
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
        //     Storage::disk('local')->putFileAs('profile_pic', $file, $fileNameToStore);
        // }
        return User::create([
            'IM_no' => $data['IM_no'],
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'photo' => "fileNameToStore",
            'designation' => $data['designation'],
            'classification' => $data['classification'],
            'company' => $data['company'],
            'blood_group' => $data['blood_group'],
        ]);
    }
}
