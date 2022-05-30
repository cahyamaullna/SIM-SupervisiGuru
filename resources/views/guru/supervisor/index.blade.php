@extends('guru.supervisor.layout.main')
@section('supervisor')

@php
use Illuminate\Support\Facades\DB;

$jadwal = DB::table('jadwal')
->where('supervisor', '=', Auth::user()->name)
->get();

$cek = count($jadwal);

@endphp

<div class="overflow-x-auto rounded-lg border">
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th></th>
                <th>Guru</th>
                <th>Jadwal</th>
                <th>Status</th>
                <th>Berkas</th>
                <th>Download Berkas</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($cek == 0)
            <tr>
                <td colspan="6" class="text-center">Belum Terjadwal</td>
            </tr>
            @else
            @foreach($jadwal as $row)
            <tr>
                <th>{{ ++$i }}</th>
                <td>{{ $row->guru }}</td>
                <td>{{ $row->jadwal }}</td>
                <td>{{ $row->status }}</td>
                <td>{{ $row->berkas }}</td>
                @if($row->berkas == 'Belum')
                <button disabled class="btn btn-sm btn-accent">Download Berkas</button>
                @else
                <td>
                    <div class="btn-group">
                        <a href="supervisor/download/{{ $row->id }}/rpp" class="btn btn-sm btn-outline btn-primary">File 1</a>
                        <a href="supervisor/download/{{ $row->id }}/modul" class="btn btn-sm btn-outline btn-primary">File 2</a>
                        <a href="supervisor/download/{{ $row->id }}/instrumen" class="btn btn-sm btn-outline btn-primary">File 3</a>
                    </div>
                </td>
                @endif
                <td>
                    @if($row->berkas == 'Belum' || $row->status == 'Selesai' || $row->jadwal != date('Y-m-d'))
                    <button disabled class="btn btn-sm btn-primary">supervisi</button>
                    @else
                    <a href="{{ route('supervisi', $row->id) }}" class="btn btn-sm btn-primary">supervisi</a>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection