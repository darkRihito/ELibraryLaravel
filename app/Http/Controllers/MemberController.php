<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    //
    public function index() {
        $members = Member::all();
        return view('member.index',['members' => $members]);
    }

    public function create() {
        return view('member.create');
    }
    public function store(Request $request) {
        $validateData = $request->validate([
            'no_member' => 'required|unique:members',
            'nama' => 'required',
            'username' => 'required|unique:members',
            'password' => 'required',
            'status' => 'required',
            'email' => 'required|unique:members',
            'no_telp' => '',
        ]);
        Member::create($validateData); 
        return redirect()->route('member.index')->with('pesan',"Penambahan data {$validateData['nama']} berhasil");
    }

    public function destroy(Member $member) {
        $member->delete();

        return redirect()->route('member.index')
          ->with('pesan',"Hapus data $member->nama berhasil");
    }
}
