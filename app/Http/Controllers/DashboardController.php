<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Kriteria;
use App\Models\Nilai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $title      = 'Dashboard';
        $kriteria   = Kriteria::count();
        $x      = DB::table('nilai')
            ->join('karyawan', 'karyawan.id', '=', 'nilai.karyawan_id')
            ->select('karyawan.nama', 'karyawan.id')
            ->groupBy('karyawan.id', 'karyawan.nama')
            ->get();
        $nilai = count($x);
        $karyawan   = Karyawan::count();
        $user       = User::count();

        return view('pages.dashboard.index', compact('title', 'kriteria', 'karyawan', 'user', 'nilai'));
    }
}
