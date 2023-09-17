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
                <h2>PEMINJAMAN</h2>
                <a href="{{ route('pinjams.create') }}" class="btn btn-primary rounded-0"><i style="font-size: 20px;" class="bi bi-plus"></i>Add Peminjaman</a>
            </div>
            <div style="height:500px; overflow:scroll; overflow-x:hidden;" class="">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sirkulasi</th>
                    <th>Koleksi</th>
                    <th>Tanggal Pinjam</th>
                    <th>Lama Pinjam (Hari)</th>
                    <th>Status</th>
                    <th>Tanggal Kembali</th>
                    <th>Kembalikan</th>
                </tr>
                </thead>
                    <tbody>
                    @forelse ($pinjams as $pinjam)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <td>{{$pinjam->sirkulasi->nama}}</a></td>
                        <td> {{$bibliografis->where('id', $koleksis->where('id', $pinjam->koleksi_id)->first()->bibliografi_id)->first()->judul}} - {{$koleksis->where('id', $pinjam->koleksi_id)->first()->no_reg}}</td>
                        <td>{{$pinjam->tanggal_pinjam}}</td>
                        <td>{{$pinjam->lama_pinjam}}</td>
                        @if ($pinjam->status == "Dikembalikan")
                            <td><span class="bg-success p-1 rounded-1">Dikembalikan</span></td>
                        @else
                            <td><span class="bg-warning p-1 rounded-1">Dipinjam</span></td>
                        @endif
                        <td>{{$pinjam->tanggal_kembali}}</td>
                        <td>
                        @if ($pinjam->status == "Dikembalikan")
                            <i style="font-size: 20px;" class="bi bi-cloud-check-fill ms-1"></i>
                        @else
                            <form method="POST" action="{{ route('pinjams.destroy',['pinjam' => $pinjam->id]) }}">
                            @csrf
                                <button type="submit" class="border-0 ms-0 rounded-0"><i style="font-size: 20px;" class="bi bi-cloud-arrow-down-fill"></i></button>
                            </form>
                        @endif
                           
                        </td>
                    </tr>
                    @empty
                    <td colspan="8" class="text-center border-none bg-none">Tidak ada data...</td>
                    @endforelse
                </tbody>
                </div>
            </table>
        </div>
        
    </div>
</div>
@endsection