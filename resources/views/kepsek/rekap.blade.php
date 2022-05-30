@extends('kepsek.layout.main')
@section('body')

@php

$cek1 = count($rekap);
$cek2 = count($rpp);
$cek3 = count($pelaksanaan);
$cek4 = count($penilaian);

$j = 0;
$k = 0;
$l = 0;

@endphp
<a href="/exportexcel" class="btn btn-sm btn-outline btn-secondary">Export</a>
<br>
<br>
<div class="overflow-x-auto rounded-lg border mb-8">
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th></th>
                <th scope="col">Guru</th>
                <th>Mata Pelajaran</th>
                <th>RPP</th>
                <th>Pelaksanaan</th>
                <th>Penilaian</th>
                <th>Nilai Akhir</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @if($cek1 == 0)
            <tr>
                <td colspan="8" class="text-center">Belum Ada</td>
            </tr>
            @else
            @foreach($rekap as $row)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->mata_pelajaran }}</td>
                <td>{{ $row->rpp }}</td>
                <td>{{ $row->pelaksanaan }}</td>
                <td>{{ $row->penilaian }}</td>
                <td>{{ $row->nilai_akhir }}</td>
                <td>{{ $row->keterangan }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

<div class="divider"></div>

<div class="overflow-x-auto rounded-lg border mt-8">
    <table class="table table-compact w-full">
        <thead>
            <tr class="text-center">
                <th colspan="8" class="bg-sky-100 border-b">RPP</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th></th>
                <th scope="col">Guru</th>
                <th>Mata Pelajaran</th>
                <th>Total Skor</th>
                <th>Nilai</th>
                <th>Predikat</th>
            </tr>
        </thead>
        <tbody>
            @if($cek2 == 0)
            <tr>
                <td colspan="8" class="text-center">Belum Ada</td>
            </tr>
            @else
            @foreach($rpp as $row)
            <tr>
                <td>{{ ++$j }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->mata_pelajaran }}</td>
                <td>{{ $row->jumlah }}</td>
                <td>{{ $row->nilai }}</td>
                <td>{{ $row->predikat }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

<div class="overflow-x-auto rounded-lg border mt-8">
    <table class="table table-compact w-full">
        <thead>
            <tr class="text-center">
                <th colspan="8" class="border-b bg-sky-100">Pelaksanaan</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th></th>
                <th scope="col">Guru</th>
                <th>Mata Pelajaran</th>
                <th>Total Skor</th>
                <th>Nilai</th>
                <th>Predikat</th>
            </tr>
        </thead>
        <tbody>
            @if($cek3 == 0)
            <tr>
                <td colspan="8" class="text-center">Belum Ada</td>
            </tr>
            @else
            @foreach($pelaksanaan as $row)
            <tr>
                <td>{{ ++$k }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->mata_pelajaran }}</td>
                <td>{{ $row->jumlah }}</td>
                <td>{{ $row->nilai }}</td>
                <td>{{ $row->predikat }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

<div class="overflow-x-auto rounded-lg border mt-8">
    <table class="table table-compact w-full">
        <thead>
            <tr class="text-center">
                <th colspan="8" class="border-b bg-sky-100">Penilaian</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th></th>
                <th scope="col">Guru</th>
                <th>Mata Pelajaran</th>
                <th>Total Skor</th>
                <th>Nilai</th>
                <th>Predikat</th>
            </tr>
        </thead>
        <tbody>
            @if($cek4 == 0)
            <tr>
                <td colspan="8" class="text-center">Belum Ada</td>
            </tr>
            @else
            @foreach($penilaian as $row)
            <tr>
                <td>{{ ++$l }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->mata_pelajaran }}</td>
                <td>{{ $row->jumlah }}</td>
                <td>{{ $row->nilai }}</td>
                <td>{{ $row->predikat }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection