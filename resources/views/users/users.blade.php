@extends('layouts.master')
@section('css')
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Basic Tables</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </div>
        {{-- <div class="d-flex">
            <div class="justify-content-center">
                <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                    <i class="fe fe-download mr-2"></i> Import
                </button>
                <button type="button" class="btn btn-white btn-icon-text my-2 mr-2">
                    <i class="fe fe-filter mr-2"></i> Filter
                </button>
                <button type="button" class="btn btn-primary my-2 btn-icon-text">
                    <i class="fe fe-download-cloud mr-2"></i> Download Report
                </button>
            </div>
        </div> --}}
    </div>
    <!-- End Page Header -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Users Table</h6>
                        <p class="text-muted card-sub-title">Users Information.</p>
                    </div>
                    <button type="button" class="btn btn-outline-primary" data-effect="effect-scale" data-toggle="modal"
                        data-target="#AddUsers">
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
                                        <td><span class="badge badge-secondary">{{ $user->department }}</span></td>
                                        <td><span class="badge badge-success">{{ $user->roles_name }}</span></td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary btn-sm"
                                                data-toggle="modal" data-target="#EditUsers{{ $user->id }}"
                                                title="Edit"><i class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-outline-primary btn-sm"
                                                data-toggle="modal" data-target="#EditUsersPassword{{ $user->id }}"
                                                title="Reset Password"><i class="fa fa-key"></i></button>
                                            <button type="button" class="btn btn-outline-danger  btn-sm"
                                                data-toggle="modal" data-target="#DeleteUsers{{ $user->id }}"
                                                title="Delete"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- Edit modal users -->
                                    <div class="modal" id="EditUsers{{ $user->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Edit Users</h6><button aria-label="Close"
                                                        class="close" data-dismiss="modal" type="button"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('users.update', 'test') }}" method="POST">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name" class="mr-sm-2">Name :</label>
                                                                <input id="name" type="text" name="name"
                                                                    value="{{ $user->name }}" class="form-control"
                                                                    required>
                                                            </div>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $user->id }}">
                                                            <div class="col">
                                                                <label for="email" class="mr-sm-2">Username :</label>
                                                                <input id="email" type="text" name="email"
                                                                    value="{{ $user->email }}" class="form-control"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="department" class="mr-sm-2">Department
                                                                    :</label>
                                                                <select name="department"
                                                                    class="custom-select text-lg-right" required>
                                                                    <!--placeholder-->
                                                                    <option value="{{ $user->department }}" selected>
                                                                        {{ $user->department }}
                                                                    </option>
                                                                    <option value="Appointment">Appointment</option>
                                                                    <option value="Reception">Reception</option>
                                                                    <option value="Update Information">Update
                                                                        Information</option>
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <label for="roles_name" class="mr-sm-2">Roles :</label>
                                                                <select name="roles_name"
                                                                    class="custom-select text-lg-right" required>
                                                                    <!--placeholder-->
                                                                    <option value="{{ $user->roles_name }}" selected>
                                                                        {{ $user->roles_name }}
                                                                    </option>
                                                                    <option value="User">User</option>
                                                                    <option value="Admin">Admin</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="modal-footer">
                                                            <button class="btn ripple btn-primary"
                                                                type="submit">Save</button>
                                                            <button class="btn ripple btn-secondary" data-dismiss="modal"
                                                                type="button">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Edit modal users -->

                                    <!-- Edit modal UsersPassword -->
                                    <div class="modal" id="EditUsersPassword{{ $user->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Update Password</h6><button aria-label="Close"
                                                        class="close" data-dismiss="modal" type="button"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('users.update', 'test') }}" method="POST">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="name" class="mr-sm-2">Name :</label>
                                                                <input id="" type="text" name=""
                                                                    value="{{ $user->name }}" class="form-control"
                                                                    required disabled>
                                                            </div>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $user->id }}">
                                                            <input id="UpdatePassword" type="hidden"
                                                                name="UpdatePassword" class="form-control"
                                                                value="true">
                                                        </div>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="password" class="mr-sm-2">New Password
                                                                    :</label>
                                                                <input id="password" type="password" name="password"
                                                                    value="" class="form-control">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="modal-footer">
                                                            <button class="btn ripple btn-primary"
                                                                type="submit">Save</button>
                                                            <button class="btn ripple btn-secondary" data-dismiss="modal"
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
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content tx-size-sm">
                                                <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                    <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button> <i
                                                        class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                    <h4 class="tx-danger mg-b-20">Warning: Are you sure!</h4>
                                                    <form action="{{ route('users.destroy', 'test') }}" method="POST">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <input id="name" type="text" name="name"
                                                                    value="{{ $user->name }}"
                                                                    class="form-control text-lg-center" disabled>
                                                            </div>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $user->id }}">
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
                                <select name="department" class="custom-select text-lg-right" required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="Appointment">Appointment</option>
                                    <option value="Reception">Reception</option>
                                    <option value="Update Information">Update Information</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="roles_name" class="mr-sm-2">Roles :</label>
                                <select name="roles_name" class="custom-select text-lg-right">
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
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
