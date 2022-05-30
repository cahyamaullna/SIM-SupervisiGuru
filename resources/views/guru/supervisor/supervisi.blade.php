@extends('guru.supervisor.layout.main')
@section('nav')
<a class="tab tab-lg tab-border-none tab-lifted tab-active" href="/supervisi">Supervisi</a>
@endsection
@section('supervisor')
@php
use Illuminate\Support\Facades\DB;

$pelaksanaan = DB::table('supervisi')
->where('supervisi', '=', '1')
->get();

$penilaian = DB::table('supervisi')
->where('supervisi', '=', '2')
->get();

$rpp = DB::table('supervisi')
->where('supervisi', '=', '3')
->get();

$berkas = DB::table('berkas_guru')
->where('jadwal', '=', $jadwal->jadwal)
->where('nama_guru', '=', $jadwal->guru)
->first();

$i1 = 0;
$i2 = 0;
$i3 = 0;

$n10 = 0;
$n11 = 0;
$n12 = 0;
$n13 = 0;
$n14 = 0;

$k1 = 0;
$k2 = 0;
$k3 = 0;
$k4 = 0;
$k5 = 0;

$t1 = 0;
$t2 = 0;
$t3 = 0;


@endphp

<div class="lg:text-sm text-xs">
    <div class="rounded-lg border border-slate-600">
        <table class="w-full">
            <tr class="bg-sky-100">
                <th colspan="8" class="rounded-t-lg border-b border-slate-600 p-2">DATA GURU</th>
            </tr>
            <tr>
                <td class="border-b border-r border-slate-600 p-2">
                    Nama guru
                </td>
                <td class="border-b border-slate-600 p-2">{{ $berkas->nama_guru }}</td>
            </tr>
            <tr>
                <td class="border-b border-r border-slate-600 p-2">Mata Pelajaran</td>
                <td class="border-b border-slate-600 p-2">{{ $berkas->mata_pelajaran }}</td>
            </tr>
            <tr>
                <td class="border-b border-r border-slate-600 p-2">Kompetensi Dasar</td>
                <td class="border-b border-slate-600 p-2">{{ $berkas->kompetensi_dasar }}</td>
            </tr>
            <tr>
                <td class="border-b border-r border-slate-600 p-2">Materi</td>
                <td class="border-b border-slate-600 p-2">{{ $berkas->materi }}</td>
            </tr>
            <tr>
                <td class="border-r border-slate-600 p-2">Rombel/Semester</td>
                <td class="p-2">{{ $berkas->rombel }}</td>
            </tr>
        </table>
    </div>

    <form action="{{ route('supervisi.store', $jadwal->id) }}" method="post">
        @csrf
        <div class="rounded-lg border border-slate-500 mt-8">
            <table class="w-full">
                <tr class="bg-sky-100">
                    <th colspan="8" class="rounded-t-lg border-b border-slate-600 p-2">SUPERVISI PELAKSANAAN PEMBELAJARAN</th>
                </tr>
                <tr class="bg-sky-100">
                    <th colspan="2" rowspan="2" class="text-left border-b border-r p-2 border-slate-600">Aspek yang Diamati</th>
                    <th colspan="5" class="text-center border-b p-2 border-slate-600">Ya/Tdk</th>
                </tr>
                <tr class="bg-sky-100">
                    <th rowspan="2" class="border-b border-r p-2 border-slate-600">Tdk</th>
                    <th colspan="4" class="border-b p-2 border-slate-600">Ya</th>
                </tr>
                <tr class="text-center bg-sky-100">
                    <th colspan="2" class="border-b border-r p-2 border-slate-600 text-left">Kegiatan Pendahuluan</th>
                    <th class="border p-2 border-slate-600">1</th>
                    <th class="border p-2 border-slate-600">2</th>
                    <th class="border p-2 border-slate-600">3</th>
                    <th class="border-b p-2 border-slate-600">4</th>
                </tr>
                <tr class="bg-red-100">
                    <th colspan="2" class="border-b border-r p-2 border-slate-600 text-left">Apresiasi dan Motivasi</th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border-b p-2 border-slate-600"></th>
                </tr>

                @foreach($pelaksanaan as $v)
                <tr>
                    <td class="border-b border-r p-2 border-slate-600 text-center">{{ ++$i1 }}</td>
                    <td class="border p-2 border-slate-600">{{ $v->keterangan }}</td>
                    <td class="border p-2 border-slate-600"><input type="radio" name="nilai{{ ++$n10 }}" class="radio radio-accent" value="0" /></td>
                    <td class="border p-2 border-slate-600"><input type="radio" name="nilai{{ ++$n11 }}" class="radio radio-accent" value="1" /></td>
                    <td class="border p-2 border-slate-600"><input type="radio" name="nilai{{ ++$n12 }}" class="radio radio-accent" value="2" /></td>
                    <td class="border p-2 border-slate-600"><input type="radio" name="nilai{{ ++$n13 }}" class="radio radio-accent" value="3" /></td>
                    <td class="border-b p-2 border-slate-600"><input type="radio" name="nilai{{ ++$n14 }}" class="radio radio-accent" value="4" /></td>
                </tr>
                @if($v->id == 3)
                <tr>
                    <th colspan=" 2" class="border-b border-r p-2 border-slate-600 text-left">Penyampaian Kompetensi dan Rencana Kegiatan</th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border-b p-2 border-slate-600"></th>
                </tr>
                @endif
                @if($v->id == 6)
                <tr class="bg-red-100">
                    <th colspan="2" class="border-b border-r p-2 border-slate-600 text-left">Kegiatan Inti</th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border-b p-2 border-slate-600"></th>
                </tr>
                <tr class="bg-red-100">
                    <th colspan="2" class="border-b border-r p-2 border-slate-600 text-left">Penguasaan Materi Pelajaran</th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border-b p-2 border-slate-600"></th>
                </tr>
                @endif
                @if($v->id == 9)
                <tr class="bg-red-100">
                    <th colspan="2" class="border-b border-r p-2 border-slate-600 text-left">Penerapan Strategi Pembelajaran yang Mendidik</th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border-b p-2 border-slate-600"></th>
                </tr>
                @endif
                @if($v->id == 15)
                <tr class="bg-red-100">
                    <th colspan="2" class="border-b border-r p-2 border-slate-600 text-left">Pemanfaatan Sumber Belajar/Media dalam Pembelajaran</th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border-b p-2 border-slate-600"></th>
                </tr>
                @endif
                @if($v->id == 19)
                <tr class="bg-red-100">
                    <th colspan="2" class="border-b border-r p-2 border-slate-600 text-left">Pelibatan Peserta Didik Dalam Pembelajaran</th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border-b p-2 border-slate-600"></th>
                </tr>
                @endif
                @if($v->id == 22)
                <tr class="bg-red-100">
                    <th colspan="2" class="border-b border-r p-2 border-slate-600 text-left">Penggunaan Bahasa yang Benar dan Tepat dalam Pembelajaran</th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border-b p-2 border-slate-600"></th>
                </tr>
                @endif
                @if($v->id == 24)
                <tr class="bg-red-100">
                    <th colspan="2" class="border-b border-r p-2 border-slate-600 text-left">Kegiatan Penutup</th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border-b p-2 border-slate-600"></th>
                </tr>
                <tr class="bg-red-100">
                    <th colspan="2" class="border-b border-r p-2 border-slate-600 text-left">Penutup Pembelajaran</th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border p-2 border-slate-600"></th>
                    <th class="border-b p-2 border-slate-600"></th>
                </tr>
                @endif
                @endforeach
                <tr>
                    <td class="border-r p-2 border-slate-600 text-center">29</td>
                    <td class="border-t p-2 border-r border-slate-600">Memberitahu batas akhir pengumpulan tugas </td>
                    <td class="border-t border-r p-2 border-slate-600"><input type="radio" name="nilai29" class="radio radio-accent" value="0" /></td>
                    <td class="border-t p-2 border-r border-slate-600"><input type="radio" name="nilai29" class="radio radio-accent" value="1" /></td>
                    <td class="border-t p-2 border-r border-slate-600"><input type="radio" name="nilai29" class="radio radio-accent" value="2" /></td>
                    <td class="border-t border-r p-2 border-slate-600"><input type="radio" name="nilai29" class="radio radio-accent" value="3" /></td>
                    <td class="border-t p-2 border-slate-600"><input type="radio" name="nilai29" class="radio radio-accent" value="4" /></td>
                </tr>
            </table>
        </div>

        <div class="rounded-lg border border-slate-600 mt-8">
            <table class="w-full">
                <tr class="bg-sky-100">
                    <th colspan="8" class="rounded-t-lg border-b border-slate-600 p-2">SUPERVISI PENILAIAN HASIL BELAJAR</th>
                </tr>
                <tr class="bg-sky-100 text-center">
                    <td rowspan="3" class="border-b border-r border-slate-600 p-2">No</td>
                    <td rowspan="3" class="border border-slate-600 p-2">Dokumen</td>
                    <td colspan="5" class="border border-slate-600 p-2">Kondisi</td>
                    <td rowspan="3" class="border-b border-slate-600 p-2">Deskripsi</td>
                </tr>
                <tr class="bg-sky-100 text-center">
                    <td colspan="4" class="border-b border-r border-slate-600 p-2">Ada *)</td>
                    <td rowspan="2" class="border border-slate-600 p-2">Tidak Ada</td>
                </tr>
                <tr class="bg-sky-100 text-center">
                    <td class="border-b border-r border-slate-600 p-2">1</td>
                    <td class="border border-slate-600 p-2">2</td>
                    <td class="border border-slate-600 p-2">3</td>
                    <td class="border-b border-slate-600 p-2">4</td>
                </tr>
                @foreach($penilaian as $v)
                <tr>
                    <td class="border-b border-r p-2 border-slate-600 text-center">{{ ++$i2 }}</td>
                    <td class="border p-2 border-slate-600">{{ $v->keterangan }}</td>
                    <td class="border p-2 border-slate-600 text-center"><input type="radio" name="kondisi{{ ++$k1 }}" class="radio radio-secondary" value="1" /></td>
                    <td class="border p-2 border-slate-600 text-center"><input type="radio" name="kondisi{{ ++$k2 }}" class="radio radio-secondary" value="2" /></td>
                    <td class="border p-2 border-slate-600 text-center"><input type="radio" name="kondisi{{ ++$k3 }}" class="radio radio-secondary" value="3" /></td>
                    <td class="border p-2 border-slate-600 text-center"><input type="radio" name="kondisi{{ ++$k4 }}" class="radio radio-secondary" value="4" /></td>
                    <td class="border p-2 border-slate-600 text-center "><input type="radio" name="kondisi{{ ++$k5 }}" class="radio radio-secondary" value="0" /></td>
                    <td class="border-b p-2 border-slate-600"><textarea class="focus:outline-none w-full"></textarea></td>
                </tr>
                @endforeach
                <tr>
                    <td class="border-t border-r p-2 border-slate-600 text-center">9</td>
                    <td class="border-t border-r p-2 border-slate-600">Analisis butir soal PAS</td>
                    <td class="border-t border-r p-2 border-slate-600 text-center"><input type="radio" name="kondisi9" class="radio radio-secondary" value="1" /></td>
                    <td class="border-t border-r p-2 border-slate-600 text-center"><input type="radio" name="kondisi9" class="radio radio-secondary" value="2" /></td>
                    <td class="border-t border-r p-2 border-slate-600 text-center"><input type="radio" name="kondisi9" class="radio radio-secondary" value="3" /></td>
                    <td class="border-t border-r p-2 border-slate-600 text-center"><input type="radio" name="kondisi9" class="radio radio-secondary" value="4" /></td>
                    <td class="border-t border-r p-2 border-slate-600 text-center "><input type="radio" name="kondisi9" class="radio radio-secondary" value="0" /></td>
                    <td class="border-t p-2 border-slate-600"><textarea class="focus:outline-none w-full"></textarea></td>
                </tr>
            </table>
        </div>

        <div class="rounded-lg border border-slate-600 mt-8">
            <table class="w-full">
                <tr class="bg-red-100">
                    <th colspan="6" class="rounded-t-lg border-b border-black p-2">RPP</th>
                </tr>
                <tr class="text-center bg-red-100">
                    <th rowspan="2" class="border-b border-r border-black p-2">No</th>
                    <th rowspan="2" class="border border-black p-2">Komponen
                        Rencana Pelaksanaan Pembelajaran
                    </th>
                    <th colspan="3" class="border border-black p-2">Hasil Telaah</th>
                    <th class="border-b border-black p-2">Catatan</th>
                </tr>
                <tr class="text-center bg-red-100">
                    <th class="border-r border-b border-black p-2">1</th>
                    <th class="border border-black p-2">2</th>
                    <th class="border border-black p-2">3</th>
                    <th class="border-b border-black p-2"></th>
                </tr>

                <tr class="bg-sky-100 text-center">
                    <th class="border-r border-b border-black p-2">A.</th>
                    <th class="border border-black p-2 text-left">Identitas RPP</th>
                    <th class="border border-black p-2">Tidak
                        sesuai
                    </th>
                    <th class="border-r border-b border-black p-2">Kurang sesuai </th>
                    <th class="border border-black p-2"> Lengkap/
                        sesuai
                    </th>
                    <th class="border-b border-black p-2"></th>
                </tr>
                @foreach($rpp as $q => $v)
                <tr class="text-center">
                    <td class="border-r border-b border-black p-2">{{ ++$i3 }}</td>
                    <td class="border border-black p-2 text-left">{{ $v->keterangan }}</td>
                    <td class="border border-black p-2"><input value="0" type="radio" name="telaah{{ ++$t1 }}" class="radio radio-secondary" /></td>
                    <td class="border border-black p-2"><input value="1" type="radio" name="telaah{{ ++$t2 }}" class="radio radio-secondary" /></td>
                    <td class="border border-black p-2"><input value="2" type="radio" name="telaah{{ ++$t3 }}" class="radio radio-secondary" /></td>
                    <td class="border-b border-black p-2"><textarea class="focus:outline-none w-full"></textarea></td>
                </tr>
                @if($q == '0')
                <tr class="bg-sky-100">
                    <th class="border-r border-b border-black p-2">B.</th>
                    <th class="border border-black p-2 text-left">Komponen Utama RPP</th>
                    <th class="border border-black p-2"></th>
                    <th class="border border-black p-2"></th>
                    <th class="border border-black p-2"></th>
                    <th class="border-b border-black p-2"></th>
                </tr>
                @endif
                @if($q == '2')
                <tr class="bg-sky-100">
                    <th class="border-r border-b border-black p-2">C.</th>
                    <th class="border border-black p-2 text-left">Rumusan Tujuan Pembelajaran</th>
                    <th class="border border-black p-2"></th>
                    <th class="border border-black p-2"></th>
                    <th class="border border-black p-2"></th>
                    <th class="border-b border-black p-2"></th>
                </tr>
                @endif
                @if($q == '5')
                <tr class="bg-sky-100">
                    <th class="border-r border-b border-black p-2">D.</th>
                    <th class="border border-black p-2 text-left">Kegiatan Pembelajaran</th>
                    <th class="border border-black p-2"></th>
                    <th class="border border-black p-2"></th>
                    <th class="border border-black p-2"></th>
                    <th class="border-b border-black p-2"></th>
                </tr>
                @endif
                @if($q == '15')
                <tr class="bg-sky-100">
                    <th class="border-r border-b border-black p-2">E.</th>
                    <th class="border border-black p-2 text-left">Penilaian Hasil Belajar</th>
                    <th class="border border-black p-2"></th>
                    <th class="border border-black p-2"></th>
                    <th class="border border-black p-2"></th>
                    <th class="border-b border-black p-2"></th>
                </tr>
                @endif
                @endforeach
                <tr class="text-center bg-yellow-100">
                    <td class="border-r border-t border-black p-2  rounded-bl-lg">20</td>
                    <td class="border-t border-r border-black p-2 text-left">{{ $v->keterangan }}</td>
                    <td class="border-t border-r border-black p-2"><input value="0" type="radio" name="telaah20" class="radio radio-secondary" /></td>
                    <td class="border-t border-r border-black p-2"><input value="1" type="radio" name="telaah20" class="radio radio-secondary" /></td>
                    <td class="border-t border-r border-black p-2"><input value="2" type="radio" name="telaah20" class="radio radio-secondary" /></td>
                    <td class="border-t border-black p-2 rounded-br-lg"><textarea class="focus:outline-none w-full bg-yellow-100"></textarea></td>
                </tr>
            </table>
        </div>
        <button type="submit" class="btn mt-8 w-full bg-[#570DF8] btn-primary hover:shadow-lg hover:shadow-[#ab88f7]">
            Selesai
        </button>
    </form>
</div>

@endsection