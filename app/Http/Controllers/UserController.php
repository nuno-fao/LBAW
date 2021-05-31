<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

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

    public function edit_password($user_id){

        dd($user_id);

        $user = User::find($user_id);
        
        return view('pages.edit_user', [
            'user' => $user
        ]);
    }

    
}
