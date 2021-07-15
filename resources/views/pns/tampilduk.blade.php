@extends('layouts.master')
@section('content')


<h3 style="text-align: center">DATA DUK DINAS PERHUBUNGAN</h3> <span>
    <h3 style="text-align: center">KABUPATEN BATANG HARI</h3>
</span>
<div class="row float-right">
    <a href="/cetakDUK" class="btn btn-danger btn-sm" target="_blank"><i class="nav-icon fas fa-print">&nbsp; Cetak</i></a>
</div>
<div class="table-responsive-sm">
    <table id="example8" class="table table-bordered table-striped" style="font-size: 7pt; text-align:center">
        <thead>
            <tr>
                <th rowspan="2" style="vertical-align: middle">NO</th>
                <th rowspan="2" style="vertical-align: middle">NAMA</th>
                <th rowspan="2" style="vertical-align: middle">NIP</th>
                <th colspan="2" style="vertical-align: middle">CPNS</th>
                <th colspan="2" style="vertical-align: middle">PANGKAT</th>
                <th colspan="3" style="vertical-align: middle">JABATAN</th>
                <th rowspan="2" style="vertical-align: middle">UNIT KERJA</th>
                <th colspan="2" style="vertical-align: middle">MKG</th>
                <th colspan="3" style="vertical-align: middle">DIKLAT JABATAN</th>
                <th colspan="3" style="vertical-align: middle">PENDIDIKAN FORMAL</th>
                <th colspan="3" style="vertical-align: middle">JK & USIA</th>
                <th rowspan="2" style="vertical-align: middle">CATATAN MUTASI KEPEG</th>
                <th rowspan="2" style="vertical-align: middle">KET</th>
            </tr>

            <tr>
                <th style="vertical-align: middle">GOL/RUANG</th>
                <th style="vertical-align: middle">TMT</th>
                <th style="vertical-align: middle">GOL/RUANG</th>
                <th style="vertical-align: middle">TMT</th>
                <th style="vertical-align: middle">NAMA JABATAN</th>
                <th style="vertical-align: middle">ESELON</th>
                <th style="vertical-align: middle">TMT</th>
                <th style="vertical-align: middle">THN</th>
                <th style="vertical-align: middle">BLN</th>
                <th style="vertical-align: middle">NAMA DIKLAT</th>
                <th style="vertical-align: middle">TAHUN.BULAN</th>
                <th style="vertical-align: middle">JML JAM</th>
                <th style="vertical-align: middle">NAMA JURUSAN</th>
                <th style="vertical-align: middle">TAHUN LULUS</th>
                <th style="vertical-align: middle">TINGKAT IJAZAH</th>
                <th style="vertical-align: middle">JK</th>
                <th style="vertical-align: middle">THN</th>
                <th style="vertical-align: middle">BLN</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp

            @foreach ($pegawai as $peg)

            <tr>
                <td style="vertical-align: middle">{{ $no++ }}</td>
                <td style="vertical-align: middle">{{ $peg->Nama }}</td>
                <td style="vertical-align: middle">{{ $peg->NIP }}</td>
                @php
                //mrnsmpilkan golongan
                $gol = \App\Models\pns::where('pegawai_id', '=', $peg->id)->get();
                @endphp
                {{-- data CPNS --}}
                {{-- gol CPNS --}}
                {{-- <td style="vertical-align: middle"># </td> --}}
                <td style="vertical-align: middle">
                    @if ($gol->isNotEmpty())
                    {{ $gol->golongan->gol }};
                    @else
                    #
                    @endif
                </td>
                {{-- tmt Capeg --}}

                {{-- //menampilkan tmt Capeg --}}
                @php
                $capeg=\App\Models\pns::where('pegawai_id', '=', $peg->id)->get();
                @endphp
                <td style="vertical-align: middle">
                    @if ($capeg->isNotEmpty())
                    {{ $peg->pns->tmt_capeg->format('d-m-Y') }};
                    @else
                    #
                    @endif
                </td>
                {{-- <td style="vertical-align: middle">#</td> --}}

                {{-- PANGKAT --}}
                <td style="vertical-align: middle">{{ $peg->golongan->gol }}</td>

                {{-- <td style="vertical-align: middle">#</td> --}}
                {{-- <td style="vertical-align: middle">{{ $peg->golongan->gol }}</td> --}}

                {{-- //TMT PANGKAT --}}
                @php
                // mengabil nilai akhir dari tabel
                $tmt1 = \App\models\riwayat_gol::where('pegawai_id', '=', $peg->id)
                ->where('master_gol_id','=',$peg->master_gol_id)
                ->get();

                // $tmt2 = $tmt1::max('tmt');

                // DB::select('select * from riwayat_gol where pegawai_id =' . $peg->id, [1]);
                @endphp
                {{-- merubah format menjadi 02-12-2020 tanpa protected $dates pada model --}}
                {{-- <td style="vertical-align: middle">{{ date('d-m-Y', strtotime($tmt1)) }}</td> --}}
                <td style="vertical-align: middle">
                    @if ($tmt1->isNotEmpty())
                    {{ $tmt1->tmt->format('d-m-Y') }};
                    @else
                    #
                    @endif
                </td>

                {{-- JABATAN --}}
                <td style="vertical-align: middle">{{ $peg->jab }}</td>
                <td style="vertical-align: middle">{{ $peg->jabatan->eselon }}</td>

                @php
                $jab = DB::table('riwayat_jab')
                ->where('pegawai_id', '=', $peg->id)
                ->where('master_jabatan_id','=',$peg->master_jabatan_id)
                ->get();

                $dikjab = App\Models\struktural::where('pegawai_id', '=', $peg->id)
                ->latest()
                ->get();

                $dikformal = App\Models\pendidikan::where('pegawai_id', '=', $peg->id)
                ->orderByDesc('id')
                ->first();

                $now = now(); //tanggal hari ini
                $t_lahir = $peg->tgl_L; //tanggal lahir
                $usia_tahun = $t_lahir->diffInYears($now); //menghitung usia dalam tahun
                $usia=date_diff($t_lahir,$now);
                $usia_bulan = $t_lahir->diffInMonths($now); //menghitung usia dalam bulan
                $usia_hari = $t_lahir->diffInDays($now); //menghitung usia dalam hari

                @endphp
                {{-- TMT --}}
                {{-- <td style="vertical-align: middle">{{ date('d-m-Y', strtotime($jab1)) }}</td> --}}
                <td style="vertical-align: middle">
                    @if ($jab->isNotEmpty())
                    {{ $jab->tmt->format('d-m-Y') }}
                    @else
                    #
                    @endif
                </td>



                <td style="vertical-align: middle">Dinas Perhubungan</td>

                {{-- MASA KERJA Golongan --}}
                {{-- <td style="vertical-align: middle">{{ $peg->masa_kerja_t }}</td> --}}
                <td style="vertical-align: middle">{{ $peg->masa_kerja_t }}</td>

                {{-- <td style="vertical-align: middle">{{ $peg->masa_kerja_b }}</td> --}}
                <td style="vertical-align: middle">{{ $peg->masa_kerja_b }}</td>


                {{-- DIKLAT JABATAN --}}
                {{-- <td style="vertical-align: middle">{{ $dikjab->nama_t }}</td> --}}
                @if ($dikjab->isNotEmpty())
                <td style="vertical-align: middle">
                    {{ $dikjab->nama }}
                </td>
                <td style="vertical-align: middle">
                    {{ $dikjab->tgl_m }}
                </td>
                <td style="vertical-align: middle">
                    {{ $dikjab->lama }}
                </td>
                @else
                <td style="vertical-align: middle">#</td>
                <td style="vertical-align: middle">#</td>
                <td style="vertical-align: middle">#</td>
                @endif

                {{-- <td style="vertical-align: middle">{{ $dikjab->tgl_m->format('Y.m') }}</td> --}}
                {{-- <td style="vertical-align: middle">#</td> --}}

                {{-- <td style="vertical-align: middle">{{ $dikjab->lama }}</td> --}}
                {{-- <td style="vertical-align: middle">#</td> --}}


                {{-- pendidikan --}}
                {{-- <td style="vertical-align: middle">{{ $dikformal->jurusan }}</td> --}}
                @if ($dikformal !=null )
                <td style="vertical-align: middle">
                    {{ $dikformal->tingkat }}
                </td>
                <td style="vertical-align: middle">
                    {{ $dikformal->tahun }}
                </td>
                <td style="vertical-align: middle">
                    {{ $dikformal->gelar }}
                </td>
                @else
                <td style="vertical-align: middle">#</td>
                <td style="vertical-align: middle">#</td>
                <td style="vertical-align: middle">#</td>
                @endif

                {{-- <td style="vertical-align: middle">{{ $dikformal->tahun }}</td> --}}
                {{-- <td style="vertical-align: middle">#</td> --}}

                {{-- <td style="vertical-align: middle">{{ $dikformal->gelar }}</td> --}}
                {{-- <td style="vertical-align: middle">#</td> --}}


                {{-- JENIS KELAMIN DAN USIA --}}
                <td style="vertical-align: middle">{{ $peg->JK }}</td>
                {{-- <td style="vertical-align: middle">#</td> --}}

                {{-- <td style="vertical-align: middle">{{ $usia_tahun }}</td> --}}
                <td style="vertical-align: middle">{{ $usia->y }}</td>

                {{-- <td style="vertical-align: middle">{{ $usia_bulan }}</td> --}}
                <td style="vertical-align: middle">{{ $usia->m }}</td>


                {{-- CATATAN MUTASI ATAU ASAL INSTANSI --}}
                <td style="vertical-align: middle">{{ $peg->asal_ins }}</td>
                {{-- <td style="vertical-align: middle">#</td> --}}


                {{-- KETERANGAN --}}
                <td style="vertical-align: middle">#</td>
            </tr>

            {{-- @php
                    $no++;
                @endphp --}}

            @endforeach
            </tfoot>
    </table>

</div>


@endsection