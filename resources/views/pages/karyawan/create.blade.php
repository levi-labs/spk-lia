@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card">

                <div class="card-header">

                    <h5>{{ $title }}</h5>
                    <div class="row my-2 mx-2">
                        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                    <div class="card-header-right">
                        <i class="icofont icofont-spinner-alt-5"></i>
                    </div>

                </div>
                <div class="card-block">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h4 class="sub-title">Form Input Karyawan</h4>
                            <form action="{{ route('karyawan.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama Karyawan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama">
                                        @error('nama')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">NIK</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nik">
                                        @error('nik')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email">
                                        @error('email')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Jabatan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="jabatan">
                                        @error('jabatan')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Input Alignment card end -->
        </div>
    </div>
@endsection
