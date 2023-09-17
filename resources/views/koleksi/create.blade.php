@extends('layouts.main')
@section('container')
<div class="container pt-4 bg-white">
  <div class="row">
    <div class="col-md-8 col-xl-6">
      <h1>Tambah Koleksi</h1>
      <hr>

      <form action="{{ route('koleksis.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label" for="bibliografi_id">ID Bibliografi</label>
            <select class="form-select" name="bibliografi_id" id="bibliografi_id" value="{{ old('bibliografi_id') }}">
              @foreach ($bibliografis as $bibliografi)
              <option value="{{ $bibliografi->id }}" >{{ $bibliografi->judul }}</option>
              @endforeach
            </select>
            @error('bibliografi_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

        <div class="mb-3">
          <label class="form-label" for="no_reg">Nomor Register</label>
          <input placeholder="contoh:	B1R01" type="text" id="no_reg" name="no_reg" value="{{ old('no_reg') }}"
            class="form-control @error('no_reg') is-invalid @enderror">
          @error('no_reg')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="ddc">Dewey Decimal Classification</label>
          <input placeholder="contoh:	600.1" type="number" id="ddc" name="ddc" value="{{ old('ddc') }}"
            class="form-control @error('ddc') is-invalid @enderror">
          @error('ddc')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="collection_number">Collection Number</label>
          <input placeholder="contoh:	245" type="number" id="collection_number" name="collection_number" value="{{ old('collection_number') }}"
            class="form-control @error('collection_number') is-invalid @enderror">
          @error('collection_number')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="lokasi">Lokasi</label>
          <input placeholder="contoh:	Lantai 1A, Rak 24" type="text" id="lokasi" name="lokasi" value="{{ old('lokasi') }}"
            class="form-control @error('lokasi') is-invalid @enderror">
          @error('lokasi')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        @php
          $stats = ["Baru", "Kurang Baik", "Buruk"];
        @endphp
        <div class="mb-3">
            <label class="form-label" for="status">Status</label>
            <select class="form-select" name="status" id="status" value="{{ old('status') }}">
              @foreach ($stats as $stat)
              <option value="{{ $stat }}" {{ old('status')==$stat ? 'selected': '' }}>{{ $stat }}</option>
              @endforeach
            </select>
            @error('status')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 d-none">
          <label class="form-label" for="tersedia">Tersedia</label>
          <input type="hidden" id="tersedia" name="tersedia" value="tersedia"
            class="form-control @error('tersedia') is-invalid @enderror">
          @error('tersedia')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-2 rounded-0">Daftar</button>
      </form>

    </div>
  </div>
</div>
@endsection