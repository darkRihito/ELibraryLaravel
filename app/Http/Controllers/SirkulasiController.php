<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Sirkulasi;
use App\Models\Pinjam;
use App\Models\Bibliografi;

class SirkulasiController extends Controller
{
    //
    public function index() {
        $sirkulasis = Sirkulasi::all();
        $members = Member::all();
        $pinjams = Pinjam::all();
        return view('sirkulasi.index',['sirkulasis' => $sirkulasis, 'pinjams' => $pinjams],  ['members' => $members]);
    }

    public function create() {
        $members = Member::all();
        $bibliografis = Bibliografi::all();
        return view('sirkulasi.create', ['members' => $members, 'bibliografis' => $bibliografis]);
    }
    public function store(Request $request) {
        $validateData = $request->validate([
            'member_id' => 'required',
            'jumlah_buku' => '',
            'nama' => 'required|unique:sirkulasis',
            'catatan' => '',
        ]);
        Sirkulasi::create($validateData); 
        return redirect()->route('sirkulasi.index')->with('pesan',"Penambahan data {$validateData['member_id']} berhasil");
    }
}
