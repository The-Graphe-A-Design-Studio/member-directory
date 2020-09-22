<?php

namespace App\Http\Controllers\api\v1\user;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Validator;
=======
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        return User::all();
    }

=======
        return User::paginate(1);
    }

    public function currentUser()
    {
        return Auth::user();
    }
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
<<<<<<< HEAD
    public function update(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'IM_no' => 'nullable|regex:/^[A-Za-z0-9 ]+$/',
            'name' => 'nullable|regex:/^[A-Za-z ]+$/',
            'dob' => 'nullable|date',
            'phone' => 'nullable|unique:users|min:10|max:10|regex:/^[0-9]+$/',
            'email' => 'nullable|unique:users|email',
            'password' => 'nullable|regex:/^[A-Za-z0-9 ]+$/',
            'gender' => 'nullable|in:Male,Female,Others',
            'photo' => 'nullable|mimes:jpg,jpeg,png',
            'club_name' => 'nullable|regex:/^[A-Za-z0-9 ]+$/',
            'designation' => 'nullable|regex:/^[A-Za-z0-9 ]+$/',
            'occupation' => 'nullable|regex:/^[A-Za-z0-9 ]+$/',
            'blood_group' => 'nullable|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'sponsorer' => 'nullable|regex:/^[A-Za-z0-9 ]+$/',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        if($request->hasFile('photo')) {
            
            //delete old visiting card if exists
            if($user->photo != null){
                // $storage = "/home/thegrhmw/public_html/developers/flexy/storage/app/visiting_card/";
                // $storage = "storage/app/profile_pic/";
                // $path = $storage . $user->photo;
                $storage = Storage::disk('local')->getAdapter()->getPathPrefix();
                $path = $storage . "profile_pic/" . $user->photo;
                unlink($path);
                // unlink($user->photo);
            }
            
            //add the new image
            $file = $request->file('photo');

            //Get file name with the extension
            $fileNameWithExt = $file->getClientOriginalName();

            //Get just Filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            //Get just Extension
            $extension = $file->getClientOriginalExtension();

            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            Storage::disk('local')->putFileAs('profile_pic', $request->file('photo'), $fileNameToStore);
        }

        $user->IM_no = ( empty($request->get('IM_no')) ) ? $user->IM_no : $request->get('IM_no');
        $user->name = ( empty($request->get('name')) ) ? $user->name : $request->get('name');
        $user->dob = ( empty($request->get('dob')) ) ? $user->dob : $request->get('dob');
        $user->phone = ( empty($request->get('phone')) ) ? $user->phone : $request->get('phone');
        $user->email = ( empty($request->get('email')) ) ? $user->email : $request->get('email');
        $user->gender = ( empty($request->get('gender')) ) ? $user->gender : $request->get('gender');
        $user->photo = ( empty($fileNameToStore) ) ? $user->photo : $fileNameToStore;
        $user->club_name = ( empty($request->get('club_name')) ) ? $user->club_name : $request->get('club_name');
        $user->designation = ( empty($request->get('designation')) ) ? $user->designation : $request->get('designation');
        $user->occupation = ( empty($request->get('occupation')) ) ? $user->occupation : $request->get('occupation');
        $user->blood_group = ( empty($request->get('blood_group')) ) ? $user->blood_group : $request->get('blood_group');

        $user->save();

        return response()->json(['status' => 'success', 'messege' => 'Member details updated'], 200);
=======
    public function update(Request $request, $id)
    {
        //
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
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
<<<<<<< HEAD

    public function search(Request $request)
    {
        $term = $request->input('term');

        $members = User::where('name', 'LIKE', '%'.$term.'%')
                        ->orWhere('club_name', 'LIKE', '%'.$term.'%')
                        ->orWhere('designation', 'LIKE', '%'.$term.'%')
                        ->orWhere('occupation', 'LIKE', '%'.$term.'%')
                        ->orWhere('IM_no', 'LIKE', '%'.$term.'%')->get();

        if(!empty($members)) {
            return response()->json(['status' => 'success', 'members' => $members], 200);
        }
        return response()->json(['status' => 'success', 'message' => 'No members found'], 200);
    }

    public function getleos(Request $request)
    {
        $leos = User::where('leo', 1)->get();

        return response()->json(['status' => 'success', 'members' => $leos], 200);

    }
=======
>>>>>>> 618d5a84e3460e9d830f42d69dd19295c6b2cbbd
}
