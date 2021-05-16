<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
class NotificationController extends Controller
{
    
    public function index(){

        $notifs = Notification::orderBy('date','DESC')->get();
        return view('pages.notifications', [
            'notifications' => $notifs,
        ]);
    }
}
