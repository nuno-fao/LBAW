<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show(User $user){

        $reviews = $user->reviews()->with(['user'])->orderBy('date','DESC')->paginate(10);
        
        return view('pages.user_profile', [
            'user' => $user,
            'reviews' => $reviews
        ]);
    }

    public function ban(User $user){

        $this->authorize('ban', $user);
        if (!$user->banned){
            $user->banned = true;
            $user->save();
        }
    }

    public function unban(User $user){

        $this->authorize('ban', $user);
        if ($user->banned){
            $user->banned = false;
            $user->save();
        }
    }

    public function edit_page($user_id){

        $user = User::find($user_id);
        
        return view('pages.edit_user', [
            'user' => $user
        ]);
    }

    public function edit(Request $request, $user_id){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'birthday' => 'required',
            'username' => 'required',
        ]);

        $user = User::find($user_id);

        if($user != null){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->date_of_birth = $request->birthday;
            $user->username = $request->username;

            if($request->userPhoto != null){
        
                $imageName = time().'.'.$request->userPhoto->extension();  
                $request->userPhoto->move(public_path('img'), $imageName);
        
                $user->photo = 'img/'.$imageName;  
        
            }

            $user->save();
        }

        return redirect('user/'.$user_id);
    }

    public function edit_password_page($user_id){

        $user = User::find($user_id);
        
        return view('pages.edit_password', [
            'user' => $user
        ]);
    }

    public function edit_password(Request $request, $user_id){

        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        $user = User::find($user_id);

        if (!(Hash::check($request->get('current_password'), $user->password))) {
            return response()->json(['errors' => ['current'=> ['Current password does not match']]], 422);
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return response()->json(['errors' => ['current'=> ['New Password cannot be same as your current password']]], 422);
        }


        
        $user->password = Hash::make($request->get('new_password'));
        $user->save();
        
        return redirect('user/'.$user_id);
        
    }

    
}
