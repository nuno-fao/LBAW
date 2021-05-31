<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function list(){

        // $reviews = $user->reviews()->with(['user'])->orderBy('date','DESC')->paginate(10);
        
        return view('pages.groups_list'
        // , [
        //     'user' => $user,
        //     'reviews' => $reviews
        // ]
    );
    }

    public function add_group_page(){
        
        return view('pages.add_group');
    }

    public function create(Request $request)
    {   

     // $this->authorize('create');

     dd("Create Group");
      
      $this->validate($request, [
        'movieName' => 'required',
        'year' => 'required',
        'movieDescription' => 'required',
        'moviePoster' => 'required|image'
      ]);

      $imageName = time().'.'.$request->moviePoster->extension();  
     
      $request->moviePoster->move(public_path('img'), $imageName);
        
      $movie = Movie::create([
          'title' => $request->movieName,
          'year' => $request->year,
          'description' => $request->movieDescription,
          'photo' => 'img/'.$imageName,
        ]);
      
        if($movie)
        {        
            $tagNames = $request->get('tags');
            $tagIds = [];
            foreach($tagNames as $tagName)
            {
                
                $tag = Genre::firstOrCreate(['genre'=>$tagName]);
                if($tag)
                {
                  $tagIds[] = $tag->id;
                }
    
            }
            $movie->genres()->sync($tagIds);
        }

    
      return redirect()->route('landing_page');
    }


}
