<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Consultation Portal</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">patient Consultation Portal</div>

                    <div class="card-body">
                        <h3>patient Approved Successfully</h3>

                        <h5 class="card-title">patient ID: <strong>{{ $patient->id }}</strong></h5>

                        <p class="card-text">patient Name:
                            <strong>{{ $patient->first_name ." ". $patient->last_name }}</strong>
                        </p>
                        <p class="card-text"> patient Experience: <strong>{{ $patient->experience }}</strong></p>

                        <p class="card-text">patient Address: <strong>{{ $patient->address_line_1 }}</strong></p>

                        <p class="card-text">patient Phone: <strong>{{ $patient->cell_phone }}</strong></p>
                        <a href="{{ url('/patients/profiles/' . $patient->id) }}"
                            class="btn btn-primary text-white">Visit Your Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>
