@extends('layouts.master')
@section('css')
    <title>Roles & Permission</title>
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Roles Tables</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->


    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="main-content-label mb-1">Roles Table</h6>
                        <p class="text-muted card-sub-title">Roles Names.</p>
                    </div>
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('roles.create') }}">Add New Role</a>
                    <br><br>
                    <div class="table-responsive border">
                        <table class="table  text-nowrap text-md-nowrap table-striped mg-b-0">
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
                                @foreach ($roles as $role)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $role->name }}</td>
                                        {{-- <td>{{ $user->email }}</td>
                                        <td>{{ $user->department }}</td>
                                        <td>{{ $user->roles }}</td> --}}
                                        <td>
                                            {{-- <button type="button" class="btn btn-outline-primary btn-sm"><a
                                                    class="btn btn-sm" href="{{ route('roles.show', $role->id) }}"></a><i
                                                    class="fa fa-edit"></i></button> --}}
                                            <button type="button" class="btn btn-outline-primary btn-sm"><a
                                                    class="btn btn-sm" href="{{ route('roles.edit', $role->id) }}"></a><i
                                                    class="fa fa-edit"></i></button>
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-primary"
                                                title="تعديل"><i class="las la-pen"></i></a>
                                            <button type="button" class="btn btn-outline-danger  btn-sm"
                                                data-toggle="modal" data-target="#DeleteUsers{{ $role->id }}"
                                                title="Delete"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>

                                    <!-- Edit modal users -->
                                    {{-- <div class="modal" id="EditUsers{{ $role->id }}">
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
                                                            <!-- col -->
                                                            <div class="col-lg-4">
                                                                <ul id="treeview1">
                                                                    <li><a href="#">{{ $role->name }}</a>
                                                                        <ul>
                                                                            @if (!empty($rolePermissions))
                                                                                @foreach ($rolePermissions as $v)
                                                                                    <li>{{ $v->name }}</li>
                                                                                @endforeach
                                                                            @endif
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                                <select name="roles_name"
                                                                    class="custom-select text-lg-right">
                                                                    <!--placeholder-->
                                                                    <option value="" selected disabled>
                                                                        ...
                                                                    </option>
                                                                    @if (!empty($rolePermissions))
                                                                        @foreach ($rolePermissions as $v)
                                                                            <option value="{{ $v->name }}">
                                                                                {{ $v->name }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <!-- /col -->
                                                        </div>
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
                                    </div> --}}
                                    <!-- End Edit modal users -->

                                    <!-- Edit modal UsersPassword -->
                                    {{-- <div class="modal" id="EditUsersPassword{{ $user->id }}">
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
                                    </div> --}}
                                    <!-- End Edit modal UsersPassword -->

                                    <!-- Delete modal users -->
                                    <div class="modal" id="DeleteUsers{{ $role->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content tx-size-sm">
                                                <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                    <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button> <i
                                                        class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                    <h4 class="tx-danger mg-b-20">Warning: Are you sure!</h4>
                                                    <form action="{{ route('roles.destroy', 'test') }}" method="POST">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <input id="name" type="text" name="name"
                                                                    value="{{ $role->name }}"
                                                                    class="form-control text-lg-center" disabled>
                                                            </div>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $role->id }}">
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
    {{-- <div class="modal" id="AddUsers">
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
                                <label for="roles" class="mr-sm-2">Roles :</label>
                                <select name="roles" class="custom-select text-lg-right" required>
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
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
    </div> --}}
    <!-- End Add modal users -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
@endsection
