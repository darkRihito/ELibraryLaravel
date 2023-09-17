@extends('layouts.main')
@section('container')
<div class="container pt-4 bg-white">
  <div class="row">
    <div class="col-md-8 col-xl-6">
      <h1>Edit Bibliografi</h1>
      <hr>

      <form action="{{ route('bibliografis.update',['bibliografi' => $bibliografi->id]) }}"
        method="POST">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label class="form-label" for="judul">judul</label>
          <input type="text" id="judul" name="judul"
            value="{{ old('judul') ?? $bibliografi->judul }}"
            class="form-control @error('judul') is-invalid @enderror">
          @error('judul')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="isbn">ISBN</label>
          <input type="text" id="isbn" name="isbn"
            value="{{ old('isbn') ?? $bibliografi->isbn }}"
            class="form-control @error('isbn') is-invalid @enderror">
          @error('isbn')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="sinopsis">Sinopsis</label>
          <input type="text" id="sinopsis" name="sinopsis"
            value="{{ old('sinopsis') ?? $bibliografi->sinopsis }}"
            class="form-control @error('sinopsis') is-invalid @enderror">
          @error('sinopsis')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="penulis">penulis</label>
          <input type="text" id="penulis" name="penulis"
            value="{{ old('penulis') ?? $bibliografi->penulis }}"
            class="form-control @error('penulis') is-invalid @enderror">
          @error('penulis')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="penerbit">penerbit</label>
          <input type="text" id="penerbit" name="penerbit"
            value="{{ old('penerbit') ?? $bibliografi->penerbit }}"
            class="form-control @error('penerbit') is-invalid @enderror">
          @error('penerbit')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="tahun_buku">tahun_buku</label>
          <input type="text" id="tahun_buku" name="tahun_buku"
            value="{{ old('tahun_buku') ?? $bibliografi->tahun_buku }}"
            class="form-control @error('tahun_buku') is-invalid @enderror">
          @error('tahun_buku')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label class="form-label" for="kategori">kategori</label>
          <input type="text" id="kategori" name="kategori"
            value="{{ old('kategori') ?? $bibliografi->kategori }}"
            class="form-control @error('kategori') is-invalid @enderror">
          @error('kategori')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        
        
        <button type="submit" class="btn btn-primary mb-2 rounded-0">Update</button>
      </form>

    </div>
  </div>
</div>
@endsection