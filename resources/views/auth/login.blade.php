@extends('layouts.app')
@section('content')

<div class="bg-slate-100 flex justify-center items-center h-screen">
    <form method="post" action="{{ route('login') }}" class="container bg-white w-96 h-fit rounded-2xl shadow-2xl p-8">
        @csrf
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input name="email" type="email" class="input input-bordered w-full max-w-xs" placeholder="example@email.com" required />
            <label class="label mt-3">
                <span class="label-text">Password</span>
            </label>
            <input name="password" type="password" placeholder="Enter your Password" class="input input-bordered w-full max-w-xs" required />
            <label class="label cursor-pointer mt-3">
                <span class="label-text">Remember me</span>
                <input name="remember" type="checkbox" class="toggle toggle-primary" />
            </label>
            <button type="submit" class="btn mt-9 bg-[#570DF8] btn-primary hover:shadow-lg hover:shadow-[#ab88f7]">
                Login
            </button>
        </div>
    </form>
</div>

@endsection