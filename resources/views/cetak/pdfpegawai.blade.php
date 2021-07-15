    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CETAK PDF DATA DIRI PEGAWAI</title>

        <link rel="stylesheet" href="admin/assets/dist/css/bootstrap.min.css">

        {{--
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}
    </head>

    <body>


        <h4 style="text-align: center">DATA PEGAWAI PNS DINAS PERHUBUNGAN <br />
            KABUPATEN BATANG HARI </h4>
        <hr>
        <div class="row mb-2" style="font-size: 12pt"><strong>
                <div class="col-5">
                    <table>
                        <tr>
                            <td style="width: 30px">NAMA </td>
                            <td>:</td>
                            <td>{{ $pegawai->Nama }}</td>
                            <td></td>
                            <td></td>
                            <td style="width: 150px"></td>
                            <td style="width: 30px">Jabatan </td>
                            <td>:</td>
                            <td>{{ $pegawai->jab }}</td>
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
            </strong>
            <div class="col-7" style="float: right">
                <img src="arsip/foto/{{ $pegawai->foto }}" alt="" style="float: right;width:80px;heigth:90px">
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

                <tr style="text-align: center">
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Status</th>
                    <th>Pekerjaan</th>
                    <th>Hubungan Keluarga</th>
                    <th>Tanggungan</th>

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
                    <th style="width:20px">Tingkat</th>
                    <th>Nama Sekolah</th>
                    <th>Jurusan</th>
                    <th style="width:20px">Tahun Lulus</th>
                    <th>Nomor Ijazah</th>
                    <th style="width:20px">Gelar</th>

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
                    <th>Nama</th>
                    <th>Nomor STTPL</th>
                    <th style="width:30px">Tanggal Mulai</th>
                    <th style="width:30px">Tanggal Selesai</th>

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
                    <th>Nama Diklat</th>
                    <th>Jumlah Jam</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Nomor Sertifikat</th>
                    <th>Penyelenggara</th>

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
                    <th>Jabatan</th>
                    <th>Eselon</th>
                    <th>TMT Jabatan</th>
                    <th>Tanggal SK</th>
                    <th>TMT Lantik</th>
                    <th>Nomor SK</th>
                    <th>Unit Kerja</th>
                    <th>Satuan Kerja</th>

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
                    <th>Golongan</th>
                    <th>TMT Golongan</th>
                    <th>Tanggal Pelantikan</th>

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
                    <th>Tanggal Gaji Baru</th>
                    <th>Masa Kerja</th>
                    <th>Golongan</th>
                    <th>Kenaikan Gaji Berikutnya</th>
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
                    <th>NO SK CAPEG</th>
                    <th>TMT CAPEK</th>
                    <th>NO SKUMPTK</th>
                    <th>TMT SKUMPTK</th>
                    <th>NO SK PNS</th>
                    <th>TMT PNS</th>
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


    </body>

    </html>
