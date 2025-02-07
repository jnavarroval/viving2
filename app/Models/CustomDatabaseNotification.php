<?php
namespace App\Models;

use Illuminate\Notifications\DatabaseNotification;

class CustomDatabaseNotification extends DatabaseNotification
{
    // Specify the table for custom notifications
    protected $table = 'custom_notifications';

    /**
     * Relationship with BookAppointment model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookedAppointment()
    {
        return $this->belongsTo(BookAppointment::class, 'booked_appointment_id');
    }

    /**
     * Polymorphic relationship for the sender.
     * Can be a Patient, Doctor, etc.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function sender()
    {
        return $this->morphTo('sender', 'sender_type', 'sender_type_id');
    }
}
