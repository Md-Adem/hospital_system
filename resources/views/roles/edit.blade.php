@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/treeview/treeview-rtl.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Edit Permission</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                    <!-- row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mg-b-20">
                                <div class="card-body">
                                    <div class="main-content-label mg-b-5">
                                        <div class="form-group">
                                            <p>اسم الصلاحية :</p>
                                            {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-lg-4">
                                            <ul id="treeview1">
                                                <li><a href="#">الصلاحيات</a>
                                                    <ul>
                                                        <li>
                                                            @foreach ($permission as $value)
                                                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                                    {{ $value->name }}</label>
                                                                <br />
                                                            @endforeach
                                                        </li>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-main-primary">تحديث</button>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row closed -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/plugins/treeview/treeview.js') }}"></script>
@endsection
