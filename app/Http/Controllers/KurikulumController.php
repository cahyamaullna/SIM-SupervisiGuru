<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Rekap;
use App\Models\BerkasGuru;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RekapExport;

class KurikulumController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all()->where('status', '!=', "Selesai");

        $gurufltr = DB::table('users');
        $gurufltr->where('role', '=', 'guru');
        foreach ($jadwal as $row) {
            $gurufltr->where('name', '!=', $row->guru);
        }

        $guru = $gurufltr->get();

        $supervisor = User::all()
            ->where('role', '=', 'guru');

        return view('kurikulum.index', compact('guru', 'supervisor'));
    }

    public function jadwal()
    {
        $jadwal = Jadwal::all();

        return view('kurikulum.jadwal', compact('jadwal'))->with('i');
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

        return view('kurikulum.rekap', compact('rekap', 'pelaksanaan', 'penilaian', 'rpp'))->with('i');
    }

    public function berkas()
    {
        $berkas = BerkasGuru::all();

        return view('kurikulum.berkas', compact('berkas'))->with('i');
    }

    public function destroy($id)
    {

        $berkas = BerkasGuru::all()
            ->where('id', '=', $id)
            ->first();

        $berkas->delete();

        return redirect('/kurikulum/berkas')->with('success', 'Berkas Berhasil dihapus');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'role' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/kurikulum')->with('success', 'Akun Berhasil dibuat!');
    }
    public function exportexcel(){
        return Excel::download(new RekapExport, 'hasilsupervisi.xlsx');
    }
}
