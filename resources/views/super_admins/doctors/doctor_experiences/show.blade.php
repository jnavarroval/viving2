@extends('super_admins.layouts.master')

@section('title')
    View Experience
@endsection

@section('css')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('content')
    @if ($errors->any())
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 pt-4 pt-lg-0">

                <div class="col-sm-6">
                    <h2 class="main-content-title fw-bold mb-0">Experience</h2>
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('super_admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('super_admin.doctors.show' , $doctor->id) }}">Doctor Profile</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('super_admin.doctor_experiences.index' , $doctor->id) }}">Experiences
                                </a></li>
                        <li class="breadcrumb-item active">
                            View Experience
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-secondary">
                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <div class="border h-100  rounded p-3 border-light">
                                        <h6 class="fw-bold text-uppercase mb-0">Company Name</h6>
                                        <p class="mb-0 text-muted">{{ $doctor_experience->company ? $doctor_experience->company : '--' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="border h-100  rounded p-3 border-light">
                                        <h6 class="fw-bold text-uppercase mb-0">From</h6>
                                        <p class="mb-0 text-muted">{{ $doctor_experience->from ? $doctor_experience->from : '--' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="border h-100  rounded p-3 border-light">
                                        <h6 class="fw-bold text-uppercase mb-0">To</h6>
                                        <p class="mb-0 text-muted">{{ $doctor_experience->to ? $doctor_experience->to : '--' }}</p>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="border h-100  rounded p-3 border-light">
                                        <h6 class="fw-bold text-uppercase mb-0">File</h6>
                                        <p class="mb-0 text-muted">
                                            @if ($doctor_experience->file)
                                                <img class="mt-3" src="{{ url($doctor_experience->file) }}" width="75px" height="75px"
                                                    alt="{{ $doctor_experience->slug }}">

                                            @else
                                                --
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <div class="border h-100  rounded p-3 border-light">
                                        <h6 class="fw-bold text-uppercase mb-0">Status</h6>
                                        <p class="mb-0 text-muted">{{ $doctor_experience->is_active ? 'Active' : 'Inactive' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="border h-100  rounded p-3 border-light">
                                        <h6 class="fw-bold text-uppercase mb-0">Created At</h6>
                                        <p class="mb-0 text-muted">{{ date_format($doctor_experience->created_at, 'd-m-Y') }}</p>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="border h-100  rounded p-3 border-light">
                                        <h6 class="fw-bold text-uppercase mb-0">Description</h6>
                                        <p class="mb-0 text-muted">{!! $doctor_experience->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('scripts')
    <!-- date-range-picker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
@endsection
