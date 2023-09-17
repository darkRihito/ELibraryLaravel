@extends('layouts.main')
@section('container')
<div class="container mt-3">
  <div class="row">
    <div class="col-12">

    <div class="pt-3 d-flex justify-content-between align-items-center">
      <h2>Bibliografi {{$bibliografi->judul}}</h2>
      <div class="d-flex">
        <a href="{{ route('bibliografis.edit',['bibliografi' => $bibliografi->id]) }}"
        class="btn rounded-0" style="background-color:#FAD02C;">Edit</a>
        <form method="POST" action="{{ route('bibliografis.destroy',
          ['bibliografi' => $bibliografi->id]) }}">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger ms-0 rounded-0">Hapus</button>
        </form>
      </div>
    </div>

    <hr>
    @if(session()->has('pesan'))
    <div class="alert alert-success" role="alert">
      {{ session()->get('pesan')}}
    </div>
    @endif

    <div class="d-flex justify-content-between">
      <div class="me-4">
        <ul>
          <li>judul: {{$bibliografi->judul}} </li>
          <li>penulis: {{$bibliografi->isbn}} </li>
          <li>penulis: {{$bibliografi->penulis}} </li>
          <li>penerbit: {{$bibliografi->penerbit}}</li>
          <li>tahun buku: {{$bibliografi->tahun_buku}} </li>
          <li>kategori: {{$bibliografi->kategori}} </li>
          <li>registered: {{$bibliografi->koleksis->where('bibliografi_id', $bibliografi->id)->count()}}</li>
          <li>stok: {{$bibliografi->koleksis->where('tersedia', "tersedia")->count()}} </li>
        </ul>
      </div>
      <div class="border p-3">
          <p style="width: 600px;"><span style="font-size:20px;" class="fw-bold">Sinopsis:</span> <br>{{$bibliografi->sinopsis}}</p>
      </div>
    </div>
    

    <table class="table table-striped">
      <thead>
        <tr>
            <th>No</th>
            <th>Nomor Register</th>
            <th>Dewey Decimal Classification</th>
            <th>Collection Number</th>
            <th>Lokasi</th>
            <th>Status</th>
            <th>Status Koleksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($bibliografi->koleksis as $collect)
        <tr>
          <th>{{$loop->iteration}}</th>
          <td>{{$collect->no_reg}}</td>
          <td>{{$collect->ddc}}</td>
          <td>{{$collect->collection_number}}</td>
          <td>{{$collect->lokasi}}</td>
          <td>{{$collect->status}}</td>
          @if ($collect->tersedia == "Tidak Tersedia")
              <td><span class="border rounded-1 p-1" style="background-color: yellow">Tidak Tersedia</span></td>
          @else
              <td><span class="border rounded-1 p-1" style="background-color: lightgreen">Tersedia</span></td>
          @endif
        </tr>
        @empty
        <td colspan="7" class="text-center border-none bg-none">Tidak ada data...</td>
        @endforelse
      </tbody>
    </table>

  </div>
</div>
@endsection

