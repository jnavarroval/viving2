<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Channels\DatabaseChannel as IlluminateDatabaseChannel;

class DatabaseChannel extends IlluminateDatabaseChannel
{
    /**
    * Send the given notification.
    *
    * @param mixed $notifiable
    * @param \Illuminate\Notifications\Notification $notification
    * @return \Illuminate\Database\Eloquent\Model
    */
    public function send($notifiable, Notification $notification)
    {
        $data = $this->getData($notifiable, $notification);
        return $notifiable->routeNotificationFor('database')->create([
            // 'id'      => $notification->id,
            'type'    => get_class($notification),
            'sender_type'=> $data['sender_type'] ?? null,
            'sender_type_id'=> $data['sender_type_id'] ?? null,
            'booked_appointment_id'=> $data['booked_appointment_id'] ?? null,
            'notification_type' => $data['notification_type'] ?? null,
            'data'    => $data,
            'read_at' => null,
        ]);
    }
}
