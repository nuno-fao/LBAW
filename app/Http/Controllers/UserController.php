<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function show($id)
    {
        if (!ctype_digit($id)) {
            abort(404);
        }
        $user = User::find($id);
        if ($user == null) {
            abort(404);
        }
        $reviews = $user->reviews()->with(['user'])->orderBy('date', 'DESC')->take(10)->get();

        return view('pages.user_profile', [
            'user' => $user,
            'reviews' => $reviews
        ]);
    }

    public function getPage($id, $page)
    {
        if (!ctype_digit($id)) {
            abort(404);
        }
        if (!ctype_digit($id) || !ctype_digit($page)) {
            return view(self::ERROR_404_PAGE);
        }
        $u = User::find($id);
        if ($u == null) {
            return view(self::ERROR_404_PAGE);
        }

        $reviews = $u->reviews()->with(['user'])->orderBy('date', 'DESC')->skip($page * 10)->take(10)->get();
        return view('pagination.feed', ['reviews' => $reviews]);
    }

    public function ban(User $user)
    {

        $this->authorize('ban', $user);
        if (!$user->banned) {
            $user->banned = true;
            $user->save();
        }
        return response('', 200)->header('Content-Type', 'text/plain');
    }

    public function unban(User $user)
    {

        $this->authorize('ban', $user);
        if ($user->banned) {
            $user->banned = false;
            $user->save();
        }
        return response('', 200)->header('Content-Type', 'text/plain');
    }

    public function edit_page($user_id)
    {

        if (!ctype_digit($user_id)) {
            abort(404);
        }
        $user = User::find($user_id);
        if ($user == null) {
            abort(404);
        }
        $this->authorize('edit', $user);

        return view('pages.edit_user', [
            'user' => $user
        ]);
    }

    public function edit(Request $request, $user_id)
    {

        if (!ctype_digit($user_id)) {
            abort(404);
        }
        $user = User::find($user_id);

        $this->authorize('edit', $user);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|max:255',
            'birthday' => 'required|before:today',
            'username' => 'required|alpha_dash|max:255',
        ]);

        if ($user != null) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->date_of_birth = $request->birthday;
            $user->username = $request->username;

            if ($request->userPhoto != null) {
                $this->validate($request, [
                    'name' => 'required',
                    'email' => 'required|email|max:255',
                    'birthday' => 'required|before:today',
                    'username' => 'required|alpha_dash|max:255',
                    'userPhoto' => 'image'
                ]);

                $imageName = time() . '.' . $request->userPhoto->extension();
                $request->userPhoto->move(public_path('img'), $imageName);

                $user->photo = 'img/' . $imageName;
            }

            $user->save();
        }

        return redirect('user/' . $user_id);
    }

    public function edit_password_page($user_id)
    {

        if (!ctype_digit($user_id)) {
            abort(404);
        }
        $user = User::find($user_id);

        $this->authorize('edit', $user);

        return view('pages.edit_password', [
            'user' => $user
        ]);
    }

    public function edit_password(Request $request, $user_id)
    {
        if (!ctype_digit($user_id)) {
            abort(404);
        }

        $user = User::find($user_id);

        $this->authorize('edit', $user);

        $this->validate($request, [
            'current_password' => 'required|min:6',
            'new_password' => 'required|confirmed|min:6',
            'new_password_confirmation' => 'required|min:6',
        ]);


        if (!(Hash::check($request->get('current_password'), $user->password))) {
            return back()->with('status', 'Current password does not match');
            //return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
        }

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return back()->with('status', 'New Password cannot be same as your current password');
            //return response()->json(['errors' => ['current'=> ['New Password cannot be same as your current password']]], 422);
        }



        $user->password = Hash::make($request->get('new_password'));
        $user->save();

        return redirect('user/' . $user_id);
    }

    public function delete($user_id)
    {
        if (!ctype_digit($user_id)) {
            abort(404);
        }
        $user = User::find($user_id);

        $this->authorize('delete', $user);

        Auth::logout();

        if ($user->delete()) {
            return redirect('/')->with('global', 'Your account has been deleted!');
        }
    }
}
