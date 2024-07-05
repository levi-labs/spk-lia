@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
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
                    <div class="row mx-2 my-2">
                        <div class="col-md-4">
                            <a href="{{ route('nilai.create') }}" class="btn btn-primary">Tambah</a>
                            <a href="{{ route('nilai.process') }}" class="btn btn-secondary">Process</a>
                        </div>
                    </div>

                    <div class="table-responsive">

                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Perilaku</th>
                                    <th>Kehadiran</th>
                                    <th>Masa Kerja</th>
                                    <th>Pendidikan</th>
                                    <th>Pencapaian Target</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($show_normalisasi as $item)
                                    @php
                                        $karyawan = \App\Models\Karyawan::find($item['karyawan_id']);
                                    @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $karyawan->nama }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                        <td>{{ $item[3] }}</td>
                                        <td>{{ $item[4] }}</td>
                                        <td>{{ $item[5] }}</td>
                                        {{-- <td>
                                            <a href="{{ route('nilai.detail', $item->karyawan->id) }}"
                                                class="btn btn-primary">Detail</a>
                                        </td> --}}
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
