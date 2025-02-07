<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Broadcasting\PrivateChannel;

class UserNotification extends Notification
{
    use Queueable;

    private $data;
    private $channels;

    public function __construct($data,$channels = [])
    {
        $this->data = $data;
        $this->channels = $channels;
    }

    public function via($notifiable)
    {
        // return ['database', 'broadcast', 'mail'];
        return $this->channels;
    }

    public function toArray($notifiable)
    {
        return [
            'message' => $this->data['message'],
            'url' => $this->data['url'],
            'sender_type' => $this->data['sender_type'] ?? null, // doctor,patient
            'sender_type_id' => $this->data['sender_type_id'] ?? null, // doctor,patient
            'notification_type' => $this->data['notification_type'] ?? null, // appointment_booked,appointment_status_change,info
            'booked_appointment_id' => $this->data['booked_appointment_id'] ?? null,
            'booked_appointment' => $this->data['booked_appointment'] ?? null,
        ];
    }

    public function broadcastOn()
    {
        if (auth() && auth()->user() && auth()->user()->id) {
            return new PrivateChannel('notifications.' . auth()->user()->id);
        }
    }

    public function broadcastAs()
    {
        return 'new-notification';
    }

    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->subject($this->data['mail_subject'])
            ->view($this->data['email_template_view'], ['data'=>$this->data]);
    }
}
