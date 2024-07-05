<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title       = 'Daftar Kriteria';
        $data        = Kriteria::all();
        return view('pages.kriteria.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title       = 'Halaman Input Kriteria';

        return view('pages.kriteria.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required',
            'tipe_kriteria' => 'required',
        ]);
        try {
            $kriteria = new Kriteria();
            $kriteria->nama_kriteria = $request->input('nama_kriteria');
            $kriteria->bobot_kriteria = $request->input('bobot_kriteria');
            $kriteria->tipe_kriteria = $request->input('tipe_kriteria');
            $kriteria->save();
            return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        $title       = 'Halaman Edit Kriteria';
        return view('pages.kriteria.edit', compact('title', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        $this->validate($request, [
            'nama_kriteria' => 'required',
            'bobot_kriteria' => 'required',
            'tipe_kriteria' => 'required',
        ]);
        try {
            $kriteria->update($request->all());
            return redirect()->route('kriteria.index')->with('success', 'Data kriteria berhasil diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        //
    }
}
