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
                            <a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah</a>
                        </div>
                    </div>

                    <div class="table-responsive">

                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Type</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->nama_kriteria }}</td>
                                        <td>{{ $item->bobot_kriteria }}</td>
                                        <td>{{ $item->tipe_kriteria }}</td>
                                        <td>
                                            <a href="{{ route('kriteria.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                            <form action="{{ route('kriteria.delete', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
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
