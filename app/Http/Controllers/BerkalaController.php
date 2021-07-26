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
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\Facades\DataTables;

class BerkalaController extends Controller
{
    public function berkalaindex()
    {

        return view('gajiberkala/tampilberkala');
    }

    
    
    public function tampilberkalafilter(Request $request)
    {
        // if ($request->ajax()) 
        // {

            $orderBy = 'pegawai.NIP';
            switch ($request->input('order.0.column')) {
                case "0":
                    $orderBy = 'pegawai.NIP';
                    break;
                case "1":
                    $orderBy = 'pegawai.Nama';
                    break;
                case "2":
                    $orderBy = 'pegawai.masa_kerja_t';
                    break;
                case "3":
                    $orderBy = 'pegawai.masa_kerja_b';
                    break;
                case "4":
                    $orderBy = 'gajiberkala.tgl_berlaku_S';
                    break;
            }

            $data = DB::table('pegawai')
                ->join('tbl_gaji_berkala', 'pegawai.id', '=', 'tbl_gaji_berkala.pegawai_id')
                // ->select('pegawai.*', 'tbl_gaji_berkala.tgl_berlaku_S')
                ->select('pegawai.id','pegawai.NIP', 'pegawai.Nama', 'pegawai.masa_kerja_t', 'pegawai.masa_kerja_b', 'tbl_gaji_berkala.tgl_berlaku_S');
                // ->whereyear('tbl_gaji_berkala.tgl_berlaku_S','=', date_format(now(), 'Y'))->get();
            // ->whereyear('tbl_gaji_berkala.tgl_berlaku_S', '=', $request->tahun);

            if($request->input('tahun')!=null){
                $data= $data->whereyear('tbl_gaji_berkala.tgl_berlaku_S', '=', $request->tahun)->get();
            }else{
            $data = $data->whereyear('tbl_gaji_berkala.tgl_berlaku_S','=', date_format(now(), 'Y'))->get();
            }

            $recordsFiltered = $data->count();

            if ($request->input('length') != -1) $data = $data->skip($request->input('start'))->take($request->input('length'));

            
            /*
             orderby dirubah dengan menggunakan sortby karena menggunakan L8
            **/
            // $data = $data->sortBy($orderBy, $request->input('order.0.dir'))->get();
            // $data = $data->orderBy($orderBy, 'asc')->get();
            // $data = $data->sortBy($orderBy,'desc');
            $recordsTotal = $data->count();

        //  return DataTables::of($data)
        //  ->make(true);


        // return DataTables::of($data)->make(true);

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ]);
        
        // else
        // {
        //     $data = DB::table('pegawai')
        //     ->join('tbl_gaji_berkala', 'pegawai.id', '=', 'tbl_gaji_berkala.pegawai_id')
        //     // ->select('pegawai.*', 'tbl_gaji_berkala.tgl_berlaku_S')
        //     ->select('pegawai.NIP', 'pegawai.Nama', 'pegawai.masa_kerja_t', 'pegawai.masa_kerja_b', 'tbl_gaji_berkala.tgl_berlaku_S')
        //     ->whereyear('tbl_gaji_berkala.tgl_berlaku_S', date_format(now(), 'Y'))->get();

        //     return view('gajiberkala/tampilberkala', ['data' => $data]);
        // }
    }
    
}
