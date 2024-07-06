<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kriteria;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title  = 'Daftar Karyawan';
        $data   = Karyawan::all();
        return view('pages.karyawan.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Halaman Input Karyawan';

        return view('pages.karyawan.create', compact('title'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik'       => 'required',
            'nama'      => 'required',
            'jabatan'   => 'required',
            'email'     => 'required',
        ]);

        try {
            $karyawan           = new Karyawan();
            $karyawan->nik      = $request->nik;
            $karyawan->nama     = $request->nama;
            $karyawan->jabatan  = $request->jabatan;
            $karyawan->email    = $request->email;
            $karyawan->save();
            return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function createSecond()
    {
        $title = 'Halaman Input Karyawan';

        return view('pages.karyawan.create_second', compact('title'));
    }
    public function storeSecond(Request $request)
    {
        $this->validate($request, [
            'nik'       => 'required',
            'nama'      => 'required',
            'jabatan'   => 'required',
            'email'     => 'required',
            'perilaku'  => 'required',
            'kehadiran' => 'required',
            'masa_kerja' => 'required',
            'pendidikan' => 'required',
            'pencapaian_target' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $karyawan           = new Karyawan();
            $karyawan->nik      = $request->nik;
            $karyawan->nama     = $request->nama;
            $karyawan->jabatan  = $request->jabatan;
            $karyawan->email    = $request->email;
            $karyawan->perilaku  = $request->perilaku;
            $karyawan->kehadiran = $request->kehadiran;
            $karyawan->masa_kerja = $request->masa_kerja;
            $karyawan->pendidikan = $request->pendidikan;
            $karyawan->pencapaian_target = $request->pencapaian_target;
            $karyawan->save();

            $kriteria = Kriteria::all();
            $temp_nilai = [
                $request->kehadiran,
                $request->kehadiran,
                $request->masa_kerja,
                $request->pendidikan,
                $request->pencapaian_target
            ];

            foreach ($kriteria as $key => $value) {
                $nilai = new Nilai();
                $nilai->kriteria_id = $value->id;
                $nilai->karyawan_id = $karyawan->id;
                $nilai->nilai_kriteria = $temp_nilai[$key];
                $nilai->save();
            }
            // $nilai->save();
            DB::commit();
            return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        $title = 'Halaman Edit Karyawan';
        return view('pages.karyawan.edit', compact('title', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $this->validate($request, [
            'nik'       => 'required',
            'nama'      => 'required',
            'jabatan'   => 'required',
            'email'     => 'required',
        ]);

        try {
            $karyawan->nik      = $request->nik;
            $karyawan->nama     = $request->nama;
            $karyawan->jabatan  = $request->jabatan;
            $karyawan->email    = $request->email;
            $karyawan->save();
            return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diubah');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        try {
            $karyawan->delete();
            return back()->with('success', 'Data karyawan berhasil dihapus');
        } catch (\Exception $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
