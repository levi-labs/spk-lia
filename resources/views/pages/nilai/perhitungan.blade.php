@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Nilai Skala</h5>
                </div>
                <div class="card-block table-border-style" style="">
                    <div class="row mx-2 my-2">
                        <div class="col-md-4">
                            <a href="{{ route('nilai.index') }}" class="btn btn-primary">Kembali</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    @php
                                        $kriteria = \App\Models\Kriteria::all();
                                    @endphp
                                    @foreach ($kriteria as $item)
                                        <th>{{ $item->nama_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    dd($data_skala);
                                @endphp --}}
                                @foreach ($data_skala as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                        <td>{{ $item[3] }}</td>
                                        <td>{{ $item[4] }}</td>
                                        <td>{{ $item[5] }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Nilai Normalisasi</h5>
                </div>
                <div class="card-block table-border-style" style="">
                    <div class="row mx-2 my-2">
                        {{-- <div class="col-md-4">
                            <a href="#ranking" class="btn btn-primary">Ranking</a>
                        </div> --}}
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    @php
                                        $kriteria = \App\Models\Kriteria::all();
                                    @endphp
                                    @foreach ($kriteria as $item)
                                        <th>{{ $item->nama_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    dd($data_skala);
                                @endphp --}}
                                @foreach ($show_normalisasi as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['nama'] }}</td>
                                        <td>{{ $item[1] }}</td>
                                        <td>{{ $item[2] }}</td>
                                        <td>{{ $item[3] }}</td>
                                        <td>{{ $item[4] }}</td>
                                        <td>{{ $item[5] }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="row" id="ranking">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Ranking</h5>
                </div>
                <div class="card-block table-border-style" style="">
                    <div class="row mx-2 my-2">
                        <div class="col-md-4">
                            {{-- <a href="{{ route('nilai.index') }}" class="btn btn-primary">Kembali</a> --}}
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ranking as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 ">
            <div class="card">
                <div class="card-header">
                    <h5>Nilai Ranking</h5>
                    {{-- <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span> --}}
                    <div class="card-header-right"> <i class="icofont icofont-spinner-alt-5"></i> </div>
                </div>
                <div class="card-block">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        const generateRandomColor = () => {
            return '#' + Math.floor(Math.random() * 16777215).toString(16);
        };
        const randomColors = Array.from({
            length: {!! $ranking->count() !!}
        }, generateRandomColor);
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($ranking->pluck('nama')->toArray()) !!},
                datasets: [{
                    label: 'Score',
                    data: {!! json_encode($ranking->pluck('nilai')->toArray()) !!},
                    borderWidth: 1,
                    backgroundColor: randomColors
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
