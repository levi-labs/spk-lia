@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="card">

                <div class="card-header">
                    <h5>{{ $title }}</h5>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-block table-border-style" style="">
                    <div class="row mx-2 my-1">
                        <div class="col-md-4">
                            <a href="{{ route('nilai.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Detail</th>
                                    <th>Karyawan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Nama:</td>
                                    <td>{{ $nilaix->karyawan->nama }}</td>
                                </tr>
                                <tr>
                                    <td>NIK:</td>
                                    <td>{{ $nilaix->karyawan->nik }}</td>
                                </tr>
                                <tr>
                                    <td>Email:</td>
                                    <td>{{ $nilaix->karyawan->email }}</td>
                                </tr>
                                <tr>
                                    <td>Jabatan:</td>
                                    <td>{{ $nilaix->karyawan->jabatan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card">

                <div class="card-header">
                    <h5>Daftar Nilai</h5>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card-block table-border-style" style="">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nilai_kriteria as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kriteria->nama_kriteria }}</td>
                                        <td>{{ $item->nilai_kriteria }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
