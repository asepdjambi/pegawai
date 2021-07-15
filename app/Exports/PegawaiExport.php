<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
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
use \App\Models\pns;
use \App\Models\KADIS;

class PegawaiExport implements FromCollection, FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
    }

    public function view(): View
    {

        return view('cetak.cetakpegawaidiri', [
            'pegawai' => $pegawai,
            'keluarga' => $keluarga,
            'pendidikan' => $pendidikan,
            'struktural' => $struktural,
            'teknis' => $teknis,
            'riwjab' => $riwjab,
            'riwgol' => $riwgol,
            'gajiber' => $gajiber,
            'pns' => $pns
        ]);
    }
}
