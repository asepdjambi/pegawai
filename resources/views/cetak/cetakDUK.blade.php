    <!-- Theme style -->
    {{--
    <link rel="stylesheet" href="{{ asset('admin/assets/dist/css/adminlte.min.css') }}"> --}}

    {{--
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}

    <link rel="stylesheet" href="admin/assets/dist/css/bootstrap.min.css">

    <p style="text-align: center; font-size=16pt"><strong>DATA DUK DINAS PERHUBUNGAN </strong><strong>KABUPATEN BATANG HARI</strong></p>
    <span></span>
    <table class="table table-bordered table-sm" style="font-size: 7pt; text-align:center; width:100%; cellspacing:15px">
        <thead>
            <tr>
                <th rowspan="2" style="vertical-align: middle; text-align:center">NO</th>
                <th rowspan="2" style="vertical-align: middle; text-align:center">NAMA</th>
                <th rowspan="2" style="vertical-align: middle; text-align:center">NIP</th>
                <th colspan="2" style="vertical-align: middle; text-align:center">CPNS</th>
                <th colspan="2" style="vertical-align: middle; text-align:center">PANGKAT</th>
                <th colspan="3" style="vertical-align: middle; text-align:center">JABATAN</th>
                <th rowspan="2" style="vertical-align: middle; text-align:center">UNIT KERJA</th>
                <th colspan="2" style="vertical-align: middle; text-align:center">MKG</th>
                <th colspan="3" style="vertical-align: middle; text-align:center">DIKLAT JABATAN</th>
                <th colspan="3" style="vertical-align: middle; text-align:center">PENDIDIKAN FORMAL</th>
                <th colspan="3" style="vertical-align: middle; text-align:center">JK & USIA</th>
                <th rowspan="2" style="vertical-align: middle; text-align:center">CATATAN MUTASI KEPEG</th>
                <th rowspan="2" style="vertical-align: middle; text-align:center">KET</th>
            </tr>

            <tr>
                <th style="vertical-align: middle; text-align:center">GOL/RUANG</th>
                <th style="vertical-align: middle; text-align:center">TMT</th>
                <th style="vertical-align: middle; text-align:center">GOL/RUANG</th>
                <th style="vertical-align: middle; text-align:center">TMT</th>
                <th style="vertical-align: middle; text-align:center">NAMA JABATAN</th>
                <th style="vertical-align: middle; text-align:center">ESELON</th>
                <th style="vertical-align: middle; text-align:center">TMT</th>
                <th style="vertical-align: middle; text-align:center">THN</th>
                <th style="vertical-align: middle; text-align:center">BLN</th>
                <th style="vertical-align: middle; text-align:center">NAMA DIKLAT</th>
                <th style="vertical-align: middle; text-align:center">TAHUN.BULAN</th>
                <th style="vertical-align: middle; text-align:center">JML JAM</th>
                <th style="vertical-align: middle; text-align:center">NAMA JURUSAN</th>
                <th style="vertical-align: middle; text-align:center">TAHUN LULUS</th>
                <th style="vertical-align: middle; text-align:center">TINGKAT IJAZAH</th>
                <th style="vertical-align: middle; text-align:center">JK</th>
                <th style="vertical-align: middle; text-align:center">THN</th>
                <th style="vertical-align: middle; text-align:center">BLN</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no=1
            @endphp

            @foreach ($pegawai as $peg)

                <tr>
                    <td style="vertical-align: middle">{{ $no++ }}</td>
                    <td style="vertical-align: middle">{{ $peg->Nama }}</td>
                    <td style="vertical-align: middle">{{ $peg->NIP }}</td>
                    @php
                    // $gol=App\Models\pns::where('pegawai_id','=',$peg->id)->first();
                    @endphp
                    {{-- <td style="vertical-align: middle">{{ $gol->golongan->gol }}</td> --}}
                    <td style="vertical-align: middle"></td>
                    <td style="vertical-align: middle">{{ $peg->pns->tmt_capeg->format('d-m-Y') }}</td>
                    <td style="vertical-align: middle">{{ $peg->golongan->gol }}</td>
                    @php
                    // mengabil nilai akhir dari tabel
                    $tmt1=DB::table('riwayat_gol')->where([
                    ['pegawai_id','=',$peg->id],
                    ])->max('tmt');

                    // $tmt2=$tmt1::max('tmt');

                    // DB::select('select * from riwayat_gol where pegawai_id ='.$peg->id, [1])
                    @endphp
                    {{-- merubah format menjadi 02-12-2020 tanpa protected $dates pada model --}}
                    <td style="vertical-align: middle">{{ date('d-m-Y', strtotime($tmt1)) }}</td>

                    <td style="vertical-align: middle">{{ $peg->jab }}</td>
                    <td style="vertical-align: middle">{{ $peg->jabatan->eselon }}</td>

                    @php
                    $jab1=DB::table('riwayat_jab')->where([
                    ['pegawai_id','=',$peg->id],
                    ])->max('tmt');

                    $masker=App\Models\gajiberkala::where('pegawai_id','=',$peg->id)
                    ->orderByDesc('id')
                    ->limit(1)
                    ->first();

                    $dikjab=App\Models\teknis::where('pegawai_id','=',$peg->id)
                    ->orderByDesc('id')
                    ->limit(1)
                    ->first();

                    $dikformal=App\Models\pendidikan::where('pegawai_id','=',$peg->id)
                    ->orderByDesc('id')
                    ->limit(1)
                    ->first();

                    $now=now();//tanggal hari ini
                    $t_lahir=$peg->tgl_L; //tanggal lahir
                    $usia_tahun=$t_lahir->diffInYears($now); //menghitung usia dalam tahun
                    $usia_bulan=$t_lahir->diffInMonths($now); //menghitung usia dalam bulan
                    $usia_hari=$t_lahir->diffInDays($now);//menghitung usia dalam hari

                    @endphp

                    <td style="vertical-align: middle">{{ date('d-m-Y', strtotime($jab1)) }}</td>
                    <td style="vertical-align: middle">Dinas Perhubungan</td>
                    <td style="vertical-align: middle">{{ $peg->masa_kerja_t }}</td>
                    <td style="vertical-align: middle">{{ $peg->masa_kerja_b }}</td>
                    <td style="vertical-align: middle">{{ $dikjab->nama_t }}</td>
                    <td style="vertical-align: middle">{{ $dikjab->tgl_m->format('Y.m') }}</td>
                    <td style="vertical-align: middle">{{ $dikjab->lama }}</td>
                    <td style="vertical-align: middle">{{ $dikformal->jurusan }}</td>
                    <td style="vertical-align: middle">{{ $dikformal->tahun }}</td>
                    <td style="vertical-align: middle">{{ $dikformal->gelar }}</td>
                    <td style="vertical-align: middle">{{ $peg->JK }}</td>
                    <td style="vertical-align: middle">{{ $usia_tahun }}</td>
                    <td style="vertical-align: middle">{{ $usia_bulan }}</td>
                    <td style="vertical-align: middle">{{ $peg->asal_ins }}</td>
                    <td style="vertical-align: middle">#</td>
                </tr>

                @php
                $no++;
                @endphp

            @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>
    <br>
    <div class="row mb-2">
        <div class="col-8"></div>
        <div class="col-4 float-right" style="font-size: 7pt">
            <p style="text-align: center">MUARA BULIAN, {{ now()->isoformat('DD MMMM Y') }}<br />
                KEPALA DINAS PERHUBUNGAN<br />
                KABUPATEN BATANG HARI<br>
                <br>
                <br>
            </p>
            <p style="text-align: center"><u> {{ strtoupper($kadis->pegawai->Nama) }}</u><br />
                NIP: {{ $kadis->pegawai->NIP }}</p>
        </div>
    </div>




    <script type="text/javascript">
        window.addEventListener("load", window.print());

    </script>
