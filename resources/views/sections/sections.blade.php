@extends('layouts.master')
@section('css')
    <title>Sections</title>
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Users & Sections</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sections</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-6 col-md-6">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="profile-tab p-sm-0 tab-menu-heading">
                        <nav class="nav main-nav-line p-2 tabs-menu profile-nav-line bg-gray-100">
                            <a class="nav-link active" data-toggle="tab" href="#userslist">Users List</a>

                            <a class="nav-link" data-toggle="tab" href="#sections">Sections</a>
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
                    <div class="main-content-body tab-pane p-4 border-top-0 active" id="userslist">
                        <div class="card-body border">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div>
                                                <h6 class="main-content-label mb-1">Users Table</h6>
                                                <p class="text-muted card-sub-title">Users Information.</p>
                                            </div>
                                            <button type="button" class="btn btn-outline-primary"
                                                data-effect="effect-scale" data-toggle="modal" data-target="#AddUsers">
                                                Add New User
                                            </button>
                                            <br><br>
                                            <div class="table-responsive border">
                                                <table class="table  text-nowrap text-md-nowrap table-striped mg-b-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Username</th>
                                                            <th>Department</th>
                                                            <th>Roles</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach ($users as $user)
                                                            @if ($user->roles_name == 'SuperAdmin')
                                                                @php
                                                                    continue;
                                                                @endphp
                                                            @endif
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $user->name }}</td>
                                                                <td>{{ $user->email }}</td>
                                                                <td><span
                                                                        class="badge badge-secondary">{{ $user->department }}</span>
                                                                </td>
                                                                <td><span
                                                                        class="badge badge-success">{{ $user->roles_name }}</span>
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#EditUsers{{ $user->id }}"
                                                                        title="Edit"><i class="fa fa-edit"></i></button>
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#EditUsersPassword{{ $user->id }}"
                                                                        title="Reset Password"><i
                                                                            class="fa fa-key"></i></button>
                                                                    <button type="button"
                                                                        class="btn btn-outline-danger  btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#DeleteUsers{{ $user->id }}"
                                                                        title="Delete"><i class="fa fa-trash"></i></button>
                                                                </td>
                                                            </tr>

                                                            <!-- Edit modal users -->
                                                            <div class="modal" id="EditUsers{{ $user->id }}">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content modal-content-demo">
                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title">Edit Users</h6><button
                                                                                aria-label="Close" class="close"
                                                                                data-dismiss="modal" type="button"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form
                                                                                action="{{ route('users.update', 'test') }}"
                                                                                method="POST">
                                                                                {{ method_field('patch') }}
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="name"
                                                                                            class="mr-sm-2">Name :</label>
                                                                                        <input id="name" type="text"
                                                                                            name="name"
                                                                                            value="{{ $user->name }}"
                                                                                            class="form-control" required>
                                                                                    </div>
                                                                                    <input id="id" type="hidden"
                                                                                        name="id" class="form-control"
                                                                                        value="{{ $user->id }}">
                                                                                    <div class="col">
                                                                                        <label for="email"
                                                                                            class="mr-sm-2">Username
                                                                                            :</label>
                                                                                        <input id="email" type="text"
                                                                                            name="email"
                                                                                            value="{{ $user->email }}"
                                                                                            class="form-control" required>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="department"
                                                                                            class="mr-sm-2">Department
                                                                                            :</label>
                                                                                        <select name="department"
                                                                                            class="custom-select text-lg-right"
                                                                                            required>
                                                                                            <!--placeholder-->
                                                                                            <option
                                                                                                value="{{ $user->department }}"
                                                                                                selected>
                                                                                                {{ $user->department }}
                                                                                            </option>
                                                                                            <option value="Appointment">
                                                                                                Appointment</option>
                                                                                            <option value="Reception">
                                                                                                Reception
                                                                                            </option>
                                                                                            <option
                                                                                                value="Update Information">
                                                                                                Update
                                                                                                Information</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <label for="roles_name"
                                                                                            class="mr-sm-2">Roles :</label>
                                                                                        <select name="roles_name"
                                                                                            class="custom-select text-lg-right"
                                                                                            required>
                                                                                            <!--placeholder-->
                                                                                            <option
                                                                                                value="{{ $user->roles_name }}"
                                                                                                selected>
                                                                                                {{ $user->roles_name }}
                                                                                            </option>
                                                                                            <option value="User">User
                                                                                            </option>
                                                                                            <option value="Admin">Admin
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="modal-footer">
                                                                                    <button class="btn ripple btn-primary"
                                                                                        type="submit">Save</button>
                                                                                    <button
                                                                                        class="btn ripple btn-secondary"
                                                                                        data-dismiss="modal"
                                                                                        type="button">Close</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Edit modal users -->

                                                            <!-- Edit modal UsersPassword -->
                                                            <div class="modal"
                                                                id="EditUsersPassword{{ $user->id }}">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content modal-content-demo">
                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title">Update Password</h6>
                                                                            <button aria-label="Close" class="close"
                                                                                data-dismiss="modal" type="button"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form
                                                                                action="{{ route('users.update', 'test') }}"
                                                                                method="POST">
                                                                                {{ method_field('patch') }}
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="name"
                                                                                            class="mr-sm-2">Name :</label>
                                                                                        <input id=""
                                                                                            type="text" name=""
                                                                                            value="{{ $user->name }}"
                                                                                            class="form-control" required
                                                                                            disabled>
                                                                                    </div>
                                                                                    <input id="id" type="hidden"
                                                                                        name="id"
                                                                                        class="form-control"
                                                                                        value="{{ $user->id }}">
                                                                                    <input id="UpdatePassword"
                                                                                        type="hidden"
                                                                                        name="UpdatePassword"
                                                                                        class="form-control"
                                                                                        value="true">
                                                                                </div>
                                                                                <br>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="password"
                                                                                            class="mr-sm-2">New Password
                                                                                            :</label>
                                                                                        <input id="password"
                                                                                            type="password"
                                                                                            name="password" value=""
                                                                                            class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <br>
                                                                                <div class="modal-footer">
                                                                                    <button class="btn ripple btn-primary"
                                                                                        type="submit">Save</button>
                                                                                    <button
                                                                                        class="btn ripple btn-secondary"
                                                                                        data-dismiss="modal"
                                                                                        type="button">Close</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Edit modal UsersPassword -->

                                                            <!-- Delete modal users -->
                                                            <div class="modal" id="DeleteUsers{{ $user->id }}">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content tx-size-sm">
                                                                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                                            <button aria-label="Close" class="close"
                                                                                data-dismiss="modal" type="button"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                            <i
                                                                                class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                                            <h4 class="tx-danger mg-b-20">Warning: Are you
                                                                                sure!</h4>
                                                                            <form
                                                                                action="{{ route('users.destroy', 'test') }}"
                                                                                method="POST">
                                                                                {{ method_field('Delete') }}
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <input id="name"
                                                                                            type="text" name="name"
                                                                                            value="{{ $user->name }}"
                                                                                            class="form-control text-lg-center"
                                                                                            disabled>
                                                                                    </div>
                                                                                    <input id="id" type="hidden"
                                                                                        name="id"
                                                                                        class="form-control"
                                                                                        value="{{ $user->id }}">
                                                                                </div>
                                                                                <br>
                                                                                <button type="submit"
                                                                                    class="btn ripple btn-danger pd-x-25">Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Delete modal users -->
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-content-body tab-pane p-4 border-top-0" id="sections">
                        <div class="card-body border">
                            <div class="row row-sm">
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div>
                                                <h6 class="main-content-label mb-1">Sections Table</h6>
                                                <p class="text-muted card-sub-title">Doctors Sections.</p>
                                            </div>
                                            <button type="button" class="btn btn-outline-primary"
                                                data-effect="effect-scale" data-toggle="modal"
                                                data-target="#AddSections">
                                                Add New
                                            </button>
                                            <br><br>
                                            <div class="table-responsive border">
                                                <table id="dtBasic1"
                                                    class="table text-nowrap text-md-nowrap table-striped mg-b-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach ($sections as $section)
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $section->name }}</td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#EditSections{{ $section->id }}"
                                                                        title="Edit"><i class="fa fa-edit"></i></button>
                                                                    {{-- <button type="button"
                                                                        class="btn btn-outline-danger  btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#DeleteSections{{ $section->id }}"
                                                                        title="Delete"><i
                                                                            class="fa fa-trash"></i></button> --}}
                                                                </td>
                                                            </tr>

                                                            <!-- Edit modal sections -->
                                                            <div class="modal" id="EditSections{{ $section->id }}">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content modal-content-demo">
                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title">Edit Sections</h6>
                                                                            <button aria-label="Close" class="close"
                                                                                data-dismiss="modal" type="button"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form
                                                                                action="{{ route('sections.update', 'test') }}"
                                                                                method="POST">
                                                                                {{ method_field('patch') }}
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="name"
                                                                                            class="mr-sm-2">Section Name
                                                                                            :</label>
                                                                                        <input id="name"
                                                                                            type="text" name="name"
                                                                                            value="{{ $section->name }}"
                                                                                            class="form-control" required>
                                                                                    </div>
                                                                                    <input id="id" type="hidden"
                                                                                        name="id"
                                                                                        class="form-control"
                                                                                        value="{{ $section->id }}">
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button class="btn ripple btn-primary"
                                                                                        type="submit">Save</button>
                                                                                    <button
                                                                                        class="btn ripple btn-secondary"
                                                                                        data-dismiss="modal"
                                                                                        type="button">Close</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Edit modal sections -->

                                                            <!-- Delete modal sections -->
                                                            <div class="modal" id="DeleteSections{{ $section->id }}">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content tx-size-sm">
                                                                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                                            <button aria-label="Close" class="close"
                                                                                data-dismiss="modal" type="button"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                            <i
                                                                                class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                                            <h4 class="tx-danger mg-b-20">Warning: Are you
                                                                                sure!</h4>
                                                                            <form
                                                                                action="{{ route('sections.destroy', 'test') }}"
                                                                                method="POST">
                                                                                {{ method_field('Delete') }}
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <input id="name"
                                                                                            type="text" name="name"
                                                                                            value="{{ $section->name }}"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                    <input id="id" type="hidden"
                                                                                        name="id"
                                                                                        class="form-control"
                                                                                        value="{{ $section->id }}">
                                                                                </div>
                                                                                <br>
                                                                                <button type="submit"
                                                                                    class="btn ripple btn-danger pd-x-25">Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Delete modal sections -->
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div>
                                                <h6 class="main-content-label mb-1">Nationalities Table</h6>
                                                <p class="text-muted card-sub-title">Doctors Nationality.</p>
                                            </div>
                                            <button type="button" class="btn btn-outline-primary"
                                                data-effect="effect-scale" data-toggle="modal"
                                                data-target="#AddNationalities">
                                                Add New
                                            </button>
                                            <br><br>
                                            <div class="table-responsive border">
                                                <table id="dtBasic"
                                                    class="table text-nowrap text-md-nowrap table-striped mg-b-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach ($nationalities as $nationalitie)
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $nationalitie->name }}</td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#EditNationalitie{{ $nationalitie->id }}"
                                                                        title="Edit"><i class="fa fa-edit"></i></button>
                                                                    {{-- <button type="button"
                                                                        class="btn btn-outline-danger btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#DeleteNationalitie{{ $nationalitie->id }}"
                                                                        title="Delete"><i
                                                                            class="fa fa-trash"></i></button> --}}
                                                                </td>
                                                            </tr>

                                                            <!-- Edit modal Nationalitie -->
                                                            <div class="modal"
                                                                id="EditNationalitie{{ $nationalitie->id }}">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content modal-content-demo">
                                                                        <div class="modal-header">
                                                                            <h6 class="modal-title">Edit Nationality</h6>
                                                                            <button aria-label="Close" class="close"
                                                                                data-dismiss="modal" type="button"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form
                                                                                action="{{ route('nationalities.update', 'test') }}"
                                                                                method="POST">
                                                                                {{ method_field('patch') }}
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <label for="name"
                                                                                            class="mr-sm-2">Nationality
                                                                                            :</label>
                                                                                        <input id="name"
                                                                                            type="text" name="name"
                                                                                            value="{{ $nationalitie->name }}"
                                                                                            class="form-control" required>
                                                                                    </div>
                                                                                    <input id="id" type="hidden"
                                                                                        name="id"
                                                                                        class="form-control"
                                                                                        value="{{ $nationalitie->id }}">
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button class="btn ripple btn-primary"
                                                                                        type="submit">Save</button>
                                                                                    <button
                                                                                        class="btn ripple btn-secondary"
                                                                                        data-dismiss="modal"
                                                                                        type="button">Close</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Edit modal Nationalitie -->

                                                            <!-- Delete modal Nationalitie -->
                                                            <div class="modal"
                                                                id="DeleteNationalitie{{ $nationalitie->id }}">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content tx-size-sm">
                                                                        <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                                            <button aria-label="Close" class="close"
                                                                                data-dismiss="modal" type="button"><span
                                                                                    aria-hidden="true">&times;</span></button>
                                                                            <i
                                                                                class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                                            <h4 class="tx-danger mg-b-20">Warning: Are you
                                                                                sure!</h4>
                                                                            <form
                                                                                action="{{ route('nationalities.destroy', 'test') }}"
                                                                                method="POST">
                                                                                {{ method_field('Delete') }}
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <input id="name"
                                                                                            type="text" name="name"
                                                                                            value="{{ $nationalitie->name }}"
                                                                                            class="form-control" disabled>
                                                                                    </div>
                                                                                    <input id="id" type="hidden"
                                                                                        name="id"
                                                                                        class="form-control"
                                                                                        value="{{ $nationalitie->id }}">
                                                                                </div>
                                                                                <br>
                                                                                <button type="submit"
                                                                                    class="btn ripple btn-danger pd-x-25">Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Delete modal Nationalitie -->
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!-- Add modal users -->
    <div class="modal" id="AddUsers">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add New User</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name" class="mr-sm-2">Name :</label>
                                <input id="name" type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="email" class="mr-sm-2">Username :</label>
                                <input id="email" type="text" name="email" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-4">
                                <label for="password" class="mr-sm-2">Password :</label>
                                <input id="password" type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-5">
                                <label for="department" class="mr-sm-2">Department :</label>
                                <select name="department" class="custom-select" required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="Appointment">Appointment</option>
                                    <option value="Reception">Reception</option>
                                    <option value="Update Information">Update Information</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="roles_name" class="mr-sm-2">Roles :</label>
                                <select name="roles_name" class="custom-select">
                                    <!--placeholder-->
                                    <option value="" selected disabled>
                                        ...
                                    </option>
                                    @foreach ($roles as $role)
                                        @if ($role->name == 'SuperAdmin')
                                            @php
                                                continue;
                                            @endphp
                                        @endif
                                        <option value="{{ $role->name }}"> {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">Save</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add modal users -->

    <!-- Add modal NewsBars -->
    <div class="modal" id="AddNewsBars">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add New NewsBar</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('newsBar.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <label for="content" class="mr-sm-2">Content :</label>
                                <input id="content" type="text" name="content" class="form-control text-lg-right"
                                    required>
                            </div>
                            <div class="col-4">
                                <label for="type" class="mr-sm-2">Type :</label>
                                <select name="type" class="custom-select text-lg-right" required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="عاجل">عاجل</option>
                                    <option value="جديد">جديد</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">Save</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add modal NewsBar -->

    <!-- Add modal sections -->
    <div class="modal" id="AddSections">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add New Sections</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sections.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name" class="mr-sm-2">Section Name :</label>
                                <input id="name" type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">Save</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add modal sections -->

    <!-- Add modal nationalities -->
    <div class="modal" id="AddNationalities">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add New Nationality</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nationalities.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="name" class="mr-sm-2">Nationality :</label>
                                <input id="name" type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">Save</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add modal nationalities -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sl-1.4.0/datatables.min.js">
    </script>
    <script>
        $(document).ready(function() {
            $('#dtBasic1').DataTable({
                "scrollY": "50vh",
                "scrollCollapse": true,
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#dtBasic').DataTable({
                "scrollY": "50vh",
                "scrollCollapse": true,
            });
        });
    </script>
@endsection
