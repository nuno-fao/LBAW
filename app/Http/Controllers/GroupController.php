<?php

namespace App\Http\Controllers;

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
        'title' => 'required',
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

        $friends = auth()->user()->friends;

        return view('pages.group_invite',[
            'friends' => $friends
        ]);
    }


}
