<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BibliografiController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\SirkulasiController;
use App\Http\Controllers\PinjamController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// CRUD MEMBER
Route::get('/members', [MemberController::class,'index'])
    ->name('member.index');
Route::get('/members/create', [MemberController::class,'create'])
    ->name('members.create');
Route::post('/members', [MemberController::class,'store'])
    ->name('members.store');
Route::delete('/member/{member}', [MemberController::class,'destroy'])
    ->name('members.destroy');

// CRUD BIBLIOGRAFI

Route::get('/bibliografis', [BibliografiController::class,'index'])
    ->name('bibliografi.index');
Route::get('/bibliografis/create', [BibliografiController::class,'create'])
    ->name('bibliografis.create');
Route::post('/bibliografis', [BibliografiController::class,'store'])
    ->name('bibliografis.store');
Route::get('/bibliografis/{bibliografi}', [BibliografiController::class,'show'])
    ->name('bibliografis.show');
Route::get('/bibliografis/{bibliografi}/edit', [BibliografiController::class,'edit'])
    ->name('bibliografis.edit');
Route::put('/bibliografis/{bibliografi}', [BibliografiController::class,'update'])
    ->name('bibliografis.update');
Route::delete('/bibliografi/{bibliografi}', [BibliografiController::class,'destroy'])
    ->name('bibliografis.destroy');

// CRUD KOLEKSI
Route::get('/koleksis', [KoleksiController::class,'index'])
    ->name('koleksi.index');
Route::get('/koleksis/create', [KoleksiController::class,'create'])
    ->name('koleksis.create');
Route::post('/koleksis', [KoleksiController::class,'store'])
    ->name('koleksis.store');
Route::delete('/koleksi/{koleksi}', [KoleksiController::class,'destroy'])
    ->name('koleksis.destroy');

// CRUD SIRKULASI
Route::get('/sirkulasis', [SirkulasiController::class,'index'])
    ->name('sirkulasi.index');
Route::get('/sirkulasis/create', [SirkulasiController::class,'create'])
    ->name('sirkulasis.create');
Route::post('/sirkulasis', [SirkulasiController::class,'store'])
    ->name('sirkulasis.store');

// CRUD PEMINJAMAN
Route::get('/pinjams', [PinjamController::class,'index'])
    ->name('pinjam.index');
Route::get('/pinjams/create', [PinjamController::class,'create'])
    ->name('pinjams.create');
Route::post('/pinjams', [PinjamController::class,'store'])
    ->name('pinjams.store');
Route::post('/pinjam/{pinjam}', [PinjamController::class,'destroy'])
    ->name('pinjams.destroy');
