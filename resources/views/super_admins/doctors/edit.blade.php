@extends('super_admins.layouts.master')

@section('title')
Edit Doctor
@endsection

@section('css')
<!-- daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endsection

@section('content')
@if ($errors->any())
@foreach ($errors->all() as $error)
{{-- {{ $error }} --}}
@endforeach
@endif
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-4 pt-4 pt-lg-0">
            <div class="col-sm-6">
                <h2 class="main-content-title fw-bold mb-0">Doctors</h2>
                <ol class="breadcrumb float-sm-left">
                    <li class="breadcrumb-item"><a href="{{ route('super_admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('super_admin.doctors.index') }}">Doctors</a></li>
                    <li class="breadcrumb-item active">
                        Edit Doctor
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
            {{-- <div class="col-md-2"></div> --}}
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-secondary">
                <div class="row">
                        <div class="col-md-12 mt-2">
                            {{-- <a href="{{ route('super_admin.doctor_posts.index' , $doctor->id) }}" class="btn btn-primary  ml-2">
                                  <i class="fa fa-rss" aria-hidden="true"></i><span class="ml-2">Blogs</span></a> --}}
                                  {{-- <a href="{{ route('super_admin.doctor_events.index' , $doctor->id) }}" class="btn btn-primary  ml-2">
                                  <i class="fa fa-calendar" aria-hidden="true"></i><span class="ml-2">Events</span></a> --}}
                                  {{-- <a href="{{ route('super_admin.doctor_educations.index' , $doctor->id) }}" class="btn btn-primary  ml-2">
                                  <i class="fas fa-graduation-cap" aria-hidden="true"></i><span class="ml-2">Educations</span></a>
                                  <a href="{{ route('super_admin.doctor_certifications.index' , $doctor->id) }}" class="btn btn-primary  ml-2">
                                  <i class="fas fa-certificate" aria-hidden="true"></i><span class="ml-2">Certifications</span></a>
                                  <a href="{{ route('super_admin.doctor_experiences.index' , $doctor->id) }}" class="btn btn-primary  ml-2">
                                  <i class="fas fa-briefcase" aria-hidden="true"></i><span class="ml-2">Experiences</span></a>
                                  <a href="{{ route('super_admin.doctor_broadcasts.index' , $doctor->id) }}" class="btn btn-primary  ml-2">
                                  <i class="fas fa-camera" aria-hidden="true"></i><span class="ml-2">Media</span></a>
                                  <a href="{{ route('super_admin.doctor_podcasts.index' , $doctor->id) }}" class="btn btn-primary  ml-2">
                                  <i class="fas fa-microphone" aria-hidden="true"></i><span class="ml-2">Podcasts</span></a>
                                  <a href="{{ route('super_admin.doctor_archives.index' , $doctor->id) }}" class="btn btn-primary  ml-2">
                                  <i class="fas fa-archive" aria-hidden="true"></i><span class="ml-2">Archives</span></a> --}}
                            </div>
                         </div>

                    <!-- form start -->
                    <form id="quickForm" method="POST" action="{{ route('super_admin.doctors.update', ['doctor' => $doctor->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                @if (isset($subscriptions))
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="InputName">Select Subscription :</label>
                                        <select aria-describedby="SubscriptionError" aria-invalid="true" id="subscriptions_drop_down" class="form-control curr-sym @if ($errors->has('subscription_id')) is-invalid @endif" name="subscription_id">
                                            @if (count($subscriptions) > 0)
                                            <option value="">Select Subscription</option>
                                            @foreach ($subscriptions as $subscription)
                                            <option value="{{ $subscription->id }}" {{ $doctor->subscription_id == $subscription->id ? 'selected' : '' }}>
                                                {{ $subscription->name }}
                                            </option>
                                            @endforeach
                                            @else
                                            <option value="">No Subscription Exists</option>
                                            @endif
                                        </select>
                                        <span id="SubscriptionError" class="error invalid-feedback">
                                            @if ($errors->has('subscription_id'))
                                            {{ $errors->first('subscription_id') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>

                                @endif
                                @if (isset($clinics))
                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="InputName">Select Clinic :</label>
                                            <select aria-describedby="BlogCategoryError" aria-invalid="true"
                                                id="faq_categories_drop_down"
                                                class="form-control curr-sym @if ($errors->has('clinic_id')) is-invalid @endif"
                                                name="clinic_id">
                                                @if (count($clinics) > 0)
                                                    <option value="">Select Clinic</option>
                                                    @foreach ($clinics as $clinic)
                                                        <option {{ $doctor->clinic_id == $clinic->id ? 'selected' : '' }} value="{{ $clinic->id }}"
                                                            {{ old('clinic_id') == $clinic->id ? 'selected' : '' }}>
                                                            {{ $clinic->name }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">No Clinic Exists</option>
                                                @endif
                                            </select>
                                            <span id="BlogCategoryError" class="error invalid-feedback">
                                                @if ($errors->has('clinic_id'))
                                                    {{ $errors->first('clinic_id') }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                 @endif
                                 @if (isset($doctor_categories))
                                    <div class="col-md-12 col-lg-4">
                                        <div class="form-group">
                                            <label for="InputName">Select Doctor Category :</label>
                                            <select multiple aria-describedby="BlogCategoryError" aria-invalid="true"
                                                id="faq_categories_drop_down"
                                                class="form-control curr-sym @if ($errors->has('doctor_category_ids')) is-invalid @endif"
                                                name="doctor_category_ids[]">
                                                @if (count($doctor_categories) > 0)
                                                    <option value="">Select Doctor Category</option>
                                                    @foreach ($doctor_categories as $doctor_category)
                                                        <option value="{{ $doctor_category->id }}">
                                                            {{ $doctor_category->name }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">No Doctor Category Exists</option>
                                                @endif
                                            </select>
                                            <span id="BlogCategoryError" class="error invalid-feedback">
                                                @if ($errors->has('doctor_category_ids'))
                                                    {{ $errors->first('doctor_category_ids') }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                 @endif
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="InputFirstName">First Name</label>
                                        <input required type="text" name="first_name" value="{{ $doctor->first_name }}" class="form-control @if ($errors->has('first_name')) is-invalid @endif" id="InputFirstName" placeholder="Please Enter" aria-describedby="FirstNameError" aria-invalid="true">
                                        <span id="FirstNameError" class="error invalid-feedback">
                                            @if ($errors->has('first_name'))
                                            {{ $errors->first('first_name') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="InputLastName">Last Name</label>
                                        <input required type="text" name="last_name" value="{{ $doctor->last_name }}" class="form-control @if ($errors->has('last_name')) is-invalid @endif" id="InputLastName" placeholder="Please Enter" aria-describedby="LastNameError" aria-invalid="true">
                                        <span id="LastNameError" class="error invalid-feedback">
                                            @if ($errors->has('last_name'))
                                            {{ $errors->first('last_name') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="InputUserName">User Name</label>
                                        <input required type="text" name="user_name" value="{{ $doctor->user_name }}" class="form-control @if ($errors->has('user_name')) is-invalid @endif" id="InputUserName" placeholder="Please Enter" aria-describedby="UserNameError" aria-invalid="true">
                                        <span id="UserNameError" class="error invalid-feedback">
                                            @if ($errors->has('user_name'))
                                            {{ $errors->first('user_name') }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <h5>Multi Language</h5>
                                    <div>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            @foreach ($active_languages as $key => $language)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link {{$key == 0 ? 'active':''}} mr-1" id="nav-{{$language->code}}-tab" data-toggle="tab" data-target="#nav-{{$language->code}}" type="button" role="tab" aria-controls="nav-{{$language->code}}" aria-selected="true">{{ $language->name }}</button>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content mt-2 p-2" id="myTabContent">
                                            @foreach ($active_languages as $key => $language)
                                            <div class="tab-pane fade mb-2 {{$key == 0 ? 'show active':''}}" id="nav-{{$language->code}}" role="tabpanel" aria-labelledby="nav-{{$language->code}}-tab">
                                                <div class="form-group">
                                                    <label for="InputDescription">Description ({{$language->code}})</label>
                                                    <textarea name="description[{{$language->code}}]" id="discription_editor_{{$language->code}}" class="form-control @if ($errors->has('description.'.$language->code)) is-invalid @endif" rows="3" placeholder="Please Enter" aria-describedby="DescriptionError-{{$language->code}}" aria-invalid="true">{{ $doctor->getTranslation('description', $language->code); }}</textarea>
                                                    <span id="DescriptionError-{{$language->code}}" class="error invalid-feedback">
                                                        @if ($errors->has('description.'.$language->code))
                                                        {{ $errors->first('description.'.$language->code) }}
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group">
                                        <label for="InputImage">Choose Picture</label>

                                        <input type="hidden" name="image" class="image" value="">
                                        <input type="file" name="imageFile" class="custom-file-input imageFile @if ($errors->has('image')) is-invalid @endif" id="InputImage" placeholder="Select image" aria-describedby="ImageError" aria-invalid="true">
                                        <span id="ImageError" class="error invalid-feedback">
                                            @if ($errors->has('image'))
                                            {{ $errors->first('image') }}
                                            @endif
                                        </span>
                                        @if ($doctor->image)
                                        <div class="custom-file-preview">
                                            <img src="{{ url($doctor->image) }}" width="75px" height="75px" alt="{{ $doctor->name }}">
                                        </div>
                                        @else
                                        <div class="custom-file-preview">
                                            -- No Image Selected
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group mb-0">
                                        <label for="customSwitch1">Status</label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="is_active" value="1" @if ($doctor->is_active) checked @endif class="custom-control-input"
                                            id="customSwitch1" aria-describedby="IsActiveError" aria-invalid="true">
                                            <label class="custom-control-label" for="customSwitch1">Select Doctor To Be
                                                Active
                                                Or Not</label>
                                        </div>
                                        <span id="IsActiveError" class="error invalid-feedback">
                                            {{-- @if ($errors->has('is_active'))
                                                {{ $errors->first('is_active') }}
                                            @endif --}}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group mb-0">
                                        <label for="customSwitch2">Featured?</label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="is_featured" value="1" @if ($doctor->is_featured) checked @endif class="custom-control-input"
                                            id="customSwitch2" aria-describedby="IsFeaturedError" aria-invalid="true">
                                            <label class="custom-control-label" for="customSwitch2">Select Doctor To Be
                                                Featured
                                                Or Not</label>
                                        </div>
                                        <span id="IsFeaturedError" class="error invalid-feedback">
                                            {{-- @if ($errors->has('is_featured'))
                                                {{ $errors->first('is_featured') }}
                                            @endif --}}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4">
                                    <div class="form-group mb-0">
                                        <label for="customSwitch3">Premium</label>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="is_premium" value="1" @if ($doctor->is_premium) checked @endif class="custom-control-input"
                                            id="customSwitch3" aria-describedby="IsFeaturedError" aria-invalid="true">
                                            <label class="custom-control-label" for="customSwitch3">Select Doctor To Be
                                                Premium
                                                Or Not</label>
                                        </div>
                                        <span id="IsFeaturedError" class="error invalid-feedback">
                                            {{-- @if ($errors->has('is_premium'))
                                                {{ $errors->first('is_premium') }}
                                            @endif --}}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary px-3 py-1">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
@include('super_admins.includes.image_cropper_modal')
@endsection

@section('scripts')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script>
   $(document).ready(function() {
        @foreach ($active_languages as $language)
        ClassicEditor.create(document.querySelector('#discription_editor_{{$language->code}}')).catch(error => { console.error(error); });
        // ClassicEditor.create(document.querySelector('#short_description_editor_{{$language->code}}')).catch(error => { console.error(error); });
        @endforeach
    });
</script>
@include('super_admins.includes.image_cropper_scripts')
@endsection
