@php
    use Carbon\Carbon;
    $time = $data['booked_appointment']->start_time;
    $formattedTime = Carbon::createFromFormat('H:i', $time)->format('h:i A');

    $date = $data['booked_appointment']->date;
    $formattedDate = Carbon::parse($date)->format('jS F');
@endphp
<!DOCTYPE html>
<html>

<body>

    <h1>Hi {{ $data['booked_appointment']->healer->first_name ?? '' }},</h1>
    <p>
        You're meeting with {{$data['booked_appointment']->customer->name ?? ''}}  at  {{ $formattedTime}} : {{$data['booked_appointment']->healer_timezone ?? ''}} on  {{$formattedDate}}. Log in or click below to view more details about your bookings.</p>
    <a href="{{ $data['url'] }}">View My Bookings</a>
</body>

</html>
