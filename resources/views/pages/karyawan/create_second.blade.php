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
                            <form action="{{ route('karyawan.store.second') }}" method="POST">
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
                                @php

                                @endphp
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Perilaku</label>
                                    <div class="col-sm-8">
                                        <select name="perilaku" class="form-control">
                                            <option selected disabled>Select Perilaku</option>
                                            <option value="4">Sangat Baik</option>
                                            <option value="3">Baik</option>
                                            <option value="2">Cukup</option>
                                            <option value="1">Tidak Baik</option>
                                        </select>
                                        @error('perilaku')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Kehadiran</label>
                                    <div class="col-sm-8">
                                        <select name="kehadiran" class="form-control">
                                            <option selected disabled>Select Kehadiran</option>
                                            <option value="4">Alfa 1</option>
                                            <option value="3">Alfa 2-3</option>
                                            <option value="2">Alfa 3-4</option>
                                            <option value="1">Alfa >5</option>
                                        </select>
                                        @error('kehadiran')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Masa Kerja</label>
                                    <div class="col-sm-8">
                                        <select name="masa_kerja" class="form-control">
                                            <option selected disabled>Select Masa Kerja</option>
                                            <option value="4"> >3 Tahun</option>
                                            <option value="3"> 2 Tahun</option>
                                            <option value="2"> 1 Tahun</option>
                                            <option value="1">
                                                < 6 Bulan </option>
                                        </select>
                                        @error('masa_kerja')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Pendidikan</label>
                                    <div class="col-sm-8">
                                        <select name="pendidikan" class="form-control">
                                            <option selected disabled>Select Type</option>
                                            <option value="4">S1</option>
                                            <option value="3">D3</option>
                                            <option value="2">SMA</option>
                                            <option value="1">SMP</option>
                                        </select>
                                        @error('pendidikan')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Pencapaian Target</label>
                                    <div class="col-sm-8">
                                        <select name="pencapaian_target" class="form-control">
                                            <option selected disabled>Select Type</option>
                                            <option value="4">91-100%</option>
                                            <option value="3">80-90%</option>
                                            <option value="2">60-79%</option>
                                            <option value="1">
                                                < 59% </option>
                                        </select>
                                        @error('pencapaian_target')
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
