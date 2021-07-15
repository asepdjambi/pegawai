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
use \App\Models\pendidikan;
use \App\Models\struktural;
use App\Models\teknis;
use \App\Models\jabatan;
use \App\Models\riwayat_gol;
use \App\Models\gajiberkala;
use \App\models\pns;
use \App\models\KADIS;
use PDF;

class skumptkController extends Controller
{
    public function tampil()
    {
        $pegawai = Pegawai::where('aktif', '=', 'aktif')->orderBy('master_gol_id', 'asc')->get();

        return view('/pns/tampilskumptk', [
            'pegawai' => $pegawai
        ]);
    }

    public function cetak($id)
    {
        $pegawai = Pegawai::find($id);
        $keluarga = keluarga::where('pegawai_id', '=', $id)->get();
        $pns = pns::where('pegawai_id', '=', $id)->first();
        $kadis = kadis::all()->first();

        $pdf = PDF::loadview('cetak.cetakskumptk', [
            'pegawai' => $pegawai,
            'keluarga' => $keluarga,
            'pns' => $pns,
            'kadis' => $kadis
        ])->setpaper([0, 0, 595.276, 935.433], 'portrait'); //<----menampilkan ukuran kertas 21x33 (F4) ke point
        return $pdf->stream();
    }
}
