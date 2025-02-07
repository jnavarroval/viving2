<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - Error Page</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body style="background-color: #F4F9FD" class="d-flex align-items-center justify-content-center min-vh-100">

    <div class="container">
        <div class="p-5 m-5 text-center">
            <div class="card p-5 rounded-4 border-0">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <img style="width:250px" src="{{ url('assets/Images/error.png') }}" alt="">

                    <h1 class="display-4" style="font-weight: 500">
                        Page Not Found
                    </h1>
                    <p class="fs-4 text-muted mt-2">Hey,the page you are trying to find is not available </p>
                    <div class="mt-3">
                        <a href="{{ url('/') }}" style="background: #3784A6"
                            class="btn gap-2 d-flex align-items-center border-0 text-white rounded-3 p-3 py-3 fs-5"
                            style="font-weight: 700">Back
                            to Home
                            <img src="{{ url('assets/Images/iconbtn.png') }}" width="30" alt="">
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
