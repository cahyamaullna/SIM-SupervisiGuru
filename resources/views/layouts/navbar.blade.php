@extends('layouts.app')
@section('content')

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>

<div class="bg-slate-100 h-screen">
    <div class="bg-slate-100">
        <div class="lg:flex lg:justify-center md:flex md:justify-center">
            <div class="fixed lg:relative z-20 navbar bg-base-100 lg:w-2/3 md:mx-3 lg:rounded-2xl shadow-xl lg:mt-10 w-full">
                <div class="navbar-start">
                    <div class="dropdown">
                        <label tabindex="0" class="btn btn-ghost btn-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                        </label>
                        <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow-lg bg-base-100 rounded-lg w-52">

                            @yield('menu')

                            <div class="divider"></div>
                            <li>
                                <a class="border border-error btn-outline btn-error" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="navbar-center">
                    <a class="btn btn-ghost normal-case text-xl">{{ Auth::user()->name }}</a>
                </div>
                <div class="navbar-end">

                    @yield('notif')

                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <div class="lg:w-2/3 md:mx-14 w-full h-fit mb-10 mt-16 lg:mt-0">
                <div class="mx-2 lg:mx-0 md:mx-0">
                    @yield('tabs')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection