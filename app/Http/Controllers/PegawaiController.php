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
use \App\Models\pns;
use \App\Models\KADIS;
use \App\Models\meninggal;
use \App\Models\mutasi;
use \App\Models\pensiun;
use \app\Models\masakerja;
use App\Exports\PegawaiExport;
use App\Models\sekda;
use App\Models\sekre;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class PegawaiController extends Controller
{
    public function index($jenis)
    {
        $data['jenis'] = $jenis;
        $data['PARENTTAG'] = "PEGAWAI";
        $data['CHILDTAG'] = $jenis;
        $jenis == 'AKTIF' ? $pegawai = Pegawai::where('aktif', '=', 'aktif')->orderBy('master_gol_id', 'asc')->get() : $pegawai = Pegawai::where('aktif', '!==', 'aktif')->orderBy('master_gol_id', 'asc')->get();
        $gol = gol::all();
        $jab = master_jabatan::all();

        return view('/pns/pegawai', ['pegawai' => $pegawai, 'gol' => $gol, 'jab' => $jab], $data);
    }

    // --------------------------------------//

    // SEKDA
    //menampilkan data sekda
    public function sekda()
    {
        $sekda = sekda::all();
        return view('/pns/tampilsekda', ['sekda' => $sekda]);
    }

    //menampilkan edit sekda
    public function editsekda($id)
    {
        $sekda = sekda::find($id);
        return view('/pns/editsekda', ['sekda' => $sekda]);
    }

    //simpan edit sekda
    public function simpansekda(Request $request, $id)
    {
        $sekda = sekda::find($id);
        $sekda->NIP = $request->nip;
        $sekda->NAMA = $request->nama;
        $sekda->save();

        return redirect('/tampilsekda');
    }

    //entry sekda baru
    public function entrysekda()
    {
        return view('/pns/entrysekda');
    }

    //simpan entry sekda baru
    public function simpansekdabaru(Request $request)
    {
        $sekda = new sekda;
        $sekda->NIP = $request->nip;
        $sekda->NAMA = $request->nama;
        $sekda->save();

        return redirect('/tampilsekda');
    }

    //hapus data sekda
    public function hapussekda($id)
    {
        sekda::find($id)->delete();
        return redirect('/tampilsekda');
    }

    //SEKRETARIS
    //menampilkan data sekretaris
    public function tampilsekre()
    {
        $sekre = sekre::all();
        return view('/pns/tampilsekre', ['sekre' => $sekre]);
    }

    //menampilkan tampilan entry sekretaris
    public function entrysekre()
    {
        $pegawai = pegawai::where('aktif', '=', 'aktif')->get();
        return view('/pns/entrysekre', ['pegawai' => $pegawai]);
    }

    //simpan data sekretaris baru
    public function simpansekrebaru(Request $request)
    {
        $sekre = new sekre;
        $sekre->pegawai_id = $request->pegawai_id;
        $sekre->save();

        return redirect('/tampilsekre');
    }

    //hapus data sekretaris
    public function hapussekre($id)
    {
        sekre::find($id)->delete();
        return redirect('/tampilsekre');
    }

    //tampil edit sekretaris
    public function editsekre()
    {
        $pegawai = pegawai::all();
        return view('/pns/editsekre', ['pegawai' => $pegawai]);
    }

    //simpan edit sekretaris
    public function simpansekre(Request $request)
    {
        $sekre = sekre::all()->first();
        $sekre->pegawai_id = $request->pegawai_id;
        $sekre->save();
        return redirect('/tampilsekre');
    }


    // menampilkan data diri pegawai
    public function diri($id)
    {
        $pegawai = Pegawai::find($id);
        $keluarga = keluarga::where('pegawai_id', '=', $id)
            ->orderBy('tgl_l', 'asc')
            ->get();
        $pendidikan = pendidikan::where('pegawai_id', '=', $id)->get();
        $struktural = struktural::where('pegawai_id', '=', $id)->get();
        $teknis = teknis::where('pegawai_id', '=', $id)->get();
        $riwjab = jabatan::where('pegawai_id', '=', $id)->get();
        $riwgol = riwayat_gol::where('pegawai_id', '=', $id)->get();
        $gajiber = gajiberkala::where('pegawai_id', '=', $id)->get();
        $pns = pns::where('pegawai_id', '=', $id)->get();


        $gol = gol::all();
        $jab = master_jabatan::all();

        return view('pns/tampildiri', [
            'pegawai' => $pegawai,
            'keluarga' => $keluarga,
            'gol' => $gol,
            'jab' => $jab,
            'pendidikan' => $pendidikan,
            'struktural' => $struktural,
            'teknis' => $teknis,
            'riwjab' => $riwjab,
            'riwgol' => $riwgol,
            'gajiber' => $gajiber,
            'pns' => $pns
        ]);
    }

    // eksport PDF
    public function pdfdiri($id)
    {
        $pegawai = Pegawai::find($id);
        $keluarga = keluarga::where('pegawai_id', '=', $id)
            ->orderBy('tgl_l', 'asc')
            ->get();
        $pendidikan = pendidikan::where('pegawai_id', '=', $id)->get();
        $struktural = struktural::where('pegawai_id', '=', $id)->get();
        $teknis = teknis::where('pegawai_id', '=', $id)->get();
        $riwjab = jabatan::where('pegawai_id', '=', $id)->get();
        $riwgol = riwayat_gol::where('pegawai_id', '=', $id)->get();
        $gajiber = gajiberkala::where('pegawai_id', '=', $id)->get();
        $pns = pns::where('pegawai_id', '=', $id)->get();

        $pdf = PDF::loadview('cetak.pdfpegawai', [
            'pegawai' => $pegawai,
            'keluarga' => $keluarga,
            'pendidikan' => $pendidikan,
            'struktural' => $struktural,
            'teknis' => $teknis,
            'riwjab' => $riwjab,
            'riwgol' => $riwgol,
            'gajiber' => $gajiber,
            'pns' => $pns
        ])->setpaper('A4', 'portrait');
        // return $pdf->stream();
        return $pdf->download('Data' . $pegawai->Nama . '_' . $pegawai->NIP);
    }

    // mutasi pegawai
    public function mutasipegawai(Request $request, $id)
    {
        $arsip = $request->file('arsip');

        //   mengcek apakah ada file yang akan di upload
        if ($request->hasFile('arsip')) {
            $nama_arsip = time() . "_" . $arsip->getClientOriginalName();
        } else {
            $nama_arsip = "";
        }

        //    tujuan copy arsip mutasi   
        $tujuan_mutasi = 'arsip/mutasi/';

        //    tujuan copy arsip meninggal   
        $tujuan_meninggal = 'arsip/meninggal/';

        //    tujuan copy arsip pensiun   
        $tujuan_pensiun = 'arsip/pensiun/';

        // dd($request->all());
        if ($request->mutasi == "mutasi") {

            mutasi::create([
                'pegawai_id' => $id,
                'ke' => $request->lokasi,
                'tgl_sk' => carbon::parse($request->tgl)->format('Y-m-d'),
                'arsip' => $nama_arsip
            ]);
            if ($request->hasFile('arsip')) {
                $arsip->move($tujuan_mutasi, $nama_arsip);
            }
        } elseif ($request->mutasi == "meninggal") {
            meninggal::create([
                'pegawai_id' => $id,
                'lokasi' => $request->lokasi,
                'tgl' => carbon::parse($request->tgl)->format('Y-m-d'),
                'arsip' => $nama_arsip
            ]);
            if ($request->hasFile('arsip')) {
                $arsip->move($tujuan_meninggal, $nama_arsip);
            }
        } else {
            pensiun::create([
                'pegawai_id' => $id,
                'tgl_sk' => carbon::parse($request->tgl)->format('Y-m-d'),
                'arsip' => $nama_arsip
            ]);
            if ($request->hasFile('arsip')) {
                $arsip->move($tujuan_pensiun, $nama_arsip);
            }
        }

        $pegawai = pegawai::find($id);
        $pegawai->aktif = $request->mutasi;
        $pegawai->save();

        return redirect('pns/pegawai');
    }

    public function export()
    {
        return Excel::download(new PegawaiExport, 'Data Pegawai.xlsx');
    }

    // cetak diri pns
    public function cetakdiri($id)
    {
        $pegawai = Pegawai::find($id);
        $keluarga = keluarga::where('pegawai_id', '=', $id)
            ->orderBy('tgl_l', 'asc')
            ->get();
        $pendidikan = pendidikan::where('pegawai_id', '=', $id)->get();
        $struktural = struktural::where('pegawai_id', '=', $id)->get();
        $teknis = teknis::where('pegawai_id', '=', $id)->get();
        $riwjab = jabatan::where('pegawai_id', '=', $id)->get();
        $riwgol = riwayat_gol::where('pegawai_id', '=', $id)->get();
        $gajiber = gajiberkala::where('pegawai_id', '=', $id)->get();
        $pns = pns::where('pegawai_id', '=', $id)->get();


        $gol = gol::all();
        $jab = master_jabatan::all();

        $pdf = PDF::loadview('/cetak/cetakpegawaidiri', [
            'pegawai' => $pegawai,
            'keluarga' => $keluarga,
            'gol' => $gol,
            'jab' => $jab,
            'pendidikan' => $pendidikan,
            'struktural' => $struktural,
            'teknis' => $teknis,
            'riwjab' => $riwjab,
            'riwgol' => $riwgol,
            'gajiber' => $gajiber,
            'pns' => $pns
        ])->setpaper('A4', 'portrait');
        return $pdf->stream();
    }

    public function card($jenis)
    {
        // $pegawai = Pegawai::orderBy('master_gol_id', 'Asc')->paginate(12);

        $jenis == 'AKTIF' ? $pegawai = Pegawai::where('aktif', '=', 'aktif')->orderBy('master_gol_id', 'asc')->paginate(12) : $pegawai = Pegawai::where('aktif', '!==', 'aktif')->orderBy('master_gol_id', 'asc')->paginate(12);
        $gol = gol::all();
        $jab = master_jabatan::all();
        $data['jenis'] = $jenis;

        return view('/pns/pegawaicard', ['pegawai' => $pegawai, 'gol' => $gol, 'jab' => $jab, 'jenis' => $jenis]);
    }

    public function entry()
    {
        // mengambil data pegawai
        $pegawai = Pegawai::all();
        $keluarga = keluarga::all();
        $kelpeg = $keluarga->groupBy('pegawai_id');
        // membuat list dari table golongan
        $gol1 = gol::pluck('gol', 'id');

        // membuat list dari table jabatan
        $jab = master_jabatan::pluck('eselon', 'id');

        // membuat list dari tabel pegawai
        $peg = pegawai::pluck('Nama', 'id');

        return view('/pns/entrypegawai', ['gol1' => $gol1, 'jab' => $jab, 'pegawai' => $pegawai, 'keluarga' => $keluarga, 'kelpeg' => $kelpeg, 'peg' => $peg]);
    }

    // muncul tampilan edit pegawai
    public function editpegawai($id)
    {
        // mengambil data pegawai
        $pegawai = Pegawai::find($id);
        $keluarga = keluarga::all();
        $kelpeg = $keluarga->groupBy('pegawai_id');
        // membuat list dari table golongan
        $gol1 = gol::pluck('gol', 'id');

        // membuat list dari table jabatan
        $jab = master_jabatan::pluck('eselon', 'id');

        // membuat list dari tabel pegawai
        $peg = pegawai::pluck('Nama', 'id');

        return view('/pns/editpegawai', ['gol1' => $gol1, 'jab' => $jab, 'pegawai' => $pegawai, 'keluarga' => $keluarga, 'kelpeg' => $kelpeg, 'peg' => $peg]);
    }

    public function simpanpribadi(Request $request)
    {
        // if ($request->hasFile('foto')) {
        $foto = $request->file('foto');


        //   mengcek apakah ada file yang akan di upload
        if ($request->hasFile('foto')) {
            $nama_foto = $request->nip . "_" . $foto->getClientOriginalName();
        } else {
            $nama_foto = "no-photo.png";
        }


        // }
        $tujuan_foto = 'arsip/foto/';

        // menghilangkan tanda "-" pada no hp
        // $hpawal = $request->hp;
        // $hpakhir = \preg_replace("/[^0-9]/", "", $hpawal);

        Pegawai::create([
            'NIP' => $request->nip,
            'NIP_lama' => $request->nip_lama,
            'Nama' => $request->nama,
            'NIK' => $request->nik,
            'KK' => $request->kk,
            'tempat_L' => $request->tempat_L,
            'tgl_L' => carbon::parse($request->tgl_L)->format('Y-m-d'),
            'JK' => $request->jk,
            'Alamat' => $request->alamat,
            'hp' => $request->hp,
            'email' => $request->email,
            'agama' => $request->agama,
            'status' => $request->status,
            'master_jabatan_id' => $request->eselon,
            'jab' => $request->jab,
            'master_gol_id' => $request->golongan,
            // menghapus titik pada nilai angka
            'gapok' => str_replace('.', '', $request->gapok),
            'NPWP' => $request->npwp,
            'karpeg' => $request->karpeg,
            'BPJS' => $request->BPJS,
            'masa_kerja_t' => $request->masa_kerja_t,
            'masa_kerja_b' => $request->masa_kerja_b,
            'asal_ins' => $request->asal_ins,
            'aktif' => "1",
            'foto' => $nama_foto
        ]);

        if ($request->hasFile('foto')) {
            $foto->move($tujuan_foto, $nama_foto);
        }


        return redirect('/pns/pegawai');
    }

    // simpan data edit pegawai
    public function simpaneditpegawai(Request $request, $id)
    {
        // if ($request->hasFile('foto')) {
        $foto = $request->file('foto');


        //   mengcek apakah ada file yang akan di upload
        if ($request->hasFile('foto')) {
            $nama_foto = $request->nip . "_" . $foto->getClientOriginalName();
        } else {
            $nama_foto = "no-photo.png";
        }


        // }
        $tujuan_foto = 'arsip/foto/';

        // menghilangkan tanda "-" pada no hp
        // $hpawal = $request->hp;
        // $hpakhir = \preg_replace("/[^0-9]/", "", $hpawal);

        $pegawai = Pegawai::find($id);

        $pegawai->NIP = $request->nip;
        $pegawai->NIP_lama = $request->nip_lama;
        $pegawai->Nama = $request->nama;
        $pegawai->NIK = $request->nik;
        $pegawai->KK = $request->kk;
        $pegawai->tempat_L = $request->tempat_L;
        $pegawai->tgl_L = carbon::parse($request->tgl_L)->format('Y-m-d');
        $pegawai->JK = $request->JK;
        $pegawai->Alamat = $request->alamat;
        $pegawai->hp = $request->hp;
        $pegawai->email = $request->email;
        $pegawai->agama = $request->agama;
        $pegawai->status = $request->status;
        $pegawai->master_jabatan_id = $request->eselon;
        $pegawai->jab = $request->jab;
        $pegawai->master_gol_id = $request->golongan;
        // menghapus titik pada nilai angka
        $pegawai->gapok = str_replace('.', '', $request->gapok);
        $pegawai->NPWP = $request->npwp;
        $pegawai->karpeg = $request->karpeg;
        $pegawai->BPJS = $request->BPJS;
        $pegawai->masa_kerja_t = $request->masa_kerja_t;
        $pegawai->masa_kerja_b = $request->masa_kerja_b;
        $pegawai->asal_ins = $request->asal_ins;
        $pegawai->aktif = "aktif";
        $pegawai->foto = $nama_foto;
        $pegawai->save();


        if ($request->hasFile('foto')) {
            $foto->move($tujuan_foto, $nama_foto);
        }


        return redirect('/pns/pegawai/aktif');
    }


    // hapus data PNS
    public function hapusdatapns($id)
    {

        keluarga::find($id)->delete();
        pendidikan::find($id)->delete();
        struktural::find($id)->delete();
        teknis::find($id)->delete();
        jabatan::find($id)->delete();
        riwayat_gol::find($id)->delete();
        gajiberkala::find($id)->delete();
        pns::find($id)->delete();
        Pegawai::find($id)->delete();

        return back();
    }

    // ----------------//
    // KADIS
    //tampilkan data kadis
    public function tampilkadis()
    {
        $data['PARENTTAG'] = "PIMPINAN";
        $data['CHILDTAG'] = "KADIS";
        $kadis = KADIS::all();
        return view('/pns/tampilkadis', ['kadis' => $kadis, $data]);
    }

    //tampilkan edit kadis
    public function editkadis()
    {
        $pegawai = pegawai::all();
        $kadis = KADIS::all();
        return view('/pns/editkadis', ['pegawai' => $pegawai, 'kadis' => $kadis]);
    }

    //simpan edit kadis
    public function simpankadis(Request $request)
    {
        $kadis = KADIS::all()->first();
        $kadis->pegawai_id = $request->pegawai_id;
        $kadis->save();

        return redirect('/tampilkadis');
    }

    //tampilkan entry kadis
    public function entrykadis()
    {
        $pegawai = pegawai::where('aktif', '=', 'aktif')->get();
        return view('/pns/entrykadis', ['pegawai' => $pegawai]);
    }

    //simpan data kadis baru
    public function simpankadisbaru(Request $request)
    {
        // dd($request);

        $kadis = new kadis;
        $kadis->pegawai_id = $request->pegawai_id;
        $kadis->save();

        return redirect('/tampilkadis');
    }

    //hapus data kadis
    public function hapuskadis($id)
    {
        KADIS::find($id)->delete();
        return redirect('/tampilkadis');
    }

    // --------------------------------------//
    // keluarga

    // entry data keluarga
    public function entrykeluarga()
    {
        $pegawai = pegawai::all();
        $keluarga = keluarga::all();
        return view('pns/keluarga', ['pegawai' => $pegawai, 'keluarga' => $keluarga]);
    }

    // simpan data keluarga
    public function simpankeluarga(Request $request, $id)
    {
        keluarga::create([
            'pegawai_id' => $id,
            'nama' => $request->nama,
            'tgl_l' => carbon::parse($request->tgl_L)->format('Y-m-d'),
            'status' => $request->status,
            'pekerjaan' => $request->pekerjaan,
            'hub' => $request->hub,
            'dt' => $request->dt,
        ]);

        return redirect('pns/' . $id . '/diri');
    }

    // tampilan edit keluarg1a
    public function Editkel($id, $id_kel)
    {
        $pegawai = pegawai::find($id);
        $keluarga = keluarga::find($id_kel);

        return view('pns/editkeluarga', ['keluarga' => $keluarga, 'pegawai' => $pegawai]);
    }

    // simpan edit data keluarga
    public function simpaneditkel(Request $request, $id, $id_kel)
    {
        $keluarga = keluarga::find($id_kel);

        $keluarga->nama = $request->nama;
        $keluarga->tgl_l = carbon::parse($request->tgl_L)->format('Y-m-d');
        $keluarga->status = $request->status;
        $keluarga->pekerjaan = $request->pekerjaan;
        $keluarga->hub = $request->hub;
        $keluarga->dt = $request->dt;
        $keluarga->save();

        return redirect('pns/' . $id . '/diri');
    }

    // hapus data keluarga
    public function hapuskel($id)
    {
        keluarga::find($id)->delete();
        return back();
    }

    // -------------------------------------------//

    //    pendidikan
    public function simpanpendidikan(Request $request, $id)
    {

        $arsipijazah = $request->file('up_ijazah');

        //   mengcek apakah ada file yang akan di upload
        if ($request->hasFile('up_ijazah')) {
            $nama_ijazah = time() . "_" . $arsipijazah->getClientOriginalName();
        } else {
            $nama_ijazah = "";
        }

        //    tujuan copy arsip   
        $tujuan = 'arsip/ijazah/';

        //    simpan data pendidikan
        pendidikan::create([
            'pegawai_id' => $id,
            'tingkat' => $request->tingkat,
            'nama_s' => $request->nama,
            'jurusan' => $request->jurusan,
            'tahun' => $request->tahun,
            'no_ijazah' => $request->no_ijazah,
            'gelar' => $request->gelar,
            'ijazah' => $nama_ijazah,
        ]);

        if ($request->hasFile('up_ijazah')) {
            $arsipijazah->move($tujuan, $nama_ijazah);
        }


        // $ijazah->move($tujuan, $nama_ijazah);

        return redirect('pns/' . $id . '/diri');
    }

    // tampilan edit pendidikan
    public function editpend($id, $id_pend)
    {
        $pegawai = pegawai::find($id);
        $pendidikan = pendidikan::find($id_pend);

        return view('pns/editpendidikan', ['pendidikan' => $pendidikan, 'pegawai' => $pegawai]);
    }

    public function simpaneditpend(Request $request, $id, $id_pend)
    {
        //    tujuan copy arsip
        $tujuan = 'arsip/ijazah/';

        $pendidikan = pendidikan::find($id_pend);


        $pendidikan->nama_s = $request->nama;
        $pendidikan->jurusan = $request->jurusan;
        $pendidikan->tahun = $request->tahun;
        $pendidikan->no_ijazah = $request->no_ijazah;
        $pendidikan->gelar = $request->gelar;

        //   mengecek apakah ada file yang akan di upload
        if ($request->hasFile('up_ijazah')) {
            $arsipijazah = $request->file('up_ijazah');
            $nama_ijazah = time() . "_" . $arsipijazah->getClientOriginalName();
            $arsipijazah->move($tujuan, $nama_ijazah);

            if ($pendidikan->arsip !== "") {
                // hapus file yang lama
                file::delete(public_path('arsip/ijazah/' . $pendidikan->ijazah));
            }

            $nama_ijazah = $nama_ijazah;
        }

        $pendidikan->save();

        return redirect('pns/' . $id . '/diri');
    }

    public function hapuspend($id)
    {
        pendidikan::find($id)->delete();
        return back();
    }

    // ------------------------------//

    // struktural
    // simpan data struktural
    public function simpanstruktural(Request $request, $id)
    {

        $arsipdiklat = $request->file('diklat_s');

        //   mengcek apakah ada file yang akan di upload
        if ($request->hasFile('diklat_s')) {
            $nama_diklat = time() . "_" . $arsipdiklat->getClientOriginalName();
        } else {
            $nama_diklat = "";
        }

        //    tujuan copy arsip   
        $tujuan = 'arsip/struktural/';

        //    simpan data pendidikan
        struktural::create([
            'pegawai_id' => $id,
            'nama' => $request->nama,
            'no_sttpl' => $request->no_sttpl,
            'lama'=>$request->lama,
            'tgl_m' => carbon::parse($request->tgl_m)->format('Y-m-d'),
            'tgl_s' => carbon::parse($request->tgl_s)->format('Y-m-d'),
            'penyelenggara' => $request->penyelenggara,
            'arsip' => $nama_diklat,
        ]);

        if ($request->hasFile('diklat_s')) {
            $arsipdiklat->move($tujuan, $nama_diklat);
        }


        // $ijazah->move($tujuan, $nama_ijazah);

        return redirect('pns/' . $id . '/diri');
    }

    // tampilkan tampilan edit struktural
    public function editstr($id, $id_str)
    {
        $pegawai = pegawai::find($id);
        $struktural = struktural::find($id_str);

        return view('/pns/editstruktural', ['pegawai' => $pegawai, 'struktural' => $struktural]);
    }

    // simpan edit struktural
    public function simpaneditstr(Request $request, $id, $id_str)
    {

        //    tujuan copy arsip   
        $tujuan = 'arsip/struktural/';

        $struktural = struktural::find($id_str);

        //    simpan data pendidikan 
        $struktural->nama = $request->nama;
        $struktural->no_sttpl = $request->no_sttpl;
        $struktural->tgl_m = carbon::parse($request->tgl_m)->format('Y-m-d');
        $struktural->tgl_s = carbon::parse($request->tgl_s)->format('Y-m-d');
        $struktural->penyelenggara = $request->penyelenggara;


        //   mengcek apakah ada file yang akan di upload
        if ($request->hasFile('diklat_s')) {
            $arsipdiklat = $request->file('diklat_s');
            $nama_diklat = time() . "_" . $arsipdiklat->getClientOriginalName();
            $arsipdiklat->move($tujuan, $nama_diklat);

            if ($struktural->arsip !== "") {
                file::delete(public_path('arsip/struktural/' . $struktural->arsip));
            }

            $struktural->arsip = $nama_diklat;
        }

        $struktural->save();

        return redirect('pns/' . $id . '/diri');
    }

    // hapus struktural
    public function hapusstr($id)
    {
        struktural::find($id)->delete();
        return back();
    }

    // ---------------------------//

    // teknis
    // simpan data teknis
    public function simpanteknis(Request $request, $id)
    {
        $arsipdiklat = $request->file('diklat_s');

        //   mengcek apakah ada file yang akan di upload
        if ($request->hasFile('diklat_s')) {
            $nama_diklat = time() . "_" . $arsipdiklat->getClientOriginalName();
        } else {
            $nama_diklat = "";
        }

        //    tujuan copy arsip   
        $tujuan = 'arsip/teknis/';

        // PINDAHKAN SERTIFIKAT KE ARSIP
        if ($request->hasFile('diklat_s')) {
            $arsipdiklat->move($tujuan, $nama_diklat);
        }

        //    simpan data pendidikan
        teknis::create([
            'pegawai_id' => $id,
            'nama_t' => $request->nama,
            'lama' => $request->lama,
            'no_sertifikat' => $request->no_sttpl,
            'tgl_m' => carbon::parse($request->tgl_m)->format('Y-m-d'),
            'tgl_s' => carbon::parse($request->tgl_s)->format('Y-m-d'),
            'penyelenggara' => $request->penyelenggara,
            'arsip' => $nama_diklat,
        ]);


        return redirect('pns/' . $id . '/diri');
    }

    // tampilkan tampilan edit teknis
    public function edittek($id, $id_tek)
    {
        $pegawai = pegawai::find($id);
        $teknis = teknis::find($id_tek);

        return view('/pns/editteknis', ['pegawai' => $pegawai, 'teknis' => $teknis]);
    }

    // simpan edit teknisl
    public function simpanedittek(Request $request, $id, $id_tek)
    {

        //    tujuan copy arsip   
        $tujuan = 'arsip/teknis/';

        $teknis = teknis::find($id_tek);

        //    simpan ulang data teknis 
        $teknis->nama_t = $request->nama;
        $teknis->no_sertifikat = $request->no_sttpl;
        $teknis->tgl_m = carbon::parse($request->tgl_m)->format('Y-m-d');
        $teknis->tgl_s = carbon::parse($request->tgl_s)->format('Y-m-d');
        $teknis->penyelenggara = $request->penyelenggara;

        //   mengecek apakah ada file yang akan di upload
        if ($request->hasFile('diklat_s')) {
            $arsipdiklat = $request->file('diklat_s');
            $nama_diklat = time() . "_" . $arsipdiklat->getClientOriginalName();
            $arsipdiklat->move($tujuan, $nama_diklat);

            //    cek apakah ada file arsip di database
            if ($teknis->arsip !== "") {
                //    jika ada maka hapus
                file::delete(public_path('arsip/teknis/' . $teknis->arsip));
            }

            $teknis->arsip = $nama_diklat;
        }

        $teknis->save();

        return redirect('pns/' . $id . '/diri');
    }

    // hapus data teknis
    public function hapustek($id)
    {
        teknis::find($id)->delete();
        return back();
    }


    // ---------------------//

    // Riwayat Jabatan
    // simpan data riwayat jabatan
    public function simpanriwjab(Request $request, $id)
    {
        $arsipsk = $request->file('arsip');

        //   mengcek apakah ada file yang akan di upload
        if ($request->hasFile('arsip')) {
            $nama_diklat = time() . "_" . $arsipsk->getClientOriginalName();
        } else {
            $nama_diklat = "";
        }

        //    tujuan copy arsip   
        $tujuan = 'arsip/jabatan/';

        // PINDAHKAN SK KE ARSIP
        if ($request->hasFile('arsip')) {
            $arsipsk->move($tujuan, $nama_diklat);
        }

        //    simpan data pendidikan
        jabatan::create([
            'pegawai_id' => $id,
            'jabatan' => $request->jabatan,
            'master_jabatan_id' => $request->eselon,
            'tmt' => $request->tmt,
            'tgl_sk' => carbon::parse($request->tgl_sk)->format('Y-m-d'),
            'tmt_lantik' => carbon::parse($request->tmt_lantik)->format('Y-m-d'),
            'no_sk' => $request->no_sk,
            'unit_k' => $request->unit_k,
            'satuan' => $request->satuan,
            'arsip' => $nama_diklat,
        ]);

        return redirect('pns/' . $id . '/diri');
    }

    // menampilkan data edit riwayat jabatan
    public function editriwjab($id)
    {
        // $pegawai = pegawai::find($id);
        $riwjab = jabatan::find($id);
        // membuat list dari table jabatan
        $jab = master_jabatan::all();

        return view('/pns/editriwjab', ['riwjab' => $riwjab, 'jab' => $jab]);
    }


    // simpan edit data riwayat jabatan
    public function simpaneditriwjab(Request $request, $id, $id_riwjab)
    {

        //    tujuan copy arsip   
        $tujuan = 'arsip/jabatan/';

        $riwjab = jabatan::find($id_riwjab);

        //    simpan ulang data riwjab$riwjab 
        $riwjab->jabatan = $request->jabatan;
        $riwjab->master_jabatan_id = $request->eselon;
        $riwjab->tmt = $request->tmt;
        $riwjab->tgl_sk = carbon::parse($request->tgl_sk)->format('Y-m-d');
        $riwjab->tmt_lantik = carbon::parse($request->tmt_lantik)->format('Y-m-d');
        $riwjab->no_sk = $request->no_sk;
        $riwjab->unit_k = $request->unit_k;
        $riwjab->satuan = $request->satuan;

        //   mengecek apakah ada file yang akan di upload
        if ($request->hasFile('diklat_s')) {
            $arsipdiklat = $request->file('diklat_s');
            $nama_diklat = time() . "_" . $arsipdiklat->getClientOriginalName();
            $arsipdiklat->move($tujuan, $nama_diklat);

            //    cek apakah ada file arsip di database
            if ($riwjab->arsip !== "") {
                //    jika ada maka hapus
                file::delete(public_path('arsip/jabatan/' . $riwjab->arsip));
            }

            $riwjab->arsip = $nama_diklat;
        }

        $riwjab->save();

        return redirect('pns/' . $id . '/diri');
    }

    // hapus data riwayat jabatan
    public function hapusriwjab($id)
    {
        jabatan::find($id)->delete();
        return back();
    }

    // -----------------
    // Riwayat Golongan
    // simpan data Riwayat Golongan
    public function simpanriwgol(Request $request, $id)
    {
        $arsipsk = $request->file('arsip');

        //   mengcek apakah ada file yang akan di upload
        if ($request->hasFile('arsip')) {
            $nama_diklat = time() . "_" . $arsipsk->getClientOriginalName();
        } else {
            $nama_diklat = "";
        }

        //    tujuan copy arsip   
        $tujuan = 'arsip/jabatan/';

        // PINDAHKAN SK KE ARSIP
        if ($request->hasFile('arsip')) {
            $arsipsk->move($tujuan, $nama_diklat);
        }

        //    simpan data pendidikan
        riwayat_gol::create([
            'pegawai_id' => $id,
            'master_gol_id' => $request->eselon,
            'no_sk' => $request->no_sk,
            'tmt' => carbon::parse($request->tmt)->format('Y-m-d'),
            'tgl' => carbon::parse($request->tgl_sk)->format('Y-m-d'),
            'arsip' => $nama_diklat,
        ]);

        return redirect('pns/' . $id . '/diri');
    }

    // tampilkan halaman edit riwayat golongan
    public function editriwgol($id)
    {
        // $pegawai = pegawai::find($id);
        $riwgol = riwayat_gol::find($id);
        // membuat list dari table jabatan
        $gol = gol::all();

        return view('/pns/editriwgol', ['riwgol' => $riwgol, 'gol' => $gol]);
    }

    // hapus riwayat golongan
    public function hapusriwgol($id)
    {
        riwayat_gol::find($id)->delete();
        return back();
    }


    // ----------------------//
    // GAJI BERKALA
    // menampilkan entry gaji berkala
    public function entrygajiberkala($id)
    {
        // gunakan find($id) agar bisa masuk
        $pegawai = pegawai::find($id);
        $gol1 = gol::all();
        return view('/pns/entrygajiberkala', ['pegawai' => $pegawai, 'gol1' => $gol1]);
    }

    // simpan riwayat gaji berkala
    public function simpangajiberkala(Request $request, $id)
    {
        $arsipsk = $request->file('arsip');

        //   mengcek apakah ada file yang akan di upload
        if ($request->hasFile('arsip')) {
            $nama_diklat = time() . "_" . $arsipsk->getClientOriginalName();
        } else {
            $nama_diklat = "";
        }

        //    tujuan copy arsip   
        $tujuan = 'arsip/gaji_berkala/';

        // PINDAHKAN SK KE ARSIP
        if ($request->hasFile('arsip')) {
            $arsipsk->move($tujuan, $nama_diklat);
        }

        //    simpan data pendidikan
        gajiberkala::create([

            'pegawai_id' => $id,
            'No' => $request->No,
            'tgl' => carbon::parse($request->tgl)->format('Y-m-d'),
            'gaji_lama' => str_replace(".", "", $request->gaji_lama),
            'gaji_baru' => str_replace(".", "", $request->gaji_baru),
            'pejabat' => $request->pejabat,
            'tgl_berlaku_L' => carbon::parse($request->tgl_berlaku_L)->format('Y-m-d'),
            'masa_L_tahun' => $request->masa_L_tahun,
            'masa_L_bulan' => $request->masa_L_bulan,
            'tgl_no_L' => $request->tgl_no_L,
            'tgl_berlaku_B' => carbon::parse($request->tgl_berlaku_B)->format('Y-m-d'),
            'masa_kerja_tahun_B' => $request->masa_kerja_tahun_B,
            'masa_kerja_bulan_B' => $request->masa_kerja_bulan_B,
            'master_gol_id' => $request->master_gol_id,
            'tgl_berlaku_S' => carbon::parse($request->tgl_berlaku_S)->format('Y-m-d'),
            'arsip' => $nama_diklat

        ]);

        return redirect('pns/' . $id . '/diri');
    }

    // muculkan edit gaji berkala
    public function editgajiberkala($id)
    {
        $gajiber = gajiberkala::find($id);
        $gol1 = gol::all();
        return view('/pns/editgajiberkala', ['gajiber' => $gajiber, 'gol1' => $gol1]);
    }

    // -----------------------//
    // Data PNS
    // entry data PNS
    public function entrypns($id)
    {
        $pegawai = pegawai::find($id);
        $gol1 = gol::all();
        return view('pns/entrypns', ['pegawai' => $pegawai, 'gol1' => $gol1]);
    }

    // simpan data PNS
    public function simpanpns(Request $request, $id)
    {
        $arsipcapeg = $request->file('scan_capeg');
        $arsipskumptk = $request->file('scan_skumptk');
        $arsippns = $request->file('scan_pns');

        //   mengcek apakah ada file yang akan di upload
        if ($request->file('scan_capeg')) {
            $nama_capeg = time() . "_" . $arsipcapeg->getClientOriginalName();
        } else {
            $nama_capeg = "";
        }

        //    tujuan copy arsip capeg 
        $tujuan_capeg = 'arsip/capeg/';

        // PINDAHKAN SK KE ARSIP
        if ($request->file('scan_capeg')) {
            $arsipcapeg->move($tujuan_capeg, $nama_capeg);
        }

        // ---------------------------------------------------

        //   mengcek apakah ada file yang akan di upload
        if ($request->file('scan_skumptk')) {
            $nama_skumptk = time() . "_" . $arsipskumptk->getClientOriginalName();
        } else {
            $nama_skumptk = "";
        }

        //    tujuan copy arsip capeg 
        $tujuan_skumptk = 'arsip/skumptk/';

        // PINDAHKAN SK KE ARSIP
        if ($request->file('scan_skumptk')) {
            $arsipskumptk->move($tujuan_skumptk, $nama_skumptk);
        }

        // ---------------------------------------------------

        //   mengcek apakah ada file yang akan di upload
        if ($request->file('scan_pns')) {
            $nama_pns = time() . "_" . $arsippns->getClientOriginalName();
        } else {
            $nama_pns = "";
        }

        //    tujuan copy arsip capeg 
        $tujuan_pns = 'arsip/pns/';

        // PINDAHKAN SK KE ARSIP
        if ($request->file('scan_pns')) {
            $arsippns->move($tujuan_pns, $nama_pns);
        }


        //    simpan data PNS
        pns::create([

            'pegawai_id' => $id,
            'no_capeg' => $request->no_capeg,
            'master_gol_id' => $request->golongan,
            'tmt_capeg' => carbon::parse($request->tmt_capeg)->format('Y-m-d'),
            'scan_capeg' => $nama_capeg,
            'no_skumptk' => $request->no_skumptk,
            'tmt_skumptk' => carbon::parse($request->tmt_skumptk)->format('Y-m-d'),
            'scan_skumptk' => $nama_skumptk,
            'no_pns' => $request->no_pns,
            'tmt_pns' => carbon::parse($request->tmt_pns)->format('Y-m-d'),
            'scan_pns' => $nama_pns
        ]);

        return redirect('pns/' . $id . '/diri');
    }
}
