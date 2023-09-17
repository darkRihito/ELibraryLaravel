@extends('layouts.main')
@section('container')
<div class="container pt-4 bg-white">
  <div class="row">
    <div class="col-md-8 col-xl-6">
      <h1>Tambah Bibliografi</h1>
      <hr>

      <form action="{{ route('bibliografis.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="judul">Judul</label>
          <input placeholder="contoh: Bulan Bintang" type="text" id="judul" name="judul" value=""
            class="form-control @error('judul') is-invalid @enderror">
          @error('judul')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="isbn">ISBN</label>
          <input placeholder="contoh: 9786020523316" type="text" id="isbn" name="isbn"
            value=""
            class="form-control @error('isbn') is-invalid @enderror">
          @error('isbn')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>
        
        <div class="mb-3">
          <label for="exampleFormControlTextarea1">Example textarea</label>
          <textarea name="sinopsis" class="form-control" id="exampleFormControlTextarea1" rows="3">Sinopsis</textarea>
          @error('sinopsis')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="penulis">Penulis</label>
          <input placeholder="contoh: Tere Liye" type="text" id="penulis" name="penulis" value=""
            class="form-control @error('penulis') is-invalid @enderror">
          @error('penulis')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="penerbit">Penerbit</label>
          <input placeholder="contoh: Gramedia Pustaka" type="text" id="penerbit" name="penerbit" value=""
            class="form-control @error('penerbit') is-invalid @enderror">
          @error('penerbit')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <!-- @php
          $faculties = ["FIP", "FPIPS", "FPBS", "FPSD", "FPMIPA", "FPTK", "FPEB"];
        @endphp -->
        <div class="mb-3">
          <label class="form-label" for="tahun_buku">Tahun</label>
          <input placeholder="contoh: 2022" type="text" id="tahun_buku" name="tahun_buku" value=""
            class="form-control @error('tahun_buku') is-invalid @enderror">
          @error('tahun_buku')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="kategori">Kategori</label>
          <input placeholder="contoh: Fantasi, Drama, Horor" type="text" id="kategori" name="kategori" value=""
            class="form-control @error('kategori') is-invalid @enderror">
          @error('kategori')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3 d-none">
          <label class="form-label" for="registered">Registered</label>
          <input type="text" id="registered" name="registered"
            class="form-control @error('registered') is-invalid @enderror">
          <!-- @error('registered')
            <div class="text-danger">{{ $message }}</div>
          @enderror -->
        </div>

        <button type="submit" class="btn btn-primary mb-2 rounded-0">Daftar</button>
      </form>

    </div>
  </div>
</div>
@endsection