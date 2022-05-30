<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Rekap;
use App\Models\Jadwal;
use App\Models\BerkasGuru;

class SupervisiController extends Controller
{
    public function store(Request $request, $id)
    {
        $jadwal = Jadwal::all()
            ->where('id', '=', $id)
            ->first();

        $guru = BerkasGuru::all()
            ->where('nama_guru', '=', $jadwal->guru)
            ->Where('jadwal', '=', $jadwal->jadwal)
            ->first();

        $jumlah1 =
            $request->nilai1  + $request->nilai2  +
            $request->nilai3  + $request->nilai4  +
            $request->nilai5  + $request->nilai6  +
            $request->nilai7  + $request->nilai8  +
            $request->nilai9  + $request->nilai10 +
            $request->nilai11 + $request->nilai12 +
            $request->nilai13 + $request->nilai14 +
            $request->nilai15 + $request->nilai16 +
            $request->nilai17 + $request->nilai18 +
            $request->nilai19 + $request->nilai20 +
            $request->nilai21 + $request->nilai22 +
            $request->nilai23 + $request->nilai24 +
            $request->nilai25 + $request->nilai26 +
            $request->nilai27 + $request->nilai28 +
            $request->nilai29;

        $hasil1 = round($jumlah1 / 116 * 100);

        $jumlah2 =
            $request->kondisi1 + $request->kondisi2 +
            $request->kondisi3 + $request->kondisi4 +
            $request->kondisi5 + $request->kondisi6 +
            $request->kondisi7 + $request->kondisi8 +
            $request->kondisi9;

        $hasil2 = round($jumlah2 / 36 * 100);

        $jumlah3 =
            $request->telaah1  + $request->telaah2  +
            $request->telaah3  + $request->telaah4  +
            $request->telaah5  + $request->telaah6  +
            $request->telaah7  + $request->telaah8  +
            $request->telaah9  + $request->telaah10 +
            $request->telaah11 + $request->telaah12 +
            $request->telaah13 + $request->telaah14 +
            $request->telaah15 + $request->telaah16 +
            $request->telaah17 + $request->telaah18 +
            $request->telaah19 + $request->telaah20;

        if ($request->telaah20 != null) {
            $hasil3 = round($jumlah3 * 100 / 40);
        } else {
            $hasil3 = round($jumlah3 * 100 / 38);
        }

        $nilai_akhir = round(($hasil1 + $hasil2 + $hasil3) / 3);

        if ($nilai_akhir > 90) {
            $keterangan = "Amat Baik";
        } elseif ($nilai_akhir > 80 && $nilai_akhir <= 90) {
            $keterangan = "Baik";
        } elseif ($nilai_akhir > 70 && $nilai_akhir <= 80) {
            $keterangan = "Cukup";
        } else {
            $keterangan = "Kurang";
        }

        Rekap::create([
            'nama' => $guru->nama_guru,
            'mata_pelajaran' => $guru->mata_pelajaran,
            'rpp' => $hasil3,
            'pelaksanaan' => $hasil1,
            'penilaian' => $hasil2,
            'nilai_akhir' => $nilai_akhir,
            'keterangan' => $keterangan,
        ]);

        $jadwal->update([
            'status' => 'Selesai',
        ]);

        if ($hasil1 < 70) {
            $predikat1 = "C";
        } elseif ($hasil1 >= 70 && $hasil1 <= 85) {
            $predikat1 = "B";
        } elseif ($hasil1 > 85) {
            $predikat1 = "A";
        }

        DB::table('pelaksanaan')->insert([
            'nama' => $guru->nama_guru,
            'mata_pelajaran' => $guru->mata_pelajaran,
            'jumlah' => $jumlah1,
            'nilai' => $hasil1,
            'predikat' => $predikat1
        ]);

        if ($hasil2 < 70) {
            $predikat2 = "C";
        } elseif ($hasil2 >= 70 && $hasil2 <= 85) {
            $predikat2 = "B";
        } elseif ($hasil2 > 85) {
            $predikat2 = "A";
        }

        DB::table('penilaian')->insert([
            'nama' => $guru->nama_guru,
            'mata_pelajaran' => $guru->mata_pelajaran,
            'jumlah' => $jumlah2,
            'nilai' => $hasil2,
            'predikat' => $predikat2
        ]);

        if ($hasil3 < 70) {
            $predikat3 = "C";
        } elseif ($hasil3 >= 70 && $hasil3 <= 85) {
            $predikat3 = "B";
        } elseif ($hasil3 > 85) {
            $predikat3 = "A";
        }

        DB::table('rpp')->insert([
            'nama' => $guru->nama_guru,
            'mata_pelajaran' => $guru->mata_pelajaran,
            'jumlah' => $jumlah3,
            'nilai' => $hasil3,
            'predikat' => $predikat3
        ]);


        return redirect('/supervisor');
    }
}
