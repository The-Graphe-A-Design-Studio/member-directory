<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
=======
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
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
            'IM_no' => ['required', 'unique:users'],
            'name' => ['required', 'string', 'regex:/^[a-zA-Z ]+$/', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/^[0-9]+$/', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
<<<<<<< HEAD
    protected function create(Request $request)
    {
        if($request->hasFile('photo')){
            $file = $request->photo;
=======
    protected function create(array $data)
    {
        if(request()->hasFile('photo')){
            $file = request()->file('photo');
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
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
            Storage::disk('local')->putFileAs('profile_pic', $file, $fileNameToStore);
<<<<<<< HEAD
        }
        return User::create([
            'IM_no' => $request->get('IM_no'),
            'name' => $request->get('name'),
            'dob' => $request->get('dob'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'gender' => $request->get('gender'),
            'photo' => $fileNameToStore,
            'designation' => $request->get('designation'),
            'classification' => $request->get('classification'),
            'company' => $request->get('company'),
            'blood_group' => $request->get('blood_group'),
            // 'group_id' => $request->get('group_id'),
            // 'sponsorer' => $request->get('sponsorer'),
        ]);
=======

            // $user->photo = $fileNameToStore;
            // $user->save();
        }
        $user = User::create([
            'IM_no' => $data['IM_no'],
            'name' => $data['name'],
            'dob' => $data['dob'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'photo' => $fileNameToStore,
            'designation' => $data['designation'],
            'classification' => $data['classification'],
            'company' => $data['company'],
            'blood_group' => $data['blood_group'],
            // 'group_id' => $data['group_id'],
            // 'sponsorer' => $data['sponsorer'],
        ]);

        return $user;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
    }
}
