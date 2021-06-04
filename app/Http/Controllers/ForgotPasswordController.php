<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    public function forgot_page()
    {

        return view('auth.password_recovery');
    }

    public function reset_page()
    {

        return view('auth.reset_password');
    }

    public function sendResetLinkEmail(Request $request)
    {

        $user = User::where('email', $request->get('email'))->first();

        if (!is_null($user)) {
            $response = Password::sendResetLink(
                ['email' => $request->get('email')]
            );
        } else {
            $response = Password::INVALID_USER;
        }

        return $response == Password::RESET_LINK_SENT
            ? redirect()->route('confirmation_page')
            : response()->json($response);
    }

    public function reset()
    {


        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|confirmed'
        ]);


        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(["msg" => "Invalid token provided"], 400);
        }

        return redirect()->route('login');
    }

    public function confirmation_page()
    {

        return view('auth.confirmation_page');
    }
}
