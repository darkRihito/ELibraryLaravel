@extends('layouts.main')
@section('container')
@if(session()->has('pesan'))
    <div class="alert alert-success">
    {{ session()->get('pesan')}}
    </div>
@endif
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="py-4 d-flex justify-content-between align-items-center">
                <h2>KOLEKSI</h2>
                <a href="{{ route('koleksis.create') }}" class="btn btn-primary rounded-0"><i style="font-size: 20px;" class="bi bi-plus"></i>Add Koleksi</a>
            </div>
            <div style="height:500px; overflow:scroll; overflow-x:hidden;" class="">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Bibliografi</th>
                        <th>Nomor Register</th>
                        <th>Dewey Decimal Classification</th>
                        <th>CN</th>
                        <th>Lokasi</th>
                        <th>Status Buku</th>
                        <th>Status Pinjam</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                        <tbody>
                        @forelse ($koleksis as $koleksi)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>
                                <a class="text-decoration-none" href="{{ route('bibliografis.show',['bibliografi' => $koleksi->bibliografi_id]) }}">{{$koleksi->bibliografi->judul}}</a>
                            </td>
                            <!-- <td>{{$koleksi->member_id}}</td> -->
                            <td>{{$koleksi->no_reg}}</td>
                            <td>{{$koleksi->ddc}}</td>
                            <td>{{$koleksi->collection_number}}</td>
                            <td>{{$koleksi->lokasi}}</td>
                            <td>{{$koleksi->status}}</td>
                            @if ($koleksi->tersedia == "Tidak Tersedia")
                                <td><span class="border rounded-1 p-1" style="background-color: yellow">Tidak Tersedia</span></td>
                            @else
                                <td><span class="border rounded-1 p-1" style="background-color: lightgreen">Tersedia</span></td>
                            @endif
                            <td><form method="POST" action="{{ route('koleksis.destroy',['koleksi' => $koleksi->id]) }}">
                                @method('DELETE')
                                @csrf
                                    <button type="submit" class="border-0 ms-0 rounded-0"><i class="bi bi-trash-fill" style="font-size: 20px;"></i></button>
                                </form></td>
                        </tr>
                        @empty
                        <td colspan="7" class="text-center">Tidak ada data...</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection