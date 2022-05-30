<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\BerkasGuru;
use Illuminate\Support\Facades\Storage;

class SupervisorController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();

        return view('guru.supervisor.index', compact('jadwal'))->with('i');
    }

    public function supervisi($id)
    {
        $jadwal = Jadwal::all()
            ->where('id', '=', $id)
            ->first();

        $jadwal->update([
            'status' => 'Proses',
        ]);

        return view('guru.supervisor.supervisi', compact('jadwal'));
    }

    public function download($id, $ket)
    {
        $jadwal = Jadwal::all()
            ->where('id', '=', $id)
            ->first();

        $berkas = BerkasGuru::all()
            ->where('nama_guru', '=', $jadwal->guru)
            ->where('jadwal', '=', $jadwal->jadwal)
            ->first();

        if ($ket == 'rpp') {
            return Storage::download($berkas->rpp);
        } elseif ($ket == 'modul') {
            return Storage::download($berkas->modul);
        } else {
            return Storage::download($berkas->instrumen);
        }
    }
}
