<!DOCTYPE html>
<html>
<body>
    <h1>Hi {{ $data['booked_appointment']->healer->first_name ?? '' }},</h1>
    <p>{{$data['booked_appointment']->customer->name ?? ''}} has requested a reschedule to your {{$data['booked_appointment']->appointment_type->category->name ?? 'Discovery Call'}} appointment.
        Log in or click below to view and respond to the request.</p>
    <a href="{{ $data['url'] }}">View My Bookings</a>
</body>

</html>
