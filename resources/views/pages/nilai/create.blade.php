@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card">

                <div class="card-header">

                    <h5>{{ $title }}</h5>
                    <div class="row my-2 mx-2">
                        <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
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
                            <h4 class="sub-title">Form Input Kriteria</h4>
                            <form action="{{ route('nilai.store') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Pilih Karyawan</label>
                                    <div class="col-sm-8">
                                        <select name="karyawan" class="form-control">
                                            <option selected disabled>Select Karyawan</option>
                                            @foreach ($karyawan as $dt)
                                                <option value="{{ $dt->id }}">{{ $dt->nama }}</option>
                                            @endforeach
                                        </select>
                                        @error('tipe_kriteria')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                @foreach ($kriteria as $kr)
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">{{ $kr->nama_kriteria }}</label>
                                        <div class="col-sm-8">
                                            <input type="hidden" name="kriteria_id[]" id=""
                                                value="{{ $kr->id }}">
                                            <input type="number" class="form-control" name="nilai_kriteria[]"
                                                min="0">
                                            @error('nilai_kriteria')
                                                <span class="text-danger text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach



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
