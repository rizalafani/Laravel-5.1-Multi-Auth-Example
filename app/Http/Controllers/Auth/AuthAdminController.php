<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;

class AuthAdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Override Auth Objects
     */
    protected $loginView    = "authadmin.login"; // login view path
    protected $registerView = "authadmin.register"; // register view path
    protected $username     = "username"; // username field for login
    protected $loginPath    = "admin/login"; // for login redirect if failed
    protected $redirectPath = "home-admin"; // for login / register redirect if success

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'firstname'=> 'required|max:255',
            'lastname' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $admin = Admin::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
        ]);

        Auth::admin()->login( $admin );

        return $admin;
    }
    
    protected function login_process($credentials, $remember)
    {
        return Auth::admin()->attempt($credentials, $remember);
    }

    protected function authenticated_process($request)
    {
        return $this->authenticated($request, Auth::admin()->get());
    }
}
