<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Consultant Consultation Portal</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Medical Consultant Consultation Portal</div>

                    <div class="card-body">
                        <h3>Your New Appointment Booked Successfully</h3>
                        <h5 class="card-title">Meeting Appointment ID: <strong>{{ $appointment->id }}</strong></h5>
                        <p class="card-text">Meeting Patient ID: <strong>{{ $appointment->patient_id }}</strong></p>
                        <p class="card-text">Meeting Patient Name:
                            <strong>{{ $appointment->patient ? $appointment->patient->name : 'No Name' }}</strong>
                        </p>
                        <p class="card-text">Meeting doctor ID: <strong>{{ $appointment->doctor_id }}</strong></p>
                        <p class="card-text">Meeting doctor Name:
                            <strong>{{ $appointment->doctor ? $appointment->doctor->name : 'No Name' }}</strong>
                        </p>
                        <p class="card-text">Meeting clinic ID: <strong>{{ $appointment->clinic_id }}</strong></p>
                        <p class="card-text">Meeting clinic Name:
                            <strong>{{ $appointment->clinic_id ? $appointment->clinic->name : 'No Clinic Selected' }}</strong>
                        </p>
                        <p class="card-text">Meeting Date: <strong>{{ $appointment->date }}</strong></p>
                        <p class="card-text">Start Time: <strong>{{ $appointment->start_time }}</strong></p>
                        <p class="card-text">End Time: <strong>{{ $appointment->end_time }}</strong></p>
                        <p class="card-text">Fee To Be Deducted: <strong>{{ $appointment->fee }}</strong></p>
                        <p class="card-text">Is Paid: <strong>{{ $appointment->is_paid ? 'Paid' : 'Unpaid' }}</strong>
                        </p>
                        <p class="card-text">Meeting Fund ID: <strong>{{ $appointment->fund_id }}</strong></p>
                        <p class="card-text">Meeting Appointment Type:
                            <strong>{{ $appointment->appointment_type ? $appointment->appointment_type->display_name : 'Default' }}</strong>
                        </p>
                        <p class="card-text">Attached Question: <strong>{{ $appointment->question }}</strong></p>
                        <p class="card-text">Meeting Attachment URL:
                            <strong>{{ $appointment->attachment_url }}</strong>
                        </p>
                        <p class="card-text">Meeting Appointment Status Code:
                            <strong>{{ $appointment->appointment_status_code }}</strong>
                        </p>

                        @php
                            $statusDescription = '';
                            switch ($appointment->appointment_status_code) {
                                case 1:
                                    $statusDescription = 'Appointment is Registered';
                                case 2:
                                    $statusDescription = 'Appointment Accepted Successfully';
                                    break;
                                case 3:
                                    $statusDescription = 'Appointment Rejected Successfully';
                                    break;
                                case 4:
                                    $statusDescription = 'Appointment Cancelled Successfully';
                                    break;
                                case 5:
                                    $statusDescription = 'Appointment Marked as Completed Successfully';
                                    break;
                                default:
                                    $statusDescription = 'Unknown Status';
                            }
                        @endphp

                        <p class="card-text">Meeting Appointment Status: <strong>{{ $statusDescription }}</strong></p>
                        <a href="{{ url('/doctor_appointment_log/detail/' . $appointment->id) }}"
                            class="btn btn-primary text-white">Check Appointment Detail</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>
