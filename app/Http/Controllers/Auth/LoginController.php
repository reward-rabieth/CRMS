<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    use AuthenticatesUsers {
        logout as performLogout;
    }

    public function logout(Request $request)
    {
        $this->performLogout($request);
        return redirect()->route('login');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectPath() {
        $roles = Auth::user()->roles()->get();
        $collection = DB::table('users')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('users.id', '=', \auth()->id())
            ->select('roles.role')
            ->get();

        $json_decode = json_decode($collection, true);
            if ($json_decode[0]['role'] == "RCO") {
                return "/admin/station/create";
            }
            if ($json_decode[0]['role'] == "INVESTIGATOR") {
                return "/admin/station";
            }
            if ($json_decode[0]['role'] == "HOS") {
                return "/hos/report/all";
            }
            if ($json_decode[0]['role'] == "AG") {
                return "/admin/station";
            }
            if ($json_decode[0]['role'] == "POLICE") {
                return "/police/report/create";
            }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }
}
