@extends('layouts.master')
@section('css')
    <title>Appointments</title>
    <!-- Datepicker css -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/model-datepicker/css/datepicker.css') }}">
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Appointments Statistics</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Appointments</li>
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
                            <a class="nav-link active" data-toggle="tab" href="#appointments">Appointments</a>

                            <a class="nav-link" data-toggle="tab" href="#employees">Employees</a>
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
                    <div class="main-content-body tab-pane p-4 border-top-0 active" id="appointments">
                        <div class="card-body border">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div>
                                                <h6 class="main-content-label mb-1">Booked Appointments Table</h6>
                                            </div>
                                            <br>
                                            <button type="button" class="btn btn-outline-primary"
                                                data-effect="effect-scale" data-toggle="modal" data-target="">
                                                <!-- AddAppointments -->
                                                Add New Appointments
                                            </button>
                                            <br><br>
                                            <div class="table-responsive border">
                                                <table class="table  text-nowrap text-md-nowrap table-striped mg-b-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Employees Name</th>
                                                            <th>Count</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach ($appointments as $appointment)
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $appointment->date }}</td>
                                                                <td>{{ $appointment->employees->name }}</td>
                                                                <td>{{ $appointment->count }}</td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#EditEmployees{{ $appointment->id }}"
                                                                        title="Edit"><i class="fa fa-edit"></i></button>
                                                                </td>
                                                            </tr>

                                                            <!-- Edit modal users -->
                                                            {{-- <div class="modal" id="EditEmployees{{ $appointment->id }}">
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
                                                                                                Reception</option>
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
                                                            </div> --}}
                                                            <!-- End Edit modal users -->

                                                            <!-- Delete modal users -->
                                                            {{-- <div class="modal"
                                                                id="DeleteEmployees{{ $appointment->id }}">
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
                                                            </div> --}}
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
                    <div class="main-content-body tab-pane p-4 border-top-0" id="employees">
                        <div class="card-body border">
                            <div class="row row-sm">
                                <div class="col-lg-12">
                                    <div class="card custom-card">
                                        <div class="card-body">
                                            <div>
                                                <h6 class="main-content-label mb-1">Employees Table</h6>
                                            </div>
                                            <br>
                                            <button type="button" class="btn btn-outline-primary"
                                                data-effect="effect-scale" data-toggle="modal" data-target="#AddEmployees">
                                                Add New Employees
                                            </button>
                                            <br><br>
                                            <div class="table-responsive border">
                                                <table class="table  text-nowrap text-md-nowrap table-striped mg-b-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Code</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $i = 0;
                                                        @endphp
                                                        @foreach ($employees as $employee)
                                                            @php
                                                                $i++;
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $employee->name }}</td>
                                                                <td>{{ $employee->code }}</td>
                                                                <td>
                                                                    @if ($employee->status == 'Active')
                                                                        <span
                                                                            class="badge badge-success">{{ $employee->status }}</span>
                                                                    @elseif ($employee->status == 'inActive')
                                                                        <span
                                                                            class="badge badge-secondary">{{ $employee->status }}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-outline-primary btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#EditEmployees{{ $employee->id }}"
                                                                        title="Edit"><i class="fa fa-edit"></i></button>
                                                                    <button type="button"
                                                                        class="btn btn-outline-danger  btn-sm"
                                                                        data-toggle="modal"
                                                                        data-target="#DeleteEmployees{{ $employee->id }}"
                                                                        title="Delete"><i class="fa fa-trash"></i></button>
                                                                </td>
                                                            </tr>

                                                            <!-- Edit modal users -->
                                                            <div class="modal" id="EditEmployees{{ $employee->id }}">
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
                                                                                action="{{ route('employees.update', 'test') }}"
                                                                                method="POST">
                                                                                {{ method_field('patch') }}
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col-5">
                                                                                        <label for="name"
                                                                                            class="mr-sm-2">Employee
                                                                                            Name:</label>
                                                                                        <input id="name" type="text"
                                                                                            name="name"
                                                                                            value="{{ $employee->name }}"
                                                                                            class="form-control" required>
                                                                                        <input id="id"
                                                                                            type="hidden" name="id"
                                                                                            class="form-control"
                                                                                            value="{{ $employee->id }}">
                                                                                    </div>
                                                                                    <div class="col-4">
                                                                                        <label for="code"
                                                                                            class="mr-sm-2">Employee Code
                                                                                            :</label>
                                                                                        <input id="code"
                                                                                            type="text" name="code"
                                                                                            value="{{ $employee->code }}"
                                                                                            class="form-control" required>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <label for="status"
                                                                                            class="mr-sm-2">Status
                                                                                            :</label>
                                                                                        <select name="status"
                                                                                            class="custom-select" required>
                                                                                            <!--placeholder-->
                                                                                            <option
                                                                                                value="{{ $employee->status }}"
                                                                                                selected>
                                                                                                {{ $employee->status }}
                                                                                            </option>
                                                                                            <option value="Active">Active
                                                                                            </option>
                                                                                            <option value="inActive">
                                                                                                inActive
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

                                                            <!-- Delete modal users -->
                                                            <div class="modal" id="DeleteEmployees{{ $employee->id }}">
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
                                                                                action="{{ route('employees.destroy', 'test') }}"
                                                                                method="POST">
                                                                                {{ method_field('Delete') }}
                                                                                @csrf
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <input id="name"
                                                                                            type="text" name="name"
                                                                                            value="{{ $employee->name }}"
                                                                                            class="form-control text-lg-center"
                                                                                            disabled>
                                                                                    </div>
                                                                                    <input id="id" type="hidden"
                                                                                        name="id"
                                                                                        class="form-control"
                                                                                        value="{{ $employee->id }}">
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
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->


    <!-- Add modal Employees -->
    <div class="modal" id="AddEmployees">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add New Employee</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <label for="name" class="mr-sm-2">Employee Name :</label>
                                <input id="name" type="text" name="name" class="form-control" required>
                            </div>
                            <div class="col-4">
                                <label for="code" class="mr-sm-2">Employee Code :</label>
                                <input id="code" type="text" name="code" class="form-control" required>
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
    <!-- End Add modal Employees -->

    <!-- Add modal Appointments-->
    <div class="modal" id="AddAppointments">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add New Appointments</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('appointments.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-4 pt-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fe fe-calendar lh--9 op-6"></i>
                                        </div>
                                    </div>
                                    <input class="edit-item-date form-control" data-toggle="datepicker"
                                        placeholder="MM/DD/YYYY" name="date" id="date">
                                </div>
                            </div>
                            <div class="col-4">
                                <label for="employees_name" class="mr-sm-2">Employee Name</label>
                                <select name="employees_name" class="custom-select">
                                    <!--placeholder-->
                                    <option value="" selected disabled>
                                        ...
                                    </option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"> {{ $employee->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-3">
                                <label for="count" class="mr-sm-2">Appointments Numbers :</label>
                                <input id="count" type="text" name="count" class="form-control" required>
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
    <!-- End modal Appointments -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>

    <!-- Internal Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/model-datepicker/js/datepicker.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/model-datepicker/js/main.js') }}"></script>

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
