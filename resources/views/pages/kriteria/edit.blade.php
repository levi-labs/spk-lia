@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <!-- Basic Form Inputs card start -->
            <div class="card">

                <div class="card-header">

                    <h5>{{ $title }}</h5>
                    <div class="row my-2 mx-2">
                        <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Kembali</a>
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
                            <h4 class="sub-title">Form Edit Kriteria</h4>
                            <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama Kriteria</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama_kriteria"
                                            value="{{ $kriteria->nama_kriteria }}">
                                        @error('nama_kriteria')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Bobot</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="bobot_kriteria" min="0"
                                            value="{{ $kriteria->bobot_kriteria }}">
                                        @error('bobot_kriteria')
                                            <span class="text-danger text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Pilih Tipe</label>
                                    <div class="col-sm-8">
                                        <select name="tipe_kriteria" class="form-control">
                                            <option selected disabled>Select Type</option>
                                            <option {{ $kriteria->tipe_kriteria == 'benefit' ? 'selected' : '' }}
                                                value="benefit">Benefit</option>
                                            <option {{ $kriteria->tipe_kriteria == 'cost' ? 'selected' : '' }}
                                                value="cost">Cost</option>
                                        </select>
                                        @error('tipe_kriteria')
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
