@extends('kurikulum.layout.main')
@section('body')

@php

$cek = count($berkas);

@endphp

<div class="overflow-x-auto rounded-lg border">
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th></th>
                <th scope="col">Guru</th>
                <th>Mata Pelajaran</th>
                <th>Kompetensi Dasar</th>
                <th>Materi</th>
                <th>Rombel/Semester</th>
                <th>Jadwal Supervisi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if($cek == 0)
            <tr>
                <td colspan="8" class="text-center">Belum ada berkas</td>
            </tr>
            @else
            @foreach($berkas as $row)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $row->nama_guru }}</td>
                <td>{{ $row->mata_pelajaran }}</td>
                <td>{{ $row->kompetensi_dasar }}</td>
                <td>{{ $row->materi }}</td>
                <td>{{ $row->rombel }}</td>
                <td>{{ $row->jadwal }}</td>
                <td><a href="{{ route('berkas2.destroy', $row->id) }}" class="btn btn-sm btn-outline btn-secondary">Hapus Berkas</a></td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection