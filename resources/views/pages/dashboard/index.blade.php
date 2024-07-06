@extends('layouts.main')
@section('content')
    <div class="row justify-content-center">
        <!-- card1 start -->
        <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                    <span class="text-c-blue f-w-600">Kriteria</span>
                    <h4>{{ $kriteria }}</h4>
                </div>
            </div>
        </div>
        <!-- card1 end -->
        <!-- card1 start -->
        <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                    <span class="text-c-pink f-w-600">Karyawan</span>
                    <h4>{{ $karyawan }}</h4>
                </div>
            </div>
        </div>
        <!-- card1 end -->
        <!-- card1 start -->
        <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                    <span class="text-c-green f-w-600">Nilai</span>
                    <h4>{{ $nilai }}</h4>
                </div>
            </div>
        </div>
        <!-- card1 end -->
        <!-- card1 start -->
        <div class="col-md-6 col-xl-3">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                    <span class="text-c-yellow f-w-600">User</span>
                    <h4>{{ $user }}</h4>
                </div>
            </div>
        </div>
        <!-- card1 end -->
        <!-- Statestics Start -->
        {{-- <div class="col-md-12 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h5>Statestics</h5>
                    <div class="card-header-left ">
                    </div>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left "></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i>
                            </li>
                            <li><i class="icofont icofont-minus minimize-card"></i>
                            </li>
                            <li><i class="icofont icofont-refresh reload-card"></i>
                            </li>
                            <li><i class="icofont icofont-error close-card"></i>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    <div id="statestics-chart" style="height:517px;"></div>
                </div>
            </div>
        </div> --}}

        <!-- Email Sent End -->
    </div>
@endsection
