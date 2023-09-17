<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koleksi;
use App\Models\Bibliografi;

class KoleksiController extends Controller
{
    //
    public function index() {
        $koleksis = Koleksi::all();
        return view('koleksi.index',['koleksis' => $koleksis]);
    }

    public function create() {
        $bibliografis = Bibliografi::all();
        return view('koleksi.create',['bibliografis' => $bibliografis]);
    }
    public function store(Request $request) {
        $validateData = $request->validate([
            'bibliografi_id' => 'required',
            'no_reg' => 'required|unique:koleksis',
            'ddc' => 'required',
            'collection_number' => 'required',
            'lokasi' => '',
            'tersedia' => '',
            'status' => '',
        ]);
        Koleksi::create($validateData); 
        return redirect()->route('koleksi.index')->with('pesan',"Penambahan data {$validateData['no_reg']} berhasil");
    }

    public function destroy(Koleksi $koleksi) {
        $koleksi->delete();

        return redirect()->route('koleksi.index')
          ->with('pesan',"Hapus data $koleksi->judul berhasil");
    }
}
