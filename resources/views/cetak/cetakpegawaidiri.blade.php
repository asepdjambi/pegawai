    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CETAK PDF DATA DIRI PEGAWAI</title>

        <link rel="stylesheet" href="admin/assets/dist/css/bootstrap.min.css">
    </head>

    <body>


        <h4 style="text-align: center">DATA PEGAWAI PNS DINAS PERHUBUNGAN <br />
            KABUPATEN BATANG HARI </h4>
        <hr>
        <div class="row mb-2" style="font-size: 10pt">
            <div class="col-7">
                <table>
                    <tr>
                        <td style="width: 30px">NAMA </td>
                        <td>: </td>
                        <td style="width: 180px"> {{ $pegawai->Nama }}</td>
                        <td></td>
                        <td></td>
                        <td style="width: 100px"></td>
                        <td style="width: 30px">Jabatan </td>
                        <td>:</td>
                        <td style="width: 180px">{{ $pegawai->jab }}</td>
                    </tr>
                    <tr>
                        <td style="width: 30px">NIP </td>
                        <td>:</td>
                        <td>{{ $pegawai->NIP }}</td>
                        <td></td>
                        <td></td>
                        <td style="width: 100px"></td>
                        <td style="width: 30px">Golongan </td>
                        <td>:</td>
                        <td>{{ $pegawai->golongan->gol }}</td>
                    </tr>
                </table>
            </div>

            <div class="col-5" style="float: right">
                <img src="arsip/foto/{{ $pegawai->foto }}" alt="" style="float: right;width:80px;height:90px">
            </div>
            <br>
            <br>

        </div>
        <hr>

        {{-- tabel keluarga --}}
        <p style="font-size: 10pt">Data Keluarga:</p>

        {{-- data keluarga --}}
        <table id="" class="table table-bordered table-striped table-sm" style="font-size: 10pt">
            <thead>

                <tr>
                    <th style="width: 200px;text-align: center;vertical-align:middle">Nama</th>
                    <th style="text-align: center;vertical-align:middle">Tanggal Lahir</th>
                    <th style="text-align: center;vertical-align:middle">Status</th>
                    <th style="text-align: center;vertical-align:middle">Pekerjaan</th>
                    <th style="text-align: center;vertical-align:middle">Hubungan Keluarga</th>
                    <th style="width: 80px;text-align: center;vertical-align:middle">Tanggungan</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($keluarga as $k)
                    <tr>
                        <td>{{ $k->nama }}</td>
                        <td>{{ $k->tgl_l->format('d-m-Y') }}</td>
                        <td>{{ $k->status }}</td>
                        <td>{{ strtoupper($k->pekerjaan) }}</td>
                        <td>
                            {{-- {{ $k->hub }} --}}
                            @php
                            $hub=$k->hub;
                            @endphp
                            @if ($hub == 'AK')
                                Anak Kandung
                            @elseif($hub=='AT')
                                Anak Tiri
                            @elseif($hub=='AA')
                                Anak Angkat
                            @elseif($hub=='istri')
                                Istri
                            @elseif($hub=='suami')
                                Suami
                            @endif

                        </td>
                        <td>{{ $k->dt }}</td>

                    </tr>
                @endforeach
                </tfoot>
        </table>

        {{-- data pendidikan --}}
        <p style="font-size: 10pt">Data pendidikan:<br />
        <table id="" class="table table-bordered table-striped table-sm" style="font-size: 10pt">
            <thead>

                <tr style="text-align: center">
                    <th style="width:20px;text-align: center;vertical-align:middle">Tingkat</th>
                    <th style="text-align: center;vertical-align:middle">Nama Sekolah</th>
                    <th style="text-align: center;vertical-align:middle">Jurusan</th>
                    <th style="width:20px;text-align: center;vertical-align:middle">Tahun Lulus</th>
                    <th style="text-align: center;vertical-align:middle">Nomor Ijazah</th>
                    <th style="width:20px;text-align: center;vertical-align:middle">Gelar</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($pendidikan as $pend)
                    <tr>
                        <td>{{ $pend->tingkat }}</td>
                        <td>{{ strtoupper($pend->nama_s) }}</td>
                        <td>{{ strtoupper($pend->jurusan) }}</td>
                        <td>{{ $pend->tahun }}</td>
                        <td>{{ $pend->no_ijazah }}</td>
                        <td> {{ $pend->gelar }} </td>

                    </tr>
                @endforeach
                </tfoot>
        </table>
        </p>


        {{-- diklat Struktural --}}
        <p style="font-size: 10pt">Data Diklat Struktural:</p>

        <table id="" class="table table-bordered table-striped table-sm" style="font-size: 10pt">
            <thead>

                <tr style="text-align: center">
                    <th style="text-align: center;vertical-align:middle">Nama</th>
                    <th style="text-align: center;vertical-align:middle">Nomor STTPL</th>
                    <th style="width:30px;text-align: center;vertical-align:middle">Tanggal Mulai</th>
                    <th style="width:30px;text-align: center;vertical-align:middle">Tanggal Selesai</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($struktural as $st)
                    <tr>
                        <td>{{ strtoupper($st->nama) }}</td>
                        <td style="width: 170px">{{ $st->no_sttpl }}</td>
                        <td style="width: 130px">{{ $st->tgl_m->format('d-m-Y') }}</td>
                        <td style="width: 130px">{{ $st->tgl_s->format('d-m-Y') }}</td>

                    </tr>
                @endforeach
                </tfoot>
        </table>

        {{-- diklat Teknis --}}
        <p style="font-size: 10pt">Data Diklat Teknis:</p>

        <table id="" class="table table-bordered table-striped table-sm" style="font-size: 10pt">
            <thead>

                <tr>
                    <th style="text-align: center;vertical-align:middle">Nama Diklat</th>
                    <th style="text-align: center;vertical-align:middle">Jumlah Jam</th>
                    <th style="text-align: center;vertical-align:middle">Tanggal Mulai</th>
                    <th style="text-align: center;vertical-align:middle">Tanggal Selesai</th>
                    <th style="text-align: center;vertical-align:middle">Nomor Sertifikat</th>
                    <th style="text-align: center;vertical-align:middle">Penyelenggara</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($teknis as $tek)
                    <tr>
                        <td>{{ strtoupper($tek->nama_t) }}</td>
                        <td>{{ $tek->lama }}</td>
                        <td>{{ $tek->tgl_m->format('d-m-Y') }}</td>
                        <td>{{ $tek->tgl_s->format('d-m-Y') }}</td>
                        <td>{{ $tek->no_sertifikat }}</td>
                        <td>{{ strtoupper($tek->penyelenggara) }}</td>

                    </tr>
                @endforeach
                </tfoot>
        </table>

        {{-- Riwayat Jabatan --}}

        <p style="font-size: 10pt">Riwayat Jabatan:</p>
        <table id="" class="table table-bordered table-striped table-sm" style="font-size: 10pt">
            <thead>

                <tr>
                    <th style="text-align: center;vertical-align:middle">Jabatan</th>
                    <th style="text-align: center;vertical-align:middle">Eselon</th>
                    <th style="text-align: center;vertical-align:middle">TMT Jabatan</th>
                    <th style="text-align: center;vertical-align:middle">Tanggal SK</th>
                    <th style="text-align: center;vertical-align:middle">TMT Lantik</th>
                    <th style="text-align: center;vertical-align:middle">Nomor SK</th>
                    <th style="text-align: center;vertical-align:middle">Unit Kerja</th>
                    <th style="text-align: center;vertical-align:middle">Satuan Kerja</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($riwjab as $r)
                    <tr>
                        <td>{{ $r->jabatan }}</td>
                        <td>{{ $r->jabeselon->eselon }}</td>
                        <td>{{ $r->tmt->format('d-m-Y') }}</td>
                        <td>{{ $r->tgl_sk->format('d-m-Y') }}</td>
                        <td>{{ $r->tmt_lantik->format('d-m-Y') }}</td>
                        <td>{{ $r->no_sk }}</td>
                        <td>{{ strtoupper($r->unit_k) }}</td>
                        <td>{{ strtoupper($r->satuan) }}</td>

                    </tr>
                @endforeach
                </tfoot>
        </table>


        {{-- Riwayat Golongan --}}
        <p style="font-size: 10pt">Riwayat Golongan:</p>
        <table id="" class="table table-bordered table-striped table-sm" style="font-size: 10pt">
            <thead>

                <tr>
                    <th style="text-align: center;vertical-align:middle">Golongan</th>
                    <th style="text-align: center;vertical-align:middle">TMT Golongan</th>
                    <th style="text-align: center;vertical-align:middle">Tanggal Pelantikan</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($riwgol as $rw)
                    <tr>
                        <td>{{ $rw->master_gol->gol }}</td>
                        <td>{{ $rw->tmt->format('d-m-Y') }}</td>
                        <td>{{ $rw->tgl->format('d-m-Y') }}</td>

                    </tr>
                @endforeach
                </tfoot>
        </table>


        {{-- gaji berkala --}}
        <p style="font-size: 10pt">Riwayat Gaji Berkala:</p>

        <table id="" class="table table-bordered table-striped table-sm" style="font-size: 10pt">
            <thead>

                <tr>
                    <th style="text-align: center;vertical-align:middle">Tanggal Gaji Baru</th>
                    <th style="text-align: center;vertical-align:middle">Masa Kerja</th>
                    <th style="text-align: center;vertical-align:middle">Golongan</th>
                    <th style="text-align: center;vertical-align:middle">Kenaikan Gaji Berikutnya</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($gajiber as $gaber)
                    <tr>
                        <td>{{ $gaber->tgl_berlaku_B->format('d-m-Y') }}</td>
                        <td>{{ $gaber->masa_kerja_tahun_B }}&nbsp; Tahun &nbsp; {{ $gaber->masa_kerja_bulan_B }} Bulan</td>
                        <td>{{ $gaber->golongan->gol }}</td>
                        <td>{{ $gaber->tgl_berlaku_S->format('d-m-Y') }}</td>

                    </tr>
                @endforeach
                </tfoot>
        </table>


        {{-- Data PNS --}}
        <p style="font-size: 10pt">Data PNS Pegawai:</p>
        <table id="" class="table table-bordered table-striped table-sm" style="font-size: 10pt">
            <thead>

                <tr>
                    <th style="text-align: center;vertical-align:middle">NO SK CAPEG</th>
                    <th style="text-align: center;vertical-align:middle">TMT CAPEK</th>
                    <th style="text-align: center;vertical-align:middle">NO SKUMPTK</th>
                    <th style="text-align: center;vertical-align:middle">TMT SKUMPTK</th>
                    <th style="text-align: center;vertical-align:middle">NO SK PNS</th>
                    <th style="text-align: center;vertical-align:middle">TMT PNS</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($pns as $pn)
                    <tr>
                        <td>{{ $pn->no_capeg }}</td>
                        <td>{{ $pn->tmt_capeg->format('d-m-Y') }}</td>
                        <td>{{ $pn->no_skumptk }}</td>
                        <td>{{ $pn->tmt_skumptk->format('d-m-Y') }}</td>
                        <td>{{ $pn->no_pns }}</td>
                        <td>{{ $pn->tmt_pns->format('d-m-Y') }}</td>


                    </tr>

                @endforeach
            </tbody>
            </tfoot>
        </table>


        <script type="text/javascript">
            window.addEventListener("load", window.print());
            // window.print()

        </script>




    </body>

    </html>
