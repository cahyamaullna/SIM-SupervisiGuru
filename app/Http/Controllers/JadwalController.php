<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\BerkasGuru;
use App\Models\User;

class JadwalController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'guru' => 'required',
            'supervisor' => 'required',
            'jadwal' => 'required',
        ]);

        Jadwal::create([
            'guru' => $request->guru,
            'supervisor' => $request->supervisor,
            'jadwal' => $request->jadwal,
            'status' => 'Belum',
            'berkas' => 'Belum',
        ]);

        return redirect('/kurikulum/jadwal')->with('success', 'Jadwal Berhasil dibuat');
    }

    public function edit($id)
    {
        $guru = User::all()
            ->where('role', '=', 'guru');

        $jadwal = Jadwal::all()
            ->where('id', '=', $id)
            ->first();

        return view('kurikulum.edit', compact('jadwal', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'guru' => 'required',
            'supervisor' => 'required',
            'jadwal' => 'required',
        ]);

        $jadwal = Jadwal::all()
            ->where('id', '=', $id)
            ->first();

        $jadwal->update([
            'guru' => $request->guru,
            'supervisor' => $request->supervisor,
            'jadwal' => $request->jadwal,
            'status' => 'Belum',
        ]);

        return redirect('/kurikulum/jadwal');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::all()
            ->where('id', '=', $id)
            ->first();

        $jadwal->delete();

        return redirect('/kurikulum/jadwal')->with('success', 'Jadwal Berhasil dihapus');
    }
}
