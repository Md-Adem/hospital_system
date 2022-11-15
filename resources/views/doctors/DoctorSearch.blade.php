@extends('layouts.master')
@section('css')
    <!-- Owl-carousel css-->
    <title>Doctors Card</title>
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />

    @livewireStyles
@endsection
@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">Doctor Card</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Doctor Card</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->


    <!-- row opened News Bar -->
    {{-- <div class="row" id="cryptoChart2">
        <div class="owl-carousel owl-theme">
            @foreach ($NewsBars as $NewsBar)
                <div class="col-md-12">
                    <div class="card custom-card">
                        <div class="card-body p-1 text-lg-center">
                            <h4 class="mg-b-0">{{ $NewsBar->content }}
                                @if ($NewsBar->type == 'عاجل')
                                    <span class="badge badge-pill badge-danger">{{ $NewsBar->type }}</span>
                                @elseif ($NewsBar->type == 'جديد')
                                    <span class="badge badge-pill badge-success">{{ $NewsBar->type }}</span>
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
    <!-- row closed -->


    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            @livewire('doctor-search')
        </div>
    </div>
    <!-- End Row -->
@endsection
@section('script')
    <!-- Internal Chart.Bundle js-->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Peity js-->
    <script src="{{ URL::asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>

    <!-- Owl Carousel js -->
    <script src="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.js') }}"></script>

    <!-- Sparkline js-->
    <script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Internal Dashboard js-->
    <script src="{{ URL::asset('assets/js/crypto-dashboard.js') }}"></script>
    @livewireScripts
@endsection
