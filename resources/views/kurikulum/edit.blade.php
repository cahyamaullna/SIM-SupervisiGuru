@extends('kurikulum.layout.main')
@section('body')

<form action="{{ route('jadwal.update', $jadwal->id) }}" method="post" class="form-control w-full">
    @csrf
    <label class="label">
        <span class="label-text">Guru</span>
    </label>
    <select name="guru" class="select select-bordered w-full">
        <option disabled selected>-- Pilih Guru --</option>
        @foreach($guru as $row)
        <option value="{{ $row->name }}" @if($jadwal->guru == $row->name)selected @endif>{{ $row->name }}</option>
        @endforeach
    </select>
    <label class="label">
        <span class="label-text">Supervisor</span>
    </label>
    <select name="supervisor" class="select select-bordered w-full">
        <option disabled selected>-- Pilih Supervisor --</option>
        @foreach($guru as $row)
        <option value="{{ $row->name }}" @if($jadwal->supervisor == $row->name)selected @endif>{{ $row->name }}</option>
        @endforeach
    </select>
    <label class="label">
        <span class="label-text">Jadwal</span>
    </label>
    <input name="jadwal" type="date" placeholder="" class="input input-bordered w-full" />
    <button type="submit" class="btn bg-[#570DF8] btn-primary mt-9 hover:shadow-lg hover:shadow-[#ab88f7]">
        Edit Jadwal
    </button>
</form>

@endsection