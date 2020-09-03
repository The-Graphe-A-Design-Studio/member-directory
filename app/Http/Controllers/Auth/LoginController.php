<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout', 'userLogout');
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        if($request->wantsJson()){
            return response('', 204);
        } else {
            return redirect('/');
        }

        // return $request->wantsJson()
        //     ? new Response('', 204)
        //     : redirect('/');
    }
}
