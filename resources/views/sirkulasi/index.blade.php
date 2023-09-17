@extends('layouts.main')
@section('container')
@if(session()->has('pesan'))
    <div class="alert alert-success mt-2 ms-auto text-center">
    {{ session()->get('pesan')}}
    </div>
@endif
<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <div class="py-4 d-flex justify-content-between align-items-center">
                <h2>SIRKULASI</h2>
                <a href="{{ route('sirkulasis.create') }}" class="btn btn-primary rounded-0"><i style="font-size: 20px;" class="bi bi-plus"></i>Add Sirkulasi</a>
            </div>
            <div style="height:500px; overflow:scroll; overflow-x:hidden;" class="">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sirkulasi</th>
                    <th>Member</th>
                    <th>Dibuat</th>
                    <th>Histori Buku</th>
                    <th>Catatan</th>
                </tr>
                </thead>
                    <tbody>
                    @forelse ($sirkulasis as $sirkulasi)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$sirkulasi->nama}}</td>
                        <td>{{$sirkulasi->member->nama}}</td>
                        <td>{{$sirkulasi->created_at}}</td>
                        <!-- <td>{{$members->where('id', $sirkulasi->member_id)}}</td> -->
                        <td>{{$pinjams->where('sirkulasi_id', $sirkulasi->id)->count()}}</td>
                        <td>{{$sirkulasi->catatan}}</td>
                    </tr>
                    @empty
                    <td colspan="7" class="text-center border-none bg-none">Tidak ada data...</td>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection