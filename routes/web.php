<?php

use App\Http\Controllers\BerkalaController;
use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;


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
    return view('dashboard');
});

// USER
route::get('user','usercontroller@index');
// ----------------------------------//

// data pegawai PNS
// route::get('/pns/pegawai/aktif', 'PegawaiController@index');
route::get('/pns/pegawai/{jenis}', 'PegawaiController@index');

// data pegawai tampilan card
Route::get('/pns/pegawaicard/{jenis}', 'PegawaiController@card');

// entry data pegawai
route::get('/pns/entrypegawai', 'PegawaiController@entry');

// munculkan edit data pegawai
Route::get('/editpegawai/{id}', 'PegawaiController@editpegawai');

// simpan data mutasi pegawai
Route::post('/mutasi/{id}', 'PegawaiController@mutasipegawai');

// simpan edit pegawai
Route::post('/simpaneditpegawai/{id}', 'PegawaiController@simpaneditpegawai');

// menampilkan data pribadi
route::get('pns/{id}/diri', 'PegawaiController@diri');

// simpan data pribadi
route::post('/pns/simpanpribadi', 'PegawaiController@simpanpribadi');

// hapus data pribadi PNS
Route::get('/pns/hapus/{id}', 'PegawaiController@hapusdatapns');

// eksport pdfdiri
Route::get('/cetakpdf/{id}', 'PegawaiController@pdfdiri');

//cetak diri pegawai
Route::get('/cetakdiri/{id}', 'PegawaiController@cetakdiri');

// eksport excel data diri pegawai
Route::get('/exportexcel/{id}', 'PegawaiController@export');

// -------------------------------//

// entry data keluarga
route::get('pns/keluarga', 'PegawaiController@entrykeluarga');

// simpan data keluarga
route::post('/pns/simpankeluarga/{id}', 'PegawaiController@simpankeluarga');

// edit data keluarga
// gunakan tanda "/" untuk langsung ke halaman
route::get('/editkel/{id}/{id_kel}', 'PegawaiController@Editkel');

// simpan edit data keluarga
route::post('/simpaneditkel/{id}/{id_kel}', 'PegawaiController@simpaneditkel');

// hapus data keluarga
route::get('/hapuskel/{id}', 'PegawaiController@hapuskel');

// ----------------------------//


// menyimpan data pendidikan
route::post('/pns/simpanpendidikan/{id}', 'PegawaiController@simpanpendidikan');

// tampilkan halaman edit pendidikan
route::get('/editpend/{id}/{id_pend}', 'PegawaiController@editpend');

// simpan data edit pendidikan
route::post('/simpaneditpend/{id}/{id_pend}', 'PegawaiController@simpaneditpend');

// hapus pendidikan
route::get('/hapuspend/{id}', 'PegawaiController@hapuspend');

// -----------------------------------//

// menyimpan data struktural
route::post('/pns/simpanstruktural/{id}', 'PegawaiController@simpanstruktural');

// menampilkan halaman edit struktural
route::get('/editstr/{id}/{id_str}', 'PegawaiController@editstr');

// simpan edit struktural
route::post('/simpaneditstruktural/{id}/{id_str}', 'PegawaiController@simpaneditstr');

// hapus data struktural
route::get('/hapusstr/{id}', 'PegawaiController@hapusstr');

// -------------------------//
// simpan data teknis
route::post('/pns/simpanteknis/{id}', 'PegawaiController@simpanteknis');

// menampilkan halaman edit teknis
route::get('/edittek/{id}/{id_tek}', 'PegawaiController@edittek');

// simpan edit teknis
route::post('/simpaneditteknis/{id}/{id_str}', 'PegawaiController@simpanedittek');

// hapus data teknis
Route::get('/hapustek/{id}', 'PegawaiController@hapustek');

// ----------------------------//
// RIWAYAT JABATAN
// Simpan Data Riwayat Jabatan
route::post('/simpanriwjab/{id}', 'PegawaiController@simpanriwjab');

// menampilkan halaman edit riwayat jabatan
Route::get('/editriwjab/{id}', 'PegawaiController@editriwjab');

// hapus data teknis
Route::get('/hapustiwjab/{id}', 'PegawaiController@hapusriwjab');

