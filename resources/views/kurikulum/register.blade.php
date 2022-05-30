@extends('kurikulum.layout.main')
@section('body')

<form method="POST" action="{{ route('register') }}">
    @csrf

    <label class="label">
        <span class="label-text">Nama Lengkap</span>
    </label>
    <input name="name" type="text" placeholder="John Doe, S.Pd." class="input input-bordered w-full" placeholder="John Doe" />
    <label class="label mt-5">
        <span class="label-text">Role</span>
    </label>
    <select name="role" class="select select-bordered w-full">
        <option disabled selected>-- Pilih Role --</option>
        <option value="guru">Guru/Supervisor</option>
        <option value="kurikulum">Kurikulum</option>
        <option value="kepsek">Kepala Sekolah</option>
    </select>
    <label class="label mt-5">
        <span class="label-text">Email</span>
    </label>
    <input name="email" type="email" placeholder="example@email.com" class="input input-bordered w-full" />
    <label class="label mt-5">
        <span class="label-text">Password</span>
    </label>
    <input name="password" type="password" placeholder="Enter your Password" class="input input-bordered w-full" />
    <label class="label mt-5">
        <span class="label-text">Confirm Password</span>
    </label>
    <input name="password_confirmation" type="password" placeholder="Re-type your Password" class="input input-bordered w-full" />
    <button type="submit" class="w-full btn mt-9 bg-[#570DF8] btn-primary hover:shadow-lg hover:shadow-[#ab88f7]">
        Register
    </button>

</form>

@endsection