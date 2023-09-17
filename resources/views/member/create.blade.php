@extends('layouts.main')
@section('container')
<div class="container pt-4 bg-white">
  <div class="row">
    <div class="col-md-8 col-xl-6">
      <h1>Tambah Member</h1>
      <hr>

      <form action="{{ route('members.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="no_member">Nomor Member</label>
          <input placeholder="contoh:	M012" type="text" id="no_member" name="no_member" value=""
            class="form-control @error('no_member') is-invalid @enderror">
          @error('no_member')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="nama">Nama</label>
          <input placeholder="contoh:	Muhammad Rafi Shidiq" type="text" id="nama" name="nama" value=""
            class="form-control @error('nama') is-invalid @enderror">
          @error('nama')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="username">Username</label>
          <input placeholder="contoh: Rafi" type="text" id="username" name="username" value=""
            class="form-control @error('username') is-invalid @enderror">
          @error('username')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="password">Password</label>
          <input placeholder="masukkan password" type="text" id="password" name="password" value=""
            class="form-control @error('password') is-invalid @enderror">
          @error('password')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        @php
          $status = ["admin", "member"];
        @endphp
        <div class="mb-3">
          <label class="form-label" for="status">Status</label>
          <select class="form-select" name="status" id="status" value="">
              @foreach ($status as $stat)
              <option value="{{ $stat }}" {{ old('status')==$stat ? 'selected': '' }}>{{ $stat }}</option>
              @endforeach
          </select>
          @error('status')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input placeholder="contoh:	mrfshidiq@upi.edu" type="email" id="email" name="email" value=""
            class="form-control @error('email') is-invalid @enderror">
          @error('email')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3 d">
          <label class="form-label" for="no_telp">Nomor Telepon</label>
          <input placeholder="contoh:	0896532145" type="text" id="no_telp" name="no_telp"
            class="form-control @error('no_telp') is-invalid @enderror">
          @error('no_telp')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-2 rounded-0">Daftar</button>
      </form>

    </div>
  </div>
</div>
@endsection