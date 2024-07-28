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

        .footer-text {
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 2px;
            text-align: justify;
            line-height: 1.2;
        }

        .header-text {
            flex: 1;
            font-family: Arial, sans-serif;
            font-size: 14px;
            padding: 2px;
            text-align: justify;
            line-height: 1.5;
        }

        .my-row {
            display: flex;
            flex-direction: row;
            width: 100%;
            justify-content: space-between;

        }
    </style>


    <div class="table-print">
        <button id="btn-print" class="d-print-table" onclick="window.print()">Print</button>
        <div class="my-row">
            <div class="header-text">
                <p>
                    <b>Perihal: Hasil Penilaian Kinerja Karyawan</b>
                    <br>
                    Kepada Yth. <br>
                    Karyawan PT. Lia Pijer Energi
                    <br>

                    Dengan hormat,
                    Bersama surat ini, kami menyampaikan hasil penilaian kinerja Anda selama periode 1 tahun, yaitu dari
                    Agustus
                    2023 hingga Juli 2024
                    Berikut adalah hasil rekapitulasi penilaian kinerja karyawan:
                </p>
            </div>
            <div class="my-date">{{ Carbon\Carbon::now()->format('d-m-Y') }}</div>
        </div>

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

        <p class="footer-text">Kami mengapresiasi dedikasi dan kontribusi yang telah Anda berikan selama periode tersebut.
            Kami berharap
            Anda dapat mempertahankan dan meningkatkan kinerja Anda di masa mendatang. <br />
            Jika Anda memiliki pertanyaan atau memerlukan klarifikasi lebih lanjut mengenai hasil penilaian ini, silakan
            menghubungi HRD.<br />
            Terima kasih atas kerja keras dan komitmen Anda. Kami berharap dapat terus bekerja sama dengan Anda untuk
            mencapai tujuan bersama perusahaan.</p>

        <p style="float:right;">
            Hormat kami,<br>
            [Riamser Pane., S.H] <br>
            PT. Lia Pijer Energi

        </p>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.print();
        });
    </script>
@endsection
