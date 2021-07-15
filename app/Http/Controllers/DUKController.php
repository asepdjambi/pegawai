<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use \App\Models\Pegawai;
use \App\Models\gol;
use \App\Models\master_jabatan;
use \App\Models\keluarga;
use \App\Models\pns;
use \App\Models\pendidikan;
use \App\Models\struktural;
use App\Models\teknis;
use \App\Models\jabatan;
use \App\Models\riwayat_gol;
use \App\Models\gajiberkala;
use \App\models\KADIS;
use PDF;

class DUKController extends Controller
{
    //    menampilkan halaman untuk cetak DUK
    public function tampil()
    {

        // $pegawai = Pegawai::where('aktif', 1)->get();
        // $pegawai = DB::table('pegawai')->first();
        $pegawai = Pegawai::where('aktif', '=', 'aktif')->orderBy('master_gol_id', 'asc')->get();
        // $gol = gol::all();
        // $master_jabatan = master_jabatan::all();
        // $keluarga = keluarga::all();
        // $pendidikan = pendidikan::all();
        // $struktural = struktural::all();
        // $teknis = teknis::all();
        // $jabatan = jabatan::all();
        // $riwayat_gol = riwayat_gol::all();
        // $pns = pns::all();
        // $gajiberkala = gajiberkala::all();
        // $kadis = KADIS::all()->first();


        // dd($pegawai, $gol, $master_jabatan, $keluarga, $pendidikan, $struktural, $teknis, $jabatan, $riwayat_gol, $gajiberkala, $kadis);

        return view('/pns.tampilduk', [
            'pegawai' => $pegawai
            // 'gol' => $gol,
            // 'keluarga' => $keluarga,
            // 'pendidikan' => $pendidikan,
            // 'master_jabatan' => $master_jabatan,
            // 'struktural' => $struktural,
            // 'teknis' => $teknis,
            // 'jabatan' => $jabatan,
            // 'pns' => $pns,
            // 'riwayat_gol' => $riwayat_gol,
            // 'gajiberkala' => $gajiberkala,
            // 'kadis' => $kadis
        ]);
    }

    // mencetak DUK
    public function cetak()
    {

        $pegawai = Pegawai::all();
        $kadis = KADIS::all()->first();


        $pdf = PDF::loadview('cetak.cetakduk', [
            'pegawai' => $pegawai,
            'kadis' => $kadis
        ])->setpaper('A4', 'landscape');
        return $pdf->stream();
        // return view('cetak/cetakDUK', ['pegawai' => $pegawai]);
    }
}
