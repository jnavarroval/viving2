<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .details {
            margin-bottom: 20px;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
        }

        .details table,
        .details th,
        .details td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .details th {
            background-color: #f2f2f2;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Appointment Report</h1>
        </div>

        <div class="details">
            <h2>Patient Information</h2>
            <table>
                <tr>
                    <th>Name</th>
                    <td>{{ $appointment->patient->name }}</td>
                </tr>

                @if (!empty($appointment->patient->gender))
                    <tr>
                        <th>Gender</th>
                        <td>{{ $appointment->patient->gender }}</td>
                    </tr>
                @endif

                @if (!empty($appointment->patient->blood_group))
                    <tr>
                        <th>Blood Group</th>
                        <td>{{ $appointment->patient->blood_group ?? 'Unknown' }}</td>
                    </tr>
                @endif
            </table>
        </div>


        <div class="details">
            <h2>Appointment Details</h2>
            <table>
                <tr>
                    <th>Doctor Name</th>
                    <td>{{ $appointment->doctor->name }}</td>
                </tr>
                <tr>
                    <th>Appointment Type</th>
                    <td>{{ $appointment->appointment_type->display_name }}</td>
                </tr>
                <tr>
                    <th>Date</th>

                    <td>{{  date('d-m-Y', strtotime($appointment->date)) }}</td>
                </tr>
                {{-- <tr>
                    <th>Time</th>
                    <td>{{ $appointment->time }}</td>
                </tr> --}}
            </table>
        </div>

        <div class="details">
            <h2>Patient Health</h2>
            @if (!empty($appointment->patient_healths))
                <table>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Value</th>
                    </tr>
                    @foreach ($appointment->patient_healths as $patient_health)
                        <tr>
                            <td>{{ $patient_health->id ?? ' ' }}</td>
                            <td>{{ strip_tags($patient_health->healths->name) ?? ' ' }}</td>
                            <td>{{ $patient_health->value ?? ' ' }}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>No diseases listed.</p>
            @endif
        </div>
        <div class="details">
            <h2>Diseases</h2>
            @if (!empty($appointment->diseases))
                <table>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>

                    </tr>
                    @foreach ($appointment->diseases as $disease)
                        <tr>
                            <td>{{ $disease->id ?? ' ' }}</td>
                            <td>{{ $disease->name ?? ' ' }}</td>
                            <td>{{ strip_tags($disease->description) ?? '' }}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>No diseases listed.</p>
            @endif
        </div>
        <div class="details">
            <h2>Test Report</h2>
            @if (!empty($appointment->tests))
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>

                    </tr>
                    @foreach ($appointment->tests as $test)
                        <tr>
                            <td>{{ $test->name ?? ' ' }}</td>
                            <td>{{ strip_tags($test->description) ?? '' }}</td>

                        </tr>
                    @endforeach
                </table>
            @else
                <p>No tests listed.</p>
            @endif
        </div>

        <div class="details">
            <h2>Medicines</h2>
            @if (!empty($appointment->medicines))
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Dosage</th>
                        <th>Frequency</th>
                        <th>Last Updated</th>
                    </tr>
                    @foreach ($appointment->medicines as $medicine)
                        <tr>
                            <td>{{ $medicine->id ?? ' ' }}</td>
                            <td>{{ $medicine->name ?? ' ' }}</td>
                            <td>{{ $medicine->dosage ?? ' ' }}</td>
                            <td>{{ $medicine->frequency ?? ' ' }}</td>
                            <td>{{ $medicine->updated_at ?? ' ' }}</td>
                        </tr>
                    @endforeach
                </table>
            @else
                <p>No medicines listed.</p>
            @endif
        </div>

        {{-- <div class="details">
            <h2>Additional Information</h2>
            <p>{{ $appointment['additional_info'] }}</p>
        </div> --}}

        <div class="footer">
            <p>Generated on {{ date('Y-m-d') }}</p>
        </div>
    </div>
</body>

</html>
