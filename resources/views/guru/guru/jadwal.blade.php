@extends('guru.guru.layout.main')
@section('guru')

@php
use Illuminate\Support\Facades\DB;

$jadwal = DB::table('jadwal')
->where('guru', '=', Auth::user()->name)
->get();

$cek = count($jadwal);

@endphp

<div class="overflow-x-auto rounded-lg border">
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th></th>
                <th>Supevisor</th>
                <th>Jadwal</th>
                <th>Status</th>
                <th>Berkas</th>
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
                <td>{{ ++$i }}</td>
                <td>{{ $row->supervisor }}</td>
                <td>{{ $row->jadwal }}</td>
                <td>{{ $row->status }}</td>
                <td>{{ $row->berkas }}</td>
                <td>
                    @if($row->berkas == 'Belum' || $row->status == 'Proses' || $row->status == 'Selesai')
                    <button disabled class="btn btn-sm btn-primary">Hapus Berkas</button>
                    @else
                    <a href="{{ route('berkas.destroy', $row->id) }}" class="btn btn-sm btn-outline btn-secondary">Hapus Berkas</a>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection