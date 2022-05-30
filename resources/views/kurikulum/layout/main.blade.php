@extends('layouts.navbar')

@php
use Illuminate\Support\Facades\DB;

$jadwal = DB::table('jadwal')
->where('guru', '=', Auth::user()->name)
->where('status', '!=', 'Selesai')
->get();

$cekguru = count($jadwal);

$jadwal = DB::table('jadwal')
->where('supervisor', '=', Auth::user()->name)
->where('status', '!=', 'Selesai')
->get();

$ceksupervisor = count($jadwal);
@endphp

@section('menu')
<li><a class="font-semibold bg-accent" href="/kurikulum">Kurikulum</a></li>
<li><a class="font-semibold border border-primary btn-outline btn-primary mt-2" href="/kurikulum/register">Register</a></li>
@endsection

@section('notif')
<button class="btn btn-ghost btn-circle">
    <div class="indicator">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
    </div>
</button>
@endsection

@section('tabs')
<div class="tabs mt-8">
    <a class="tab lg:tab-lg md:tab-lg tab-sm tab-border-none tab-lifted {{ request()->is('kurikulum') ? 'tab-active' : ''}}" href="/kurikulum">Buat Jadwal</a>
    <a class="tab lg:tab-lg md:tab-lg tab-sm tab-border-none tab-lifted {{ request()->is('kurikulum/jadwal') ? 'tab-active' : ''}}" href="/kurikulum/jadwal">Lihat Jadwal</a>
    <a class="tab lg:tab-lg md:tab-lg tab-sm tab-border-none tab-lifted {{ request()->is('kurikulum/berkas') ? 'tab-active' : ''}}" href="/kurikulum/berkas">Lihat Berkas</a>
    <a class="tab lg:tab-lg md:tab-lg tab-sm tab-border-none tab-lifted {{ request()->is('kurikulum/rekap') ? 'tab-active' : ''}}" href="/kurikulum/rekap">Hasil Supervisi</a>
    <a class="tab lg:tab-lg tab-border-none tab-lifted cursor-default"></a>
</div>

<div class="h-fit bg-white shadow-xl rounded-2xl p-8 border-1 {{ request()->is('kurikulum') ? 'rounded-tl-none' : ''}}">

    @yield('body')

</div>
@endsection