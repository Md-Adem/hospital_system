@extends('layouts.master')
@section('css')
    <!-- Internal Gallery css-->
    <link href="{{ URL::asset('assets/plugins/gallery/gallery.css') }}" rel="stylesheet">
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Profile</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="demo-avatar-group mb-3">
            <div class="main-img-user avatar-xxl d-none d-sm-block">
                @if (Auth::user()->status == 'male')
                    <img alt="avatar" class="rounded-circle" src="{{ URL::asset('assets/img/users/profile-male.png') }}">
                @elseif (Auth::user()->status == 'female')
                    <img alt="avatar" class="rounded-circle"
                        src="{{ URL::asset('assets/img/users/profile-female.png') }}">
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="profile-tab tab-menu-heading">
                        <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line bg-gray-100">
                            <a class="nav-link active" data-toggle="tab" href="#edit">Edit Profile</a>

                            <a class="nav-link" data-toggle="tab" href="#ResetPassword">Reset Password</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card custom-card main-content-body-profile">
                <div class="tab-content">
                    <div class="main-content-body tab-pane p-4 border-top-0 active" id="edit">
                        <div class="card-body border">
                            <div class="mb-4 main-content-label">Personal Information</div>
                            <form class="form-horizontal" action="{{ route('profile.update', 'test') }}" method="POST">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="mb-4 main-content-label">Name</div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">First Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <input id="id" type="hidden" name="id" class="form-control"
                                        value="{{ Auth::user()->id }}">
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">User Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="email"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">Department </label>
                                        </div>
                                        <div class="col-md-9">
                                            <select name="department" class="custom-select" required>
                                                <!--placeholder-->
                                                <option value="{{ Auth::user()->department }}" selected>
                                                    {{ Auth::user()->department }}
                                                </option>
                                                <option value="Appointment">Appointment</option>
                                                <option value="Reception">Reception</option>
                                                <option value="Update Information">Update
                                                    Information</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 main-content-label">Contact Info</div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">Mobile<i>(required)</i></label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="00966000000000" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="row row-sm">
                                        <div class="col-md-9">
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary mr-1">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="main-content-body tab-pane p-4 border-top-0" id="ResetPassword">
                        <div class="card-body border">
                            <div class="mb-4 main-content-label">Update Password</div>
                            <form class="form-horizontal" action="{{ route('profile.update', 'test') }}" method="POST">
                                {{ method_field('patch') }}
                                @csrf
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">User Name</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <input id="id" type="hidden" name="id" class="form-control"
                                        value="{{ Auth::user()->id }}">
                                    <input id="UpdatePassword" type="hidden" name="UpdatePassword" class="form-control"
                                        value="true">
                                </div>
                                <div class="form-group ">
                                    <div class="row row-sm">
                                        <div class="col-md-3">
                                            <label class="form-label">New Password</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="row row-sm">
                                        <div class="col-md-9">
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-primary mr-1">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection
@section('script')
    <!-- Internal Gallery js-->
    <script src="{{ URL::asset('assets/plugins/gallery/picturefill.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lightgallery.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lightgallery-1.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-pager.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-autoplay.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-fullscreen.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-zoom.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-hash.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/gallery/lg-share.js') }}"></script>
@endsection
