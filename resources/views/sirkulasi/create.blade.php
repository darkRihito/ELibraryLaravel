@extends('layouts.main')
@section('container')
<div class="container pt-4 bg-white">
  <div class="row">
    <div class="col-md-8 col-xl-6">
      <h1>Tambah Sirkulasi</h1>
      <hr>

      <form action="{{ route('sirkulasis.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label" for="nama">Nama</label>
          <input type="nama" id="nama" name="nama" value=""
            class="form-control @error('nama') is-invalid @enderror">
          @error('nama')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="member_id">Member</label>
            <select class="form-select" name="member_id" id="member_id" value="{{ old('member_id') }}">
              @foreach ($members as $member)
              <option value="{{ $member->id }}" >{{ $member->nama }}</option>
              @endforeach
            </select>
            @error('member_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
          <label class="form-label" for="catatan">Catatan</label>
          <input type="catatan" id="catatan" name="catatan" value=""
            class="form-control @error('catatan') is-invalid @enderror">
          @error('catatan')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3 d-none">
          <label class="form-label" for="jzumlah_buku">Jumlah Buku</label>
          <input type="hidden" id="jumlah_buku" name="jumlah_buku" value="0"
            class="form-control @error('jumlah_buku') is-invalid @enderror">
          @error('jumlah_buku')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-2 rounded-0">Daftar</button>
      </form>

    </div>
  </div>
</div>
@endsection