@extends('layouts.navbar')

@php
use Illuminate\Support\Facades\DB;

$jadwal = DB::table('jadwal')
->where('supervisor', '=', Auth::user()->name)
->where('status', '!=', 'Selesai')
->get();

$ceksupervisor = count($jadwal);
@endphp

@section('menu')
<li><a class="focus:bg-base-300 focus:text-black{{  request()->segment(1) == 'supervisor' ? 'font-semibold bg-accent' : ''}}" href="/supervisor">Supevisor</a></li>
<li class="mt-2"><a class="focus:bg-base-300 focus:text-black {{  request()->segment(1) == 'guru' ? 'font-semibold bg-accent' : ''}}" href="/guru">Guru</a></li>
@endsection

@section('notif')
@if($ceksupervisor == 1)
<div class="tooltip tooltip-left" data-tip="Anda Terjadwal">
    @else
    <div>
        @endif
        <button class="btn btn-ghost btn-circle">
            <div class="indicator">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                @if($ceksupervisor == 1)
                <span class="badge badge-xs badge-primary indicator-item"></span>
                @endif
            </div>
        </button>
    </div>
    @endsection

    @section('tabs')
    <div class="tabs mt-8">
        <a class="tab tab-lg tab-border-none tab-lifted {{ request()->is('supervisor') ? 'tab-active' : ''}}" href="/supervisor">Lihat Jadwal</a>
        @yield('nav')
        <a class="tab tab-lg tab-border-none tab-lifted cursor-default"></a>
    </div>

    <div class="h-fit bg-white shadow-xl rounded-2xl p-8 border-1 {{ request()->is('supervisor') ? 'rounded-tl-none' : ''}}">

        @yield('supervisor')

    </div>
    @endsection