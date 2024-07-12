<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Polyfill\Intl\Idn\Idn;

use function Laravel\Prompts\select;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Halaman Daftar Nilai';
        $kriteria = Kriteria::all();
        $data = DB::table('nilai')
            ->join('karyawan', 'karyawan.id', '=', 'nilai.karyawan_id')
            ->select('karyawan.nama', 'karyawan.id')
            ->groupBy('karyawan.id', 'karyawan.nama')
            ->get();

        return view('pages.nilai.index', compact('title', 'data', 'kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Halaman Tambah Nilai';
        $karyawan = DB::table('karyawan')->whereNotIn('id', function ($query) {
            $query->select('karyawan_id')->from('nilai');
        })->get();
        $kriteria = Kriteria::all();
        return view('pages.nilai.create', compact('title', 'kriteria', 'karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'karyawan' => 'required',
            'nilai_kriteria' => 'required',
        ]);

        try {
            $nama = $request->karyawan;
            $kriteria_id = $request->kriteria_id;
            $nilai = $request->nilai_kriteria;

            for ($i = 0; $i < count($kriteria_id); $i++) {
                $data = new Nilai();
                $data->kriteria_id = $kriteria_id[$i];
                $data->karyawan_id = $nama;
                $data->nilai_kriteria = $nilai[$i];
                $data->save();
            }

            return redirect()->route('nilai.index')->with('success', 'Data Nilai ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Nilai $karyawan)
    {

        $title = 'Halaman Detail Nilai';

        $nilai_kriteria = Nilai::where('karyawan_id', $karyawan->id)->get();
        $nilaix = Nilai::where('karyawan_id', $karyawan->id)->first();


        return view('pages.nilai.show', compact('title', 'nilai_kriteria', 'nilaix'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        $title = 'Halaman Edit Nilai';

        $kriteria = Kriteria::all();
        $karyawan = Karyawan::where('id', $nilai->karyawan_id)->first();
        $nilai = Nilai::where('karyawan_id', $nilai->karyawan_id)->get();

        return view('pages.nilai.edit', compact('title', 'kriteria', 'nilai', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        $this->validate($request, [
            'karyawan' => 'required',
            'nilai_kriteria' => 'required',
        ]);

        try {
            $kriteria_id = $request->kriteria_id;
            $karyawan_id = $request->karyawan;
            $nilai_id = $request->nilai_id;
            $nilai_kriteria = $request->nilai_kriteria;

            for ($i = 0; $i < count($kriteria_id); $i++) {
                $data = Nilai::find($nilai_id[$i]);
                $data->kriteria_id = $kriteria_id[$i];
                $data->karyawan_id = $karyawan_id;
                $data->nilai_kriteria = $nilai_kriteria[$i];
                $data->save();
            }

            return redirect()->route('nilai.index')->with('success', 'Data Nilai berhasil diubah');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        try {

            $data = Nilai::where('karyawan_id', $id)->delete();
            return back()->with('success', 'Data Nilai berhasil dihapus');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function getResult()
    {


        $title = 'Halaman Hasil Perhitungan Nilai';

        $kriteria = Kriteria::all();
        $karyawan = Karyawan::all();
        $nilai    = Nilai::get()->toArray();
        $new_array     = [];
        $reverse_array = [];

        foreach ($karyawan as $key => $value) {
            $nilairesult  = Nilai::where('karyawan_id', $value->id)->get();
            foreach ($nilairesult as $k => $v) {
                $new_array[$key][$k]['id'] = $v->kriteria_id;
                $new_array[$key][$k]['karyawan_id'] = $v->karyawan_id;
                $new_array[$key][$k]['nilai'] = $v->nilai_kriteria;
                // $new_array[$key][$k] = $v->nilai_kriteria;
            }
        }


        // dd($new_array);

        for ($i = 0; $i < count($new_array); $i++) {
            for ($j = 0; $j < count($new_array[$i]); $j++) {
                $reverse_array[$j][$i]['nilai'] = $new_array[$i][$j];
            }
        }

        $max = [];
        $min = [];
        // dd($reverse_array);
        for ($i = 0; $i < count($reverse_array); $i++) {
            for ($j = 0; $j < count($reverse_array[$i]); $j++) {
                $value = $reverse_array[$i][$j]['nilai']['nilai'];

                if (empty($max[$i])) {
                    $max[$i] = $value;
                } else {
                    $max[$i] = max($max[$i], $value);
                }

                if (empty($min[$i])) {
                    $min[$i] = $value;
                } else {
                    $min[$i] = min($min[$i], $value);
                }
            }
        }
        // dd($min, $max);


        // dd($reverse_array);


        $normalisasi = [];
        $kritera_count = Kriteria::count();

        for ($z = 0; $z < count($reverse_array); $z++) {
            for ($x = 0; $x < count($reverse_array[$z]); $x++) {

                $krit = Kriteria::where('id', $reverse_array[$z][$x]['nilai']['id'])->first();
                // dd($krit->tipe_kriteria);
                // dd($max, $min);
                if ($krit->tipe_kriteria === 'benefit') {
                    $normalisasi[$z][$x]['id'] = $reverse_array[$z][$x]['nilai']['id'];
                    $normalisasi[$z][$x]['karyawan_id'] = $reverse_array[$z][$x]['nilai']['karyawan_id'];
                    $normalisasi[$z][$x]['nilai'] = $reverse_array[$z][$x]['nilai']['nilai'] / $max[$z];
                } elseif ($krit->tipe_kriteria === 'cost') {
                    $normalisasi[$z][$x]['id'] = $reverse_array[$z][$x]['nilai']['id'];
                    $normalisasi[$z][$x]['karyawan_id'] = $reverse_array[$z][$x]['nilai']['karyawan_id'];
                    $normalisasi[$z][$x]['nilai'] = $min[$z] / $reverse_array[$z][$x]['nilai']['nilai'];
                }
            }
        }
        // dd($normalisasi);
        $matrix = [];

        // for ($i = 0; $i < count($normalisasi); $i++) {
        //     for ($j = 0; $j < count($normalisasi[$i]); $j++) {
        //         $matrix[$i][$j] = $normalisasi[$i][$j]['nilai'];
        //     }
        // }
        $rearrangedArray = [];
        foreach ($normalisasi as $row) {
            foreach ($row as $index => $value) {
                if (!isset($rearrangedArray[$index])) {
                    $rearrangedArray[$index] = [];
                }
                $rearrangedArray[$index][] = $value;
            }
        }



        for ($i = 0; $i < count($rearrangedArray); $i++) {
            for ($j = 0; $j < count($rearrangedArray[$i]); $j++) {
                $bobot = Kriteria::where('id', $rearrangedArray[$i][$j]['id'])->first();
                $normalisasi_bobot = $bobot->bobot_kriteria / 100;

                $matrix[$i][$j]['id'] = $rearrangedArray[$i][$j]['id'];
                $matrix[$i][$j]['karyawan_id'] = $rearrangedArray[$i][$j]['karyawan_id'];
                $matrix[$i][$j]['nilai'] = $rearrangedArray[$i][$j]['nilai'] * $normalisasi_bobot;
            }
        }

        $show_normalisasi = [];

        foreach ($rearrangedArray as $key => $value) {
            foreach ($value as $k =>  $val) {
                $index = $val['karyawan_id'];
                if (!isset($show_normalisasi[$key])) {
                    $show_normalisasi[] = [
                        'id' => $val['id'],
                        'karyawan_id' => $val['karyawan_id'],

                    ];
                }

                if ($val['karyawan_id'] === $show_normalisasi[$key]['karyawan_id']) {

                    $show_normalisasi[$key][$val['id']] = $val['nilai'];
                } else {
                    $show_normalisasi[$val['karyawan_id']][$val['id']] = $val['nilai'];
                }
            }
        }
        // dd($show_normalisasi);
        // dd($mappedArray);

        // dd($matrix);

        $total = [];
        foreach ($matrix as $i => $row) {
            $total[$i] = ['karyawan_id' => $row[0]['karyawan_id'], 'nilai' => 0]; // Initialize the key with 'karyawan_id' and 'nilai'
            foreach ($row as $j => $item) {
                $total[$i]['nilai'] += $item['nilai'];
            }
        }
        DB::table('ranking')->truncate();
        $output = new ConsoleOutput();
        foreach ($total as $key => $value) {

            DB::table('ranking')->insert([
                'karyawan_id' => $value['karyawan_id'],
                'nilai' => $value['nilai'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $output->writeln('Creating sample users...');
        }

        $ranking = DB::table('ranking')
            ->join('karyawan', 'karyawan.id', '=', 'ranking.karyawan_id')
            ->select('karyawan.nama', 'karyawan.id', 'ranking.nilai')
            ->orderBy('ranking.nilai', 'desc')
            ->get();
        // dd($new_array, $rearrangedArray, $rangking, $nilai);
        return view('pages.nilai.ranking', compact(
            'title',
            'nilai',
            'ranking',
            'rearrangedArray',
            'new_array',
            'show_normalisasi'
        ));

        // dd($min, $max);
    }


    public function ranking()
    {

        $title = 'Halaman Ranking';
        $ranking = DB::table('ranking')
            ->join('karyawan', 'karyawan.id', '=', 'ranking.karyawan_id')
            ->select('karyawan.nama', 'karyawan.id', 'ranking.nilai')
            ->orderBy('nilai', 'desc')->get();

        return view('pages.nilai.ranking', compact('title', 'ranking'));
    }
}
