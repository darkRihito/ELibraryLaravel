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
                <h2>LIST MEMBER</h2>
                <a href="{{ route('members.create') }}" class="btn btn-primary rounded-0"><i style="font-size: 20px;" class="bi bi-plus"></i>Add Member</a>
            </div>
            <div style="height:500px; overflow:scroll; overflow-x:hidden;" class="">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Member</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                        <tbody>
                        @forelse ($members as $member)
                        <tr>
                            <th>{{$loop->iteration}}</th>
                            <td>{{$member->no_member}}</td>
                            <td>{{$member->nama}}</td>
                            <td>{{$member->username}}</td>
                            <td>{{$member->password}}</td>
                            <td>{{$member->status}}</td>
                            <td>{{$member->email}}</td>
                            <td>{{$member->no_telp}}</td>
                            <td>
                                <form method="POST" action="{{ route('members.destroy',['member' => $member->id]) }}">
                                @method('DELETE')
                                @csrf
                                    <button type="submit" class="border-0 ms-0 rounded-0"><i class="bi bi-trash-fill" style="font-size: 20px;"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <td colspan="9" class="text-center">Tidak ada data...</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>
@endsection