<?php

namespace App\Http\Controllers;

use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function showNotifications(Request $request)
    {
        $user = auth()->user();
        $logged_in_as = $request->session()->get('logged_in_as');

        if ($logged_in_as === 'doctor' || $logged_in_as === 'patient') {

            $notifications = $user->notifications()
            ->with('sender')
            ->where('read_at', null)
            ->orderBy('created_at', 'desc')
            ->get();


        } else {
            $notifications = [];

        }

        return Inertia::render('Patients/Notifications/PatientNotification', [
            'notifications' => $notifications,
        ]);
    }

    public function addNotification(Request $request)
    {
        $user = auth()->user();
        $logged_in_as = $request->session()->get('logged_in_as');
        $sender_type_id =  $user[$logged_in_as]->id;
        $data = [
            'message' => 'has sent you a new message.',
            'url' => route('notifications.index'),
            'sender_type' => $logged_in_as,
            'sender_type_id' => $sender_type_id,
            'notification_type' => 'chat_message'
        ];
        $user->notify(new UserNotification($data));
        return redirect(route('notifications.index'));
    }

    public function markAsRead($id)
    {


        $user = auth()->user();
        $notification = $user->notifications()->where('id', $id)->first();

        if ($notification) {
            $notification->markAsRead();
        }

        // return redirect()->route('notifications.index');
        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'Notification Read Successfully',
        ]);
        return redirect()->back()->withResponseData([
            'message' => 'Notification Read Added Successfully',
            'type' => 'success'
        ]);
    }

    public function markAllAsRead(Request $request)
    {
        $user = auth()->user();
        $logged_in_as = $request->session()->get('logged_in_as');

        if ($logged_in_as === 'doctor' || $logged_in_as === 'clinic') {
            $user->notifications()

                ->whereNull('read_at')
                ->update(['read_at' => now()]);


        }


        request()->session()->flash('alert', [
            'type' => 'success',
            'message' => 'All Notification Updated Successfully',
        ]);
        return redirect()->back()->withResponseData([
            'message' => 'All Notification Updated Successfully',
            'type' => 'success'
        ]);

    }
}
