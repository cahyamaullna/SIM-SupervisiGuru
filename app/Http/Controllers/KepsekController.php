<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Rekap;
use Illuminate\Support\Facades\DB;

class KepsekController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();

        return view('kepsek.index', compact('jadwal'))->with('i');
    }

    public function rekap()
    {
        $rekap = Rekap::all();

        $pelaksanaan = DB::table('pelaksanaan')
            ->get();

        $penilaian = DB::table('penilaian')
            ->get();

        $rpp = DB::table('rpp')
            ->get();

        return view('kepsek.rekap', compact('rekap', 'pelaksanaan', 'penilaian', 'rpp'))->with('i');
    }
}
