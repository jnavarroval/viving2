<!DOCTYPE html>
<html>

<body>

    <h1>Hi {{ $data['receiver_user']['name'] }},</h1>
    <p>You have received a booking request for a {{ $data['booked_appointment']->appointment_type->category->name ?? ''}} appointment. Log in or click below to respond.
        This request will automatically be declined after 3 days.</p>
    <a href="{{ $data['url'] }}">Respond to booking</a>
</body>

</html>
