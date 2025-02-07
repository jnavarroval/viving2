@extends('super_admins.layouts.master')

@section('title')
    Reviews
@endsection

@section('css')
    @include('super_admins.includes.datatable_css')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row align-items-center mb-4 pt-4 pt-lg-0">

                <div class="col-md-7 mb-3 mb-lg-0">
                    <h2 class="main-content-title fw-bold mb-0">Reviews</h2>
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="{{ route('super_admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Reviews</li>
                    </ol>
                </div>


            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped admin-table">
                                <thead>
                                    <tr>
                                        <th>Patient Name</th>
                                        <th>Clinic Name</th>
                                        <th>Doctor Name</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td>{{ $review->patient?->name }}</td>
                                            <td>{{ $review->clinic?->name }}</td>
                                            <td>{{ $review->doctor?->name }}</td>

                                            <td>{{ $review->comment }}</td>


                                            <td>
                                                @if (!$review->trashed())
                                                    <div class="d-flex">

                                                            <button type="button" class="btn btn-danger ml-2"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $review->id }}"
                                                                data-toggle="tooltip" data-placement="bottom"
                                                                title="Delete">
                                                                <i class="fa fa-trash"></i>
                                                            </button>

                                                    </div>
                                                    <div class="modal fade" id="deleteModal{{ $review->id }}"
                                                        style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Warning</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>This action is irreversible. Are You Sure , You want
                                                                        to
                                                                        delete this Review ?</p>
                                                                </div>
                                                                <form
                                                                    action="{{ route('super_admin.reviews.destroy', ['review' => $review->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                @else
                                                    <div class="d-flex">
                                                        {{-- restore --}}
                                                        <button type="button" class="btn btn-primary ml-2"
                                                            data-toggle="modal"
                                                            data-target="#restoreModal{{ $review->id }}">
                                                            <i class="fa fa-trash-restore"></i>
                                                        </button>
                                                        {{-- delete permanently --}}
                                                        {{-- @if (auth()->user()->hasPermission('review.delete')) --}}
                                                            <button type="button" class="btn btn-danger ml-2"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $review->id }}">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        {{-- @endif --}}
                                                    </div>
                                                    <div class="modal fade" id="deleteModal{{ $review->id }}"
                                                        style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Warning</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>This action is irreversible. Are You Sure , You want
                                                                        to
                                                                        delete this Review permanently ?</p>
                                                                </div>
                                                                <form
                                                                    action="{{ route('super_admin.service_categories.destroy_permanently', ['review' => $review->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <div class="modal fade" id="restoreModal{{ $review->id }}"
                                                        style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Warning</h4>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are You Sure , You want
                                                                        to
                                                                        restore this Review ?</p>
                                                                </div>
                                                                <form
                                                                    action="{{ route('super_admin.service_categories.restore', ['review' => $review->id]) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Restore</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('scripts')
    @include('super_admins.includes.datatable_scripts')
@endsection
