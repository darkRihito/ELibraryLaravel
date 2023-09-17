<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bibliografi;
use App\Models\Koleksi;
use App\Models\Pinjam;
use App\Models\Member;

class BibliografiController extends Controller
{
    //
    public function index(Request $request) {

        
        $koleksis = Koleksi::all();
        $pinjams = Pinjam::all();
        $members = Member::all();

        if($request->has('search')){
            $bibliografis=Bibliografi::where("judul", 'LIKE', "%$request->search%")->get();
        }else{
            $bibliografis = Bibliografi::all();
        }
        

        return view('bibliografi.index',['bibliografis' => $bibliografis, 'koleksis' => $koleksis, 'pinjams' => $pinjams, 'members' => $members]);
    }

    public function create() {
        return view('bibliografi.create');
    }
    public function store(Request $request) {
        $validateData = $request->validate([
            'judul' => 'required|unique:bibliografis',
            'isbn' => 'required|unique:bibliografis',
            'sinopsis' => '',
            'penulis' => '',
            'penerbit' => '',
            'tahun_buku' => '',
            'kategori' => '',
            'registered' => '',
        ]);
        Bibliografi::create($validateData); 
        return redirect()->route('bibliografi.index')->with('pesan',"Penambahan data {$validateData['judul']} berhasil");
    }



    public function show(Bibliografi $bibliografi) {
        $bibliografis = bibliografi::with('koleksis')->where('id', $bibliografi)->first();
        return view('bibliografi.show', ['bibliografi' => $bibliografi, 'koleksi' => $bibliografis]);
    }

    public function edit(Bibliografi $bibliografi) {
        return view('bibliografi.edit',['bibliografi' => $bibliografi]);
    }
    public function update(Request $request, Bibliografi $bibliografi) {
        $validateData = $request->validate([
            'judul' => 'required',
            'isbn' => 'required',
            'sinopsis' => '',
            'penulis' => '',
            'penerbit' => '',
            'tahun_buku' => '',
            'kategori' => '',
            'registered' => '',
        ]);
        $bibliografi->update($validateData);
        return redirect()->route('bibliografis.show',['bibliografi' => $bibliografi->id])
            ->with('pesan',"Update data {$validateData['judul']} berhasil");
    }

    public function destroy(Bibliografi $bibliografi) {
        $bibliografi->delete();

        return redirect()->route('bibliografi.index')
          ->with('pesan',"Hapus data $bibliografi->judul berhasil");
    }
}
