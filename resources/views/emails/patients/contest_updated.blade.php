<!DOCTYPE html>
<html>
<body>
    <h1>Hi {{ $data['booked_appointment']->customer->first_name ?? '' }},</h1>
    <p>There has been an update with one of your recently contested appointments.
    Log in or click below to view more details about this update.</p>
    <a href="{{ $data['url'] }}">View My Bookings</a>
</body>

</html>
