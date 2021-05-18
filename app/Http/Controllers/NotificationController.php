<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Auth;
class NotificationController extends Controller
{
    
    public function index(){

        
        $notifs = Auth::user()->notifications;

        return view('pages.notifications', [
            'notifications' => $notifs,
        ]);
        
        
    }
}
