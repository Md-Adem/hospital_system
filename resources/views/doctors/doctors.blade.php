@extends('layouts.master')
@section('css')
    <title>Doctors table</title>
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Doctors</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Settings</a></li>
                <li class="breadcrumb-item active" aria-current="page">Doctors Table</li>
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
        <div class="col-md-12 col-lg-12">
            <div class="card custom-card">
                <div class="card-header  border-bottom-0 pb-0">
                    <div>
                        <div class="d-flex">
                            <label class="main-content-label my-auto pt-2">Doctors Table</label>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-outline-primary" data-effect="effect-scale" data-toggle="modal"
                        data-target="#AddDoctors">
                        Add New
                    </button>
                </div>
                <div class="card-body">
                    {{-- <div class="row table-filter">
                        <div class="col-lg-3">
                            <div class="show-entries">
                                <span>Show</span>
                                <select class="form-control">
                                    <option>5</option>
                                    <option>10</option>
                                    <option>15</option>
                                    <option>20</option>
                                </select>
                                <span>entries</span>
                            </div>
                        </div>
                        <div class="col-lg-9 d-lg-flex">
                            <div class="d-flex ml-auto mt-4 mr-4 mt-lg-0">
                                <div class="filter-group">
                                    <input type="text" class="form-control" placeholder="search">
                                </div>
                                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                            <div class="d-flex mt-4 mt-lg-0">
                                <div class="filter-group">
                                    <label>Location</label>
                                    <select class="form-control">
                                        <option>All</option>
                                        <option>Berlin</option>
                                        <option>London</option>
                                        <option>Madrid</option>
                                        <option>New York</option>
                                        <option>Paris</option>
                                    </select>
                                </div>
                                <div class="filter-group ml-3">
                                    <label>Status</label>
                                    <select class="form-control">
                                        <option>Any</option>
                                        <option>Delivered</option>
                                        <option>Shipped</option>
                                        <option>Pending</option>
                                        <option>Cancelled</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="table-responsive border">
                        <table id="dtBasic" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Doctor Name</th>
                                    <th>Nationality</th>
                                    <th>Section</th>
                                    <th>Specialization</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp

                                @foreach ($doctors as $doctor)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr class="border-bottom">
                                        <th scope="row">{{ $i }}</th>
                                        <td>{{ $doctor->code }}</td>
                                        <td>{{ $doctor->doctor_name }}</td>
                                        <td>{{ $doctor->nationalities->name }}</td>
                                        <td>{{ $doctor->sections->name }}</td>
                                        <td>{{ $doctor->specialization }}</td>
                                        {{-- <td>
                                            @if ($doctor->status == '1')
                                                <span class="status bg-success"></span>مفعل
                                            @elseif ($doctor->status == '0')
                                                <span class="status bg-danger"></span>غير مفعل
                                            @endif
                                        </td> --}}
                                        <td>
                                            <div class="button-list">
                                                <a type="button" data-toggle="modal" {{-- #EditDoctors{{ $doctor->id }} --}}
                                                    data-target=""title="Edit" class="btn"><i
                                                        class="ti ti-pencil"></i></a>
                                                <a type="button" data-toggle="modal"
                                                    data-target="#DeleteDoctors{{ $doctor->id }}" title="Delete"
                                                    class="btn"><i class="ti ti-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Edit modal Doctors -->
                                    <div class="modal" id="EditDoctors{{ $doctor->id }}">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content modal-content-demo">
                                                <div class="modal-header">
                                                    <h6 class="modal-title">Edit Doctors</h6><button aria-label="Close"
                                                        class="close" data-dismiss="modal" type="button"><span
                                                            aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('doctors.update', 'test') }}" method="POST">
                                                        {{ method_field('patch') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <input id="id" type="hidden" name="id"
                                                                    class="form-control" value="{{ $doctor->id }}">

                                                                <label for="code" class="mr-sm-2">Code :</label>
                                                                <input id="code" type="text" name="code"
                                                                    class="form-control" value="{{ $doctor->code }}"
                                                                    required>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="doctor_name" class="mr-sm-2">Name :</label>
                                                                <input id="doctor_name" type="text" name="doctor_name"
                                                                    class="form-control" value="{{ $doctor->doctor_name }}"
                                                                    required>
                                                            </div>
                                                            <div class="col-4">
                                                                <label for="doctor_nationalities"
                                                                    class="mr-sm-2">Nationality :</label>
                                                                <select name="doctor_nationalities" class="custom-select">
                                                                    <!--placeholder-->
                                                                    <option value="{{ $doctor->nationalities->id }}"
                                                                        selected disabled>
                                                                        {{ $doctor->nationalities->name }}
                                                                    </option>
                                                                    @foreach ($nationalities as $nationalitie)
                                                                        <option value="{{ $nationalitie->id }}">
                                                                            {{ $nationalitie->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <label for="doctor_sections" class="mr-sm-2">Sections
                                                                    :</label>
                                                                <select name="doctor_sections" class="custom-select">
                                                                    <!--placeholder-->
                                                                    <option value="{{ $doctor->sections->name }}" selected
                                                                        disabled>
                                                                        {{ $doctor->sections->name }}
                                                                    </option>
                                                                    @foreach ($sections as $section)
                                                                        <option value="{{ $section->id }}">
                                                                            {{ $section->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="specialization" class="mr-sm-2">Specialization
                                                                    :</label>
                                                                <input id="specialization" type="text"
                                                                    name="specialization" class="form-control"
                                                                    value="{{ $doctor->specialization }}" required>
                                                            </div>
                                                            <div class="col-2">
                                                                <label for="status" class="mr-sm-2">Status :</label>
                                                                <input id="status" type="text" name="status"
                                                                    class="form-control" value="{{ $doctor->status }}"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <label for="cases" class="mr-sm-2">Cases :</label>
                                                                <textarea name="cases" id="cases" cols="30" rows="10" class="form-control text-lg-right">{{ $doctor->cases }}</textarea>
                                                            </div>
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
                                    </div>
                                    <!-- End Edit modal Doctors -->

                                    <!-- Delete modal Doctors -->
                                    <div class="modal" id="DeleteDoctors{{ $doctor->id }}">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content tx-size-sm">
                                                <div class="modal-body tx-center pd-y-20 pd-x-20">
                                                    <button aria-label="Close" class="close" data-dismiss="modal"
                                                        type="button"><span aria-hidden="true">&times;</span></button> <i
                                                        class="icon icon ion-ios-close-circle-outline tx-100 tx-danger lh-1 mg-t-20 d-inline-block"></i>
                                                    <h4 class="tx-danger mg-b-20">Warning: Are you sure!</h4>
                                                    <form action="{{ route('doctors.destroy', 'test') }}" method="POST">
                                                        {{ method_field('Delete') }}
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col">
                                                                <input id="doctor_name" type="text" name="doctor_name"
                                                                    value="{{ $doctor->doctor_name }}"
                                                                    class="form-control text-lg-center" disabled>
                                                            </div>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $doctor->id }}">
                                                        </div>
                                                        <br>
                                                        <button type="submit"
                                                            class="btn ripple btn-danger pd-x-25">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Delete modal Doctors -->
                                @endforeach

                            </tbody>
                        </table>
                        {{-- <nav class="mt-3">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled"><a class="page-link" href="#">Prev</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!-- Add modal Doctors -->
    <div class="modal" id="AddDoctors">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add New Doctors</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('doctors.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <label for="code" class="mr-sm-2">Code :</label>
                                <input id="code" type="text" name="code" class="form-control" required>
                            </div>
                            <div class="col-6">
                                <label for="doctor_name" class="mr-sm-2">Name :</label>
                                <input id="doctor_name" type="text" name="doctor_name"
                                    class="form-control text-lg-right" required>
                            </div>
                            <div class="col-4">
                                <label for="doctor_nationalities" class="mr-sm-2">Nationality :</label>
                                <select name="doctor_nationalities" class="custom-select text-lg-right">
                                    <!--placeholder-->
                                    <option value="" selected disabled>
                                        ...
                                    </option>
                                    @foreach ($nationalities as $nationalitie)
                                        <option value="{{ $nationalitie->id }}"> {{ $nationalitie->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="doctor_sections" class="mr-sm-2">Sections :</label>
                                <select name="doctor_sections" class="custom-select text-lg-right">
                                    <!--placeholder-->
                                    <option value="" selected disabled>
                                        ...
                                    </option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}"> {{ $section->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="specialization" class="mr-sm-2">Specialization :</label>
                                <input id="specialization" type="text" name="specialization"
                                    class="form-control text-lg-right" required placeholder="التخصص الدقيق"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'التخصص الدقيق'">
                            </div>
                            <div class="col-2">
                                <label for="gender" class="mr-sm-2">Gender :</label>
                                <select name="gender" class="custom-select text-lg-right">
                                    <!--placeholder-->
                                    <option value="" selected disabled>...</option>
                                    <option value="ذكر">ذكر</option>
                                    <option value="انثى">انثى</option>
                                </select>
                            </div>
                            {{-- <div class="col-2">
                                <label for="status" class="mr-sm-2">Status :</label>
                                <input id="status" type="text" name="status" class="form-control" required>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="ages" class="mr-sm-2">Accept Ages :</label>
                                <input id="ages" type="text" name="ages" class="form-control text-lg-right"
                                    required placeholder="الاعمار التي يستقبلها" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'الاعمار التي يستقبلها'">
                            </div>
                            <div class="col-6">
                                <label for="except" class="mr-sm-2">Except :</label>
                                <input id="except" type="text" name="except" class="form-control text-lg-right"
                                    placeholder="ما عدا" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'ما عدا'">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="qualification" class="mr-sm-2">Qualification :</label>
                                <textarea name="qualification" id="qualification" cols="30" rows="5" class="form-control text-lg-right"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="cases" class="mr-sm-2">Cases :</label>
                                <textarea name="cases" id="cases" cols="30" rows="5" class="form-control text-lg-right"></textarea>
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
    <!-- End Add modal Doctors -->
@endsection
@section('script')
    <!-- Internal Check-all-mail js-->
    <script src="{{ URL::asset('assets/js/check-all-mail.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/datatables.min.js"></script>


    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/r-2.3.0/sl-1.4.0/datatables.min.js">
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
