<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Auth;
class NotificationController extends Controller
{
    //Returns a page with a notification list
    public function index(){

      $this->authorize('view', Notification::class); 

        $notifs = Auth::user()->notifications()->orderBy('date','desc')->take(10)->get();

        return view('pages.notifications', [
            'notifications' => $notifs,
        ]);
    }

    public function getNotificationPage($page)
    {


      if( !ctype_digit($page)){
        return view(self::ERROR_404_PAGE);
      }
      $notifs =  Auth::user()->notifications()->orderBy('date','desc')->skip($page*10)->take(10)->get();
      
      return view('pagination.notifications', ['notifs' => $notifs]);
    }
}
