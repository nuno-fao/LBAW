<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    public function forgot_page() {
       
        return view('auth.password_recovery');

    }

    public function forgot() {

        
        $credentials = request()->validate(['email' => 'required|email']);
        Password::sendResetLink($credentials);

        return response()->json(["msg" => 'Reset password link sent on your email id.']);
    }
}
