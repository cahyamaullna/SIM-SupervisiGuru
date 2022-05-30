@extends('kepsek.layout.main')
@section('body')

@php

$cek = count($jadwal);

@endphp

<div class="overflow-x-auto rounded-lg border">
    <table class="table table-compact w-full">
        <thead>
            <tr>
                <th></th>
                <th scope="col">Guru</th>
                <th>Supevisor</th>
                <th>Jadwal</th>
                <th>Status</th>
                <th>Berkas</th>
            </tr>
        </thead>
        <tbody>
            @if($cek == 0)
            <tr>
                <td colspan="7" class="text-center">Belum ada jadwal</td>
            </tr>
            @else
            @foreach($jadwal as $row)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $row->guru }}</td>
                <td>{{ $row->supervisor }}</td>
                <td>{{ $row->jadwal }}</td>
                <td>{{ $row->status }}</td>
                <td>{{ $row->berkas }}</td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection