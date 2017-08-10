<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Model\admin\admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = 'admin/home';  // Redirected to admin panel

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {


        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }


        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }


    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $admin = admin::where('email', $request->email)->first();  // Gettin the user to database

        if(count($admin)){

            if($admin->status == 0){
                return ['email' =>'inactive','password'=> 'You are not active person , please contact adminstrator'];
            }else{
                return ['email' =>$request->email,'password'=>$request->password, 'status'=>1];
            }
        }

       return $request->only($this->username(), 'password');
    }
}
