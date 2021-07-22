<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use App\Models\pangkatberkala;
use \App\models\KADIS;
use PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use DataTables;

class BerkalaController extends Controller
{
    public function tampilberkala(Request $request)
    {
        $orderBy = 'pegawai.NIP';
        switch ($request->input('order.0.column')) {
            case "0":
                $orderBy = 'pegawai.NIP';
                break;
            case "1":
                $orderBy = 'pegawai.Nama';
                break;
            case "2":
                $orderBy = 'pegawai.masa_kerja_b';
                break;
            case "3":
                $orderBy = 'gajiberkala.tgl_berlaku_S';
                break;
        }

        $data = DB::table('pegawai')
            ->join('tbl_gaji_berkala', 'pegawai.id', '=', 'tbl_gaji_berkala.pegawai_id')
            // ->select('pegawai.*', 'tbl_gaji_berkala.tgl_berlaku_S')
            -> select('pegawai.NIP', 'pegawai.Nama', 'pegawai.masa_kerja_t', 'pegawai.masa_kerja_b', 'tbl_gaji_berkala.tgl_berlaku_S')
            ->whereyear('tbl_gaji_berkala.tgl_berlaku_S', date_format(now(), 'Y'))->get();
        // ->whereyear('tbl_gaji_berkala.tgl_berlaku_S', '=', $request->tahun);

        $recordsFiltered = $data->count();

        if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));
        // $data = $data->orderBy($orderBy, $request->input('order.0.dir'))->get();
        // $data = $data->orderBy($orderBy, 'asc')->get();
        // $data = $data->sortBy($orderBy,'desc');
        $recordsTotal = $data->count();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);



        // if ($request->ajax()) {
        //     if($request->input('tahun')){

        //         $data=DB::table('tbl_gaji_berkala')
        //         ->join('pegawai', 'tbl_gaji_berkala.pegawai_id','=', 'pegawai.NIP')
        //         ->select('pegawai.NIP','pegawai.Nama','pegawai.masa_kerja_t','pegawai.masa_kerja_b','tbl_gaji_berkala.tgl_berlaku_S','tbl_gaji_berkala.pegawai_id')
        //         ->whereyear('tbl_gaji_berkala.tgl_berlaku_S','=',$request->tahun);
        //         // $data = gajiberkala::whereyear('tgl_berlaku_S', '=', $request->tahun);
        //     }
        //     else{
        //         $data = DB::table('tbl_gaji_berkala')
        //             ->join('pegawai', 'tbl_gaji_berkala.pegawai_id', '=', 'pegawai.NIP')
        //         ->select('pegawai.NIP', 'pegawai.Nama', 'pegawai.masa_kerja_t', 'pegawai.masa_kerja_b','tbl_gaji_berkala.tgl_berlaku_S','tbl_gaji_berkala.pegawai_id')
        //         ->whereyear('tbl_gaji_berkala.tgl_berlaku_S', '=', date('Y'));
        //         // $data = gajiberkala::whereyear('tgl_berlaku_S', '=', date('Y'));
        //     }


        //     return DataTables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('Aksi', function ($row) {
        //             if ($row->aksi) {

        //                 return  '<a href="" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Cetak Gaji Berkala Pegawai" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>';
        //             }
        //         })
        //         ->rawColumns(['Aksi'])
        //         ->make(true);
        // };

        // $berkala = gajiberkala::whereYear('tgl_berlaku_S', '=', date('Y'))
        //     ->get();
        // dd($berkala);
        // return view('gajiberkala/tampilberkala', compact('berkala'));
    }


    // public function tampilberkalafilter(Request $request)
    // {
    //     //         $pegawai=Pegawai::all();
    //     //         $peg_nik=$pegawai->nik;
    //     // $peg_nama=$pegawai->nama;
    //     // $peg_masakerja=$pegawai->masa_kerja_t;


    //     // $orderBy = 'pegawai.NIP';
    //     // switch ($request->input('order.0.column')) {
    //     //     case '0':
    //     //         $orderBy = 'pegawai.NIP';
    //     //         break;
    //     //     case "1":
    //     //         $orderBy = 'pegawai.Nama';
    //     //         break;
    //     //     case "2";
    //     //         $orderBy = 'pegawai.masa_kerja_t';
    //     //         break;
    //     //     case "3":
    //     //         $orderBy = 'gajiberkala.tgl_berlaku_S';
    //     //         break;
    //     // }
    //     // $data = gajiberkala::select([
    //     //     'gajiberkala.*',
    //     //     'pegawai.NIP as NIP',
    //     //     'pegawai.Nama as Nama',
    //     //     'pegawai.masa_kerja_t as Masa_kerja_sebelumnya'
    //     // ])->join('pegawai', 'pegawai_id', '=', 'gajiberkala.pegawai_id');

    //     // if($request->input('tahun')!=null){
    //     //     $data=$data->whereyear('tgl_berlaku_S',$request->tahun);
    //     // }

    //     // return response()->json([
    //     //     'draw' => $request->input('draw'),
    //     //     'data' => $data
    //     // ]);

    //     if ($request->ajax()) {
    //         $data = gajiberkala::whereyear('tgl_berlaku_S', '=', $request->tahun);
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('Aksi', function ($row) {
    //                 if ($row->aksi) {

    //                     return  '<a href="" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Cetak Gaji Berkala Pegawai" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>';
    //                 }
    //             })
    //             ->rawColumns(['Aksi'])
    //             ->make(true);
    //     }

    //     return view('tampilberkala');
    //     // $isi_tabel
    //     // = gajiberkala::whereYear('tgl_berlaku_S', '=', $request->tahun)
    //     // ->get();
    //     // return $isi_tabel;
    // }

    public function tampilajax(Request $request)
    {
        if ($request->tahun == date('Y')) {
            $berkala = gajiberkala::whereYear('tgl_berlaku_S', '=', date('Y'));
        } else {
            $berkala = gajiberkala::whereYear('tgl_berlaku_S', '=', date('Y') + 1);
        }
        // return $berkala;
        return view('gajiberkala/tampilberkala', ['berkala' => $berkala]);
    }

    public function tampilpangkatberkala()
    {
        $pangkat = pangkatberkala::whereyear('tgl_berlaku_s', '=', date('Y'))
            ->get();

        return view('pangkatberkala/tampilpangkatberkala', ['pangkat' => $pangkat]);
    }
}
