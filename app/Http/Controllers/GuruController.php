<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\BerkasGuru;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.guru.index');
    }

    public function jadwal()
    {
        return view('guru.guru.jadwal')->with('i');
    }

    public function store(Request $request)
    {
        $str = $request->nama_guru;

        $guru = strtolower(str_replace(array(
            ',', '.', ' '
        ), '', $str));

        $request->validate([
            'nama_guru' => 'required',
            'mata_pelajaran' => 'required',
            'kompetensi_dasar' => 'required',
            'materi' => 'required',
            'rombel' => 'required',
            'rpp' => 'required',
            'modul' => 'required',
            'instrumen' => 'required',
            'jadwal' => 'required',
        ]);

        BerkasGuru::create([
            'nama_guru' => $request->nama_guru,
            'mata_pelajaran' => $request->mata_pelajaran,
            'kompetensi_dasar' => $request->kompetensi_dasar,
            'materi' => $request->materi,
            'rombel' => $request->kompetensi_dasar,
            'rpp' => $request->file('rpp')->storeAs($guru, "rpp." . $request->file('rpp')->extension()),
            'modul' => $request->file('modul')->storeAs($guru, "modul_ajar." . $request->file('modul')->extension()),
            'instrumen' => $request->file('instrumen')->storeAs($guru, "intrumen_penilaian." . $request->file('instrumen')->extension()),
            'jadwal' => $request->jadwal,
        ]);

        $jadwal = Jadwal::all()
            ->where('guru', '=', $request->nama_guru)
            ->where('jadwal', '=', $request->jadwal)
            ->first();

        $jadwal->update([
            'berkas' => 'Diupload',
        ]);

        return redirect()->route('jadwal.guru')->with('success', 'Data Berhasil diupload');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::all()
            ->where('id', '=', $id)
            ->first();

        $berkas = BerkasGuru::all()
            ->where('nama_guru', '=', $jadwal->guru)
            ->Where('jadwal', '=', $jadwal->jadwal)
            ->first();

        $jadwal->update([
            'berkas' => 'Belum',
        ]);

        $berkas->delete();

        Storage::delete([$berkas->rpp, $berkas->modul, $berkas->instrumen]);

        return redirect('/guru/jadwal')->with('success', 'Berkas Berhasil dihapus');
    }
}
