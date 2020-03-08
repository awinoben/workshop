<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\User;
use Notification;
use App\Notifications\DemoNotification;
  
class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function send(Request $request)
    {
        $user = User::first();
  
        $details = [
            'greeting' => 'Hi?',
            'body' => 'Kindly see the details below',
            'thanks' => 'Thank you for choosing Fast Truck Workshop!',
            'actionText' => 'View My Site',
            'actionURL' => url,
            'order_id' => 'Order-20190000151'
        ];
  
        Notification::send($user, new DemoNotification($details));
   
        dd('Your notification send seuccessfully!');
    }  
}
