@extends('layouts.main')
@section('container')
<div class="container pt-4 bg-white">
  <div class="row">
    <div class="col-md-8 col-xl-6">
      <h1>PEMINJAMAN</h1>
      <hr>

      <form action="{{ route('pinjams.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="sirkulasi_id">Sirkulasi</label>
          <select class="form-select" name="sirkulasi_id" id="sirkulasi_id" value="">
              @foreach ($sirkulasis as $sirkulasi)
              <option value="{{ $sirkulasi->id }}" >{{ $sirkulasi->nama }}</option>
              @endforeach
            </select>
            @error('sirkulasi_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="koleksi_id">Koleksi</label>
          <select class="form-select" name="koleksi_id" id="koleksi_id" value="">
              @foreach ($koleksis as $koleksi)
              <option value="{{ $koleksi->id }}" >{{ $bibliografis->where('id', $koleksi->bibliografi_id)->first()->judul }} - {{ $koleksi->no_reg }}</option>
              @endforeach
            </select>
            @error('koleksi_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        @php
        $dt = new DateTime();
        @endphp
        <div class="mb-3">
          <label class="form-label" for="tanggal_pinjam">Tanggal Pinjam</label>
          <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ $dt->format('Y-m-d') }}"
            class="form-control @error('tanggal_pinjam') is-invalid @enderror">
          @error('tanggal_pinjam')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="lama_pinjam">Lama Pinjam (hari)</label>
          <input type="number" id="lama_pinjam" name="lama_pinjam" value="1"
            class="form-control @error('lama_pinjam') is-invalid @enderror">
          @error('lama_pinjam')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3 d-none">
          <label class="form-label" for="status">Status</label>
          <input type="hidden" id="status" name="status" value="Dipinjam"
            class="form-control @error('status') is-invalid @enderror">
          @error('status')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-2 rounded-0">Daftar</button>
      </form>

    </div>
  </div>
</div>
@endsection