<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    //Returns initial page for password recovery
    public function forgot_page()
    {

        return view('auth.password_recovery');
    }

    //Page whose url is sent in the email
    public function reset_page()
    {

        return view('auth.reset_password');
    }


    //Send an email with a link for password reset
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
            : redirect()->route('failed_page');
    }

    //Resets the user's password
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

    //Returns page confirming that the email was sent
    public function confirmation_page()
    {

        return view('auth.confirmation_page');
    }

    //Returns page informing that the email could not be sent
    public function failed_page()
    {

        return view('auth.failed_page');
    }
}
