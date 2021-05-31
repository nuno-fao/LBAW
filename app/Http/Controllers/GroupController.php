<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
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


}
