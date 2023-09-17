<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\Koleksi;
use App\Models\Sirkulasi;
use App\Models\Bibliografi;
use DB;
use DateTime;
use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PinjamController extends Controller
{
    //
    public function index() {
        $bibliografis = Bibliografi::all();
        $pinjams = Pinjam::all();
        $koleksis = Koleksi::all();
        return view('pinjam.index',['pinjams' => $pinjams, 'koleksis' => $koleksis, 'bibliografis' => $bibliografis]);
    }

    public function create() {
        $pinjams = Pinjam::all();
        $koleksis = Koleksi::all();
        $sirkulasis = Sirkulasi::all();
        $bibliografis = Bibliografi::all();
        return view('pinjam.create', ['pinjams' => $pinjams, 'sirkulasis' => $sirkulasis, 'koleksis'=> $koleksis->where('tersedia', "Tersedia"), 'bibliografis' => $bibliografis]);
    }
    public function store(Request $request) {
        $koleksi_id = $request->get('koleksi_id');
        $validateData = $request->validate([
            'sirkulasi_id' => 'required',
            'koleksi_id' => 'required',
            'tanggal_pinjam' => '',
            'lama_pinjam' => '',
            'status' => '',
            'tanggal_kembali' => '',
        ]);
        DB::table('koleksis')->where('id', $koleksi_id )->update([
            'tersedia' => "Tidak Tersedia",
        ]);
        Pinjam::create($validateData); 
        return redirect()->route('pinjam.index')->with('pesan',"Penambahan data berhasil");
    }

    public function destroy(Pinjam $pinjam) {
        DB::table('pinjams')->where('id', $pinjam->id )->update([
            'status' => "Dikembalikan",
        ]);
        DB::table('koleksis')->where('id', $pinjam->koleksi_id )->update([
            'tersedia' => "Tersedia",
        ]);
        $dt = new DateTime();
        DB::table('pinjams')->where('id', $pinjam->id )->update([
            'tanggal_kembali' => $dt->format('Y-m-d H:i:s'),
        ]);

        return redirect()->route('pinjam.index')
          ->with('berhasil dikembalikan!');
    }
}
