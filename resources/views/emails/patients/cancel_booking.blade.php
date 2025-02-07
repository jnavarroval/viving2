<!DOCTYPE html>
<html>
<body>

    <h1>Hi {{ $data['booked_appointment']->customer->first_name ?? '' }},</h1>
    <p>Your {{$data['booked_appointment']->appointment_type->category->name ?? 'Discovery Call'}} appointment with {{ $data['booked_appointment']->healer->name ?? '' }} has been cancelled.
        Log in or click below to view more details about your bookings.</p>
    <a href="{{ $data['url'] }}">View My Bookings</a>
</body>

</html>
