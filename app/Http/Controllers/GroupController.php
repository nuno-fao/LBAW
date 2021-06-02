<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function show($id){

        $group = Group::find($id);

        $reviews = $group->reviews()->paginate(10);
        
        return view('pages.group_page',[
            'group' => $group,
            'reviews' => $reviews
        ]);
    }

    public function list(){

        $groups = Group::all();
        
        return view('pages.groups_list',[
            'groups' => $groups
        ]);
    }

    public function add_group_page(){
        
        return view('pages.add_group');
    }

    public function create(Request $request)
    {   

     // $this->authorize('create');
      
      $this->validate($request, [
        'title' => 'required|alpha_dash|max:255',
        'description' => 'required',
        'groupPhoto' => 'required|image'
      ]);
      

      $imageName = time().'.'.$request->groupPhoto->extension();  
     
      $request->groupPhoto->move(public_path('img'), $imageName);
        
      $group = Group::create([
          'title' => $request->title,
          'description' => $request->description,
          'photo' => 'img/'.$imageName,
          'admin' => auth()->user()->id
        ]);
      
        if($group)
        {        
        
            $members = [];
            $members[] = auth()->user()->id;
            
            $group->members()->sync($members);
        }

    
      return redirect()->route('landing_page');
    }

    public function invitation_page($group_id){

        $group = Group::find($group_id);

        $group_members = $group->members()->where('membership_state', 'accepted')->pluck('id')->all();

        $friends = auth()->user()->friends->whereNotIn('id', $group_members);

        return view('pages.group_invite',[
            'friends' => $friends,
            'group_id' => $group_id,
        ]);
    }

    public function invite_user($group_id,$user_id){

        $group = Group::find($group_id);
        $user = User::find($user_id);

        $group->members()->attach($user);
        $group->save();

        return back();
    }

    public function accept_invite($user_id,$group_id){

        $group = Group::find($group_id);
        $user = User::find($user_id);
 
        $group->members()->updateExistingPivot($user_id, [
            'membership_state' => 'accepted',
        ]);

        $notification = User::find($user_id)->notifications()->where('group_id',$group_id);
        $notification->delete();

        return back();
        
    }

    public function reject_invite($user_id, $group_id){

        $group = Group::find($group_id);
        $user = User::find($user_id);
 
        $group->members()->updateExistingPivot($user_id, [
            'membership_state' => 'rejected',
        ]);

        $notification = User::find($user_id)->notifications()->where('group_id',$group_id);
        $notification->delete();

        return back();
        
    }

    public function delete($group_id){

        $group = Group::find($group_id);

        $group->delete();

        return redirect()->route('groups_list');

    }


}
