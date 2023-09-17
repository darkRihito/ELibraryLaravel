@extends('layouts.main')
@section('container')
@if(session()->has('pesan'))
    <div class="alert alert-success mt-2 ms-auto text-center">
    {{ session()->get('pesan')}}
    </div>
@endif
<div class="container mt-3">
    <div class="row">
        <div class="col-12 ">
            <div class="row">
                <div class="py-4 col-lg-9 d-flex justify-content-between">
                    <h2 style="color: #333652;">BIBLIOGRAFI</h2>
                    
                    <a style="color:#333652;" href="{{ route('bibliografis.create') }}" class="btn btn-warning rounded-0"><i style="font-size: 20px;" class="bi bi-plus"></i>Add Bibliografi</a>
                    
                </div>
                <div class=" col-lg-3">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 border border-2 mb-4" style="height:500px; overflow: scroll;">
                    <table style="min-width:max-content;" class="table table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>ISBN</th>
                            <th>Sinopsis</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Buku</th>
                            <th>Kategori</th>
                            <th>Registered</th>
                        </tr>
                        </thead>
                            <tbody>
                            @forelse ($bibliografis as $bibliografi)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td><a class="text-decoration-none" href="{{ route('bibliografis.show',['bibliografi' => $bibliografi->id]) }}">{{$bibliografi->judul}}</a></td>
                                <td>{{$bibliografi->isbn}}</td>
                                <td style="max-width: 400px;">{{$bibliografi->sinopsis}}</td>
                                <td>{{$bibliografi->penulis}}</td>
                                <td>{{$bibliografi->penerbit}}</td>
                                <td>{{$bibliografi->tahun_buku}}</td>
                                <td>{{$bibliografi->kategori}}</td>
                                <td>{{$bibliografi->koleksis->where('bibliografi_id', $bibliografi->id)->count()}}</td>
                            </tr>
                            @empty
                            <td colspan="9" class="text-center border-none bg-none">Tidak ada data...</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-3">
                    <div class="card text-white bg-warning mb-3 rounded-0">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <h5 class="card-title">Total Bibliografi</h5>
                            <h1 class="card-text">{{$bibliografis->count()}}</h1>
                        </div>
                    </div>
                    <div class="card text-white bg-success rounded-0">
                        
                        <div class="card-body">
                            <h5 class="card-title">Total Koleksi</h5>
                            <h2 class="card-text">{{$koleksis->count()}}</h2>
                        </div>
                    </div>
                    <div class="card text-white bg-success rounded-0">
                        
                        <div class="card-body">
                            <h5 class="card-title">Member Terdaftar</h5>
                            <h2 class="card-text">{{$members->count()}}</h2>
                        </div>
                    </div>
                    <div class="card text-white bg-success rounded-0 mb-4">
                        
                        <div class="card-body">
                            <h5 class="card-title">Histori Peminjaman</h5>
                            <h2 class="card-text">{{$pinjams->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection