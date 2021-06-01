<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function home() {
        return redirect('login');
    }

    public function login(Request $request) {

        $this->validate($request, [
            'username' => 'required|alpha_dash|max:255',
            'password' => 'required|min:6',
        ]);

        $user = User::where('username',$request->username)->first();
        
        if($user != null && $user->banned){
            return back()->with('status', 'User has been banned');
        }

        if(!auth()->attempt($request->only('username', 'password'))){
            return back()->with('status', 'Invalid login details');
        }


        return redirect()->route('feed');
        
    }

    public function logout(){
        auth()->logout();

        return redirect()->route('landing_page');
    }

}
