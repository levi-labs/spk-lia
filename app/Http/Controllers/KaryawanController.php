<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

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
