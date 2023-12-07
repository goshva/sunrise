<?php

namespace App\Http\Livewire\Client;

use App\Models\User;
use App\Models\UserNotification;
use Livewire\Component;

class Notifications extends Component
{
    protected $listeners = [
        'notificationRead',
        'notificationAllRead',
        'deleteAllNotifications'
    ];
    public function deleteAllNotifications(){
        $notifications = UserNotification::where("user_id", auth()->id())->get();
        foreach ($notifications as $notification) {
            $notification->delete();
            
        }
    }
    public function notificationAllRead(){
        $notifications = UserNotification::where("user_id", auth()->id())->get();
        foreach ($notifications as $notification) {
            $notification->read = 1;
            $notification->save();
            
        }
    }
    public function notificationRead($notification){
        $notification = UserNotification::find($notification);
        $notification->read = 1;
        $notification->save();
    }
    public function render()
    {
        $user = auth()->user();
        $user_notifications = UserNotification::where("user_id", $user->id)->orderBy('created_at', 'DESC')->get();
        return view('livewire..client.notifications', compact('user_notifications'));
    }
}
