@extends('pages.layout-print.body')
@section('surat')
    <style>
        .container {
            margin-left: 5%;
            margin-right: 5%;
            margin-bottom: 10px;
            padding: 20px;
            border: 2px solid black;
        }
    </style>


    <div class="table-print">
        <button id="btn-print" class="d-print-table" onclick="window.print()">Print</button>
        <center>
            <h4>Berikut adalah hasil rekapitulasi kinerja karyawan berdasarkan ranking</h4>
        </center>
        <table class="table table-bordered d-print-table" width="100%" border="2"
            style="border-collapse: collapse; border: 2px solid black;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->karyawan }}</td>
                        <td>{{ $item->nilai }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.print();
        });
    </script>
@endsection