// ----------------//

// Riwayat Golongan
// simpan data riwayat golongan
Route::post('/simpanriwgol/{id}', 'PegawaiController@simpanriwgol');

// menampilkan halaman edit golongan
Route::get('/editriwgol/{id}', 'PegawaiController@editriwgol');

// hapus data riwayat golongan
Route::get('/hapusriwgol/{id}', 'PegawaiController@hapusriwgol');



// -----------------//
// Riwayat Gaji Berkala
Route::get('/entrygajiberkala/{id}', 'PegawaiController@entrygajiberkala');

// simpan gaji berkala
Route::post('/simpangajiberkala/{id}', 'PegawaiController@simpangajiberkala');

// menampilkan data gaji berkala
Route::get('/editgajiberkala/{id}', 'PegawaiController@editgajiberkala');


// ----------------------------//
// tampilan cetak DUK pegawai
Route::get('/cetak/tampilduk', 'DUKController@tampil');

// cetakDUK
Route::get('/cetakDUK', 'DUKController@cetak');


// SKUMPTK

// menampilkann halaman skumptk pegawai
Route::get('/tampilskumptk', 'skumptkController@tampil');


Route::get('/cetakskumptk/{id}', 'skumptkController@cetak');


//Data PNS
// menampilkan data entry data pns
Route::get('/entrypns/{id}', 'PegawaiController@entrypns');

// simpan data pns
Route::post('/simpanpns/{id}', 'PegawaiController@simpanpns');

// SEKDA
//tampilkan sekda
Route::get('/tampilsekda', 'PegawaiController@sekda');

//edit data sekda
Route::get('/editsekda/{id}', 'PegawaiController@editsekda');

//simpan data sekda
Route::post('/simpansekda/{id}', 'PegawaiController@simpansekda');

//entry data sekda baru
Route::get('/entrysekda', 'PegawaiController@entrysekda');

//simpan data sekda baru
Route::post('/simpansekdabaru', 'PegawaiController@simpansekdabaru');

//hapus dara sekda
Route::get('/hapussekda/{id}', 'PegawaiController@hapussekda');



// KADIS
// tampilkan data kadis
Route::get('/tampilkadis', 'PegawaiController@tampilkadis');

//entry data kadis
Route::get('/entrykadis', 'PegawaiController@entrykadis');

//simpan edit kadis
Route::post('/simpankadis', 'PegawaiController@simpankadis');

//simpan entry kadis
Route::post('/simpankadisbaru', 'PegawaiController@simpankadisbaru');

//hapus kadis
Route::get('/hapuskadis/{id}', 'PegawaiController@hapuskadis');

// edit data kadis
Route::get('/editkadis', 'PegawaiController@editkadis');

// // simpan edit kadis
// Route::post('/simpankadis/{id}', 'PegawaiController@simpankadis');


//SEKRETARIS
//menampilkan data sekretaris
Route::get('/tampilsekre', 'PegawaiController@tampilsekre');

//menampilkan entry sekretaris
Route::get('/entrysekre', 'PegawaiController@entrysekre');

//menyimpan data sekretaris baru
Route::post('/simpansekrebaru', 'PegawaiController@simpansekrebaru');

//hapus data sekretaris
Route::get('/hapussekre/{id}', 'PegawaiController@hapussekre');

//tampil edit sekretaris
Route::get('/editsekre', 'PegawaiController@editsekre');

//simpan edit data sekretaris
Route::post('/simpansekre', 'PegawaiController@simpansekre');



//GAJI BERKALA--------///
// menampilkan gaji berkala

// Route::resource('/filter', 'BerkalaController@tampilberkalafilter');
// Route::resource('/tampilberkala', 'BerkalaController@tampilberkala');

// routing untuk filter ajax
Route::any('/tampilberkalafilter', 'BerkalaController@tampilberkalafilter');

// untuk loading halaman kali pertama
route::get('berkalaindex','BerkalaController@berkalaindex');

route::get('tampilberkalaajax', 'BerkalaController@tampilajax');


//PANGKAT BERKALA
//menampilkan pangkat berkala
Route::get('/tampilpangkatberkala', 'BerkalaController@tampilpangkatberkala');
