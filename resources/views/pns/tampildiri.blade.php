@extends('layouts.master')
@section('content')

    <div class="row mt-2">
        <div class="card col-10">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h3 class="card-title"><b> PEGAWAI DINAS PERHUBUNGAN KABUPATEN BATANG HARI</b></h3>
                    </div>
                    {{-- <div class="col-sm-4">
                        <a href="/pns/entrypegawai" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> Tambah
                                Pegawai</i></a>
                    </div> --}}
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col-6">
                        <table>
                            <tr>
                                <td style="width: 30px">NAMA </td>
                                <td>:</td>
                                <td>{{ $pegawai->Nama }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">NIP </td>
                                <td>:</td>
                                <td>{{ $pegawai->NIP }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-6">
                        <table>
                            <tr>
                                <td style="width: 30px">Jabatan </td>
                                <td>:</td>
                                <td>{{ $pegawai->jab }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30px">Golongan </td>
                                <td>:</td>
                                <td>{{ $pegawai->golongan->gol }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer float-right text-sm">

                <a href="/cetakpdf/{{ $pegawai->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Export PDF" target="_blank"><i class="fa fa-file-pdf" aria-hidden="true"> Export
                        PDF</i></a>
                <a href="/cetakdiri/{{ $pegawai->id }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Cetak Data Pegawai" target="_blank"><i class=" fa fa-print" aria-hidden="true">&nbsp;
                        CETAK</i></a>
                <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Kembali" onclick="goBack()" style="color: white"><i class="fa fa-reply" aria-hidden="true"> Kembali</i></a>

            </div>
        </div>
        <div class="card col-2">
            <!-- /.card-header -->
            <div class="card-body center">
                <div>
                    <img src="{{ url('/arsip/foto/' . $pegawai->foto) }}" alt="" style="float: center;width:130px;heigth:150px">
                </div>
            </div>
        </div>
    </div>

    {{-- tabel keluarga --}}
    <div class="card text-sm">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Data Keluarga:</h3>
                </div>
                <div class="col-sm-4">
                    <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-lg-kel"><i class="fa fa-plus"> Keluarga</i></a>
                </div>
            </div>
        </div>

        {{-- data keluarga --}}
        <div class="card-body">
            <table id="" class="table table-bordered table-striped table-sm">
                <thead>

                    <tr style="text-align: center">
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Status</th>
                        <th>Pekerjaan</th>
                        <th>Hubungan Keluarga</th>
                        <th>Tanggungan</th>
                        <th style="width:135px">Aksi</th>
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
                            <td>
                                <a href="/editkel/{{ $pegawai->id }}/{{ $k->id }}" class="btn btn-secondary btn-sm">Edit</a>
                                {{-- <a href="#" class="btn btn-secondary btn-sm">Edit</a>
                                --}}

                                {{-- /hapuskel/{{ $pegawai->id }}/{{ $k->id }}
                                --}}
                                <a href="/hapuskel/{{ $k->id }}" class="btn btn-danger btn-sm delete-confirm">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
            </table>
        </div>
    </div>

    {{-- data pendidikan --}}
    <div class="card text-sm">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Data pendidikan:</h3>
                </div>
                <div class="col-sm-4">
                    <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-lg-pend"><i class="fa fa-plus">
                            Pendidikan</i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped table-sm">
                <thead>

                    <tr style="text-align: center">
                        <th style="width:20px">Tingkat</th>
                        <th>Nama Sekolah</th>
                        <th>Jurusan</th>
                        <th style="width:20px">Tahun Lulus</th>
                        <th>Nomor Ijazah</th>
                        <th style="width:20px">Gelar</th>
                        <th style="width:20px">Arsip</th>
                        <th style="width:135px">Aksi</th>
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
                            <td>
                                @if ($pend->ijazah == '')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tidak Ada Arsip"><i class="fa fa-times" aria-hidden="true"></i></button>
                                @else
                                    <a href="{{ url('arsip/ijazah/' . $pend->ijazah) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                @endif
                            </td>
                            <td style="width: 125px">
                                <a href="/editpend/{{ $pegawai->id }}/{{ $pend->id }}" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="/hapuspend/{{ $pend->id }}" class="btn btn-danger btn-sm delete-confirm">Hapus</a>
                            </td>

                        </tr>
                    @endforeach
                    </tfoot>
            </table>


        </div>
    </div>

    {{-- diklat Struktural --}}
    <div class="card text-sm">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Data Diklat Struktural:</h3>
                </div>
                <div class="col-sm-4">
                    <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-lg-struk"><i class="fa fa-plus">
                            Diklat</i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped table-sm">
                <thead>

                    <tr style="text-align: center">
                        <th>Nama</th>
                        <th>Nomor STTPL</th>
                        <th>Jumlah Jam</th>
                        <th style="width:30px">Tanggal Mulai</th>
                        <th style="width:30px">Tanggal Selesai</th>
                        <th>Arsip</th>
                        <th style="width:130px">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($struktural as $st)
                        <tr>
                            <td>{{ strtoupper($st->nama) }}</td>
                            <td style="width: 170px">{{ $st->no_sttpl }}</td>
                            <td style="width: 130px">
                                @if ($st->tgl_m != '')
                                    {{ $st->tgl_m->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td style="width: 130px">
                                @if ($st->tgl_s != '')
                                    {{ $st->tgl_s->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td style="text-align: center; width:50px">
                                @if ($st->arsip == '')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tidak Ada Arsip"><i class="fa fa-times" aria-hidden="true"></i></button>
                                @else
                                    <a href="{{ url('arsip/struktural/' . $st->arsip) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                @endif

                            </td>
                            <td style="width: 125px">
                                <a href="/editstr/{{ $pegawai->id }}/{{ $st->id }}" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="/hapusstr/{{ $st->id }}" class="btn btn-danger btn-sm delete-confirm">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
            </table>
        </div>
    </div>

    {{-- diklat Teknis --}}
    <div class="card text-sm">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Data Diklat Teknis:</h3>
                </div>
                <div class="col-sm-4">
                    <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-lg-teknis"><i class="fa fa-plus"> Diklat</i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped table-sm">
                <thead>

                    <tr>
                        <th>Nama Diklat</th>
                        <th>Jumlah Jam</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Nomor Sertifikat</th>
                        <th>Penyelenggara</th>
                        <th>Arsip</th>
                        <th style="width:130px">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($teknis as $tek)
                        <tr>
                            <td>{{ strtoupper($tek->nama_t) }}</td>
                            <td>{{ $tek->lama }}</td>
                            <td>
                                @if ($tek->tgl_m != '')
                                    {{ $tek->tgl_m->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($tek->tgl_s != '')
                                    {{ $tek->tgl_s->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $tek->no_sertifikat }}</td>
                            <td>{{ strtoupper($tek->penyelenggara) }}</td>
                            <td style="text-align: center; width:50px">
                                @if ($tek->arsip == '')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tidak Ada Arsip"><i class="fa fa-times" aria-hidden="true"></i></button>

                                @else
                                    <a href="{{ url('arsip/teknis/' . $tek->arsip) }}" class="btn btn-primary btn-sm" target="_blank">Arsip</a>
                                @endif
                            </td>
                            <td style="width: 125px">
                                <a href="/edittek/{{ $pegawai->id }}/{{ $tek->id }}" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="/hapustek/{{ $tek->id }}" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
            </table>
        </div>
    </div>

    {{-- Riwayat Jabatan --}}
    <div class="card text-sm">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Riwayat Jabatan:</h3>
                </div>
                <div class="col-sm-4">
                    <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-lg-riwjab"><i class="fa fa-plus"> Riwayat</i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped table-sm">
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
                        <th>Arsip</th>
                        <th style="width:135px">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($riwjab as $r)
                        <tr>
                            <td>{{ $r->jabatan }}</td>
                            <td>{{ $r->jabeselon->eselon }}</td>
                            <td>
                                @if ($r->tmt != '')
                                    {{ $r->tmt->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($r->tgl_sk != '')
                                    {{ $r->tgl_sk->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($r->tmt_lantik != '')
                                    {{ $r->tmt_lantik->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $r->no_sk }}</td>
                            <td>{{ strtoupper($r->unit_k) }}</td>
                            <td>{{ strtoupper($r->satuan) }}</td>
                            <td>
                                @if ($r->arsip == '')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tidak Ada Arsip"><i class="fa fa-times" aria-hidden="true"></i></button>

                                @else
                                    <a href="{{ url('arsip/jabatan/' . $r->arsip) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                @endif
                            </td>
                            <td style="width: 125px">
                                <a href="/editriwjab/{{ $r->id }}" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="/hapusriwjab/{{ $r->id }}" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
            </table>
        </div>
    </div>

    {{-- Riwayat Golongan --}}
    <div class="card text-sm">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Riwayat Golongan:</h3>
                </div>
                <div class="col-sm-4">
                    <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modal-lg-riwgol"><i class="fa fa-plus"> Riwayat</i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped table-sm">
                <thead>

                    <tr>
                        <th>Golongan</th>
                        <th>TMT Golongan</th>
                        <th>Tanggal Pelantikan</th>
                        <th>Arsip</th>
                        <th style="width:135px">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($riwgol as $rw)
                        <tr>
                            <td>{{ $rw->master_gol->gol }}</td>
                            <td>
                                @if ($rw->tmt != '')
                                    {{ $rw->tmt->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($rw->tgl != '')
                                    {{ $rw->tgl->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($rw->arsip == '')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tidak Ada Arsip"><i class="fa fa-times" aria-hidden="true"></i></button>

                                @else
                                    <a href="{{ url('arsip/golongan/' . $rw->arsip) }}" class="btn btn-primary btn-sm" target="_blank">ViewView</a>
                                @endif
                            </td>
                            <td style="width: 125px">
                                <a href="/editriwgol/{{ $rw->id }}" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="/hapusriwgol/{{ $rw->id }}" class="btn btn-danger btn-sm">Hapus</a>
                            </td>

                        </tr>
                    @endforeach
                    </tfoot>
            </table>
        </div>
    </div>

    {{-- gaji berkala --}}
    <div class="card text-sm">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Riwayat Gaji Berkala:</h3>
                </div>
                <div class="col-sm-4">
                    <a href="/entrygajiberkala/{{ $pegawai->id }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> Riwayat</i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped table-sm">
                <thead>

                    <tr>
                        <th>Tanggal Gaji Baru</th>
                        <th>Masa Kerja</th>
                        <th>Golongan</th>
                        <th>Kenaikan Gaji Berikutnya</th>
                        <th>Arsip</th>
                        <th style="width:135px">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($gajiber as $gaber)
                        <tr>
                            <td>{{ $gaber->tgl_berlaku_B->format('d-m-Y') }}</td>
                            <td>{{ $gaber->masa_kerja_tahun_B }}&nbsp; Tahun &nbsp; {{ $gaber->masa_kerja_bulan_B }} Bulan</td>
                            <td>{{ $gaber->golongan->gol }}</td>
                            <td>{{ $gaber->tgl_berlaku_S->format('d-m-Y') }}</td>
                            <td>
                                @if ($gaber->arsip == '')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tidak Ada Arsip"><i class="fa fa-times" aria-hidden="true"></i></button>

                                @else
                                    <a href="{{ url('arsip/gaji_berkala/' . $gaber->arsip) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                @endif
                            </td>
                            <td>
                                <a href="/editgajiberkala/{{ $gaber->id }}" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>

                        </tr>
                    @endforeach
                    </tfoot>
            </table>
        </div>
    </div>

    {{-- Data PNS --}}
    <div class="card text-sm">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Data PNS Pegawai:</h3>
                </div>
                <div class="col-sm-4">
                    <a href="/entrypns/{{ $pegawai->id }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> Data</i></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered table-striped table-sm">
                <thead>

                    <tr>
                        <th>NO SK CAPEG</th>
                        <th>TMT CAPEG</th>
                        <th>Gol CAPEG</th>
                        <th>Arsip</th>
                        <th>NO SPMT</th>
                        <th>TMT SPMT</th>
                        <th>Arsip</th>
                        <th>NO SK PNS</th>
                        <th>TMT PNS</th>
                        <th>Arsip</th>
                        <th style="width:135px">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($pns as $pn)
                        <tr>
                            <td>{{ $pn->no_capeg }}</td>
                            <td>
                                @if ($pn->tmt_capeg != '')
                                    {{ $pn->tmt_capeg->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $pn->golongan->gol }}</td>
                            <td>
                                @if ($pn->scan_capeg == '')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tidak Ada Arsip"><i class="fa fa-times" aria-hidden="true"></i></button>

                                @else
                                    <a href="{{ url('arsip/gaji_berkala/' . $pn->scan_capeg) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                @endif
                            </td>
                            <td>{{ $pn->no_skumptk }}</td>
                            <td>
                                @if ($pn->tmt_skumptk != '')
                                    {{ $pn->tmt_skumptk->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($pn->scan_skumptk == '')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tidak Ada Arsip"><i class="fa fa-times" aria-hidden="true"></i></button>

                                @else
                                    <a href="{{ url('arsip/gaji_berkala/' . $pn->scan_skumptk) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                @endif
                            </td>
                            <td>{{ $pn->no_pns }}</td>
                            <td>
                                @if ($pn->tmt_pns != '')
                                    {{ $pn->tmt_pns->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if ($pn->scan_pns == '')
                                    <button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Tidak Ada Arsip"><i class="fa fa-times" aria-hidden="true"></i></button>

                                @else
                                    <a href="{{ url('arsip/gaji_berkala/' . $pn->scan_pns) }}" class="btn btn-primary btn-sm" target="_blank">View</a>
                                @endif
                            </td>
                            <td>
                                <a href="#" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td>

                        </tr>

                    @endforeach
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- modal entry Keluarga --}}
    <div class="modal fade text-sm" id="modal-lg-kel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Keluarga</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/pns/simpankeluarga/{{ $pegawai->id }}" method="POST">
                        {{ csrf_field() }}

                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    {{-- nama --}}
                                    <div class="form-group">
                                        <label class="col-sm-2 col-form-label">NAMA</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control">
                                        </div>
                                    </div>
                                    {{-- tgl lahir --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Tanggal Lahir</label>
                                        <DIV class="col-sm-10">
                                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="tgl_L" />
                                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>
                                    {{-- Status --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2bs4" style="width: 100%;" name="status">
                                                <option selected="selected" value="kawin">Kawin</option>
                                                <option value="belum kawin">Belum Kawin</option>
                                                <option value="duda">Duda</option>
                                                <option value="janda">Janda</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-6">
                                    {{-- Pekerjaan --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Pekerjaan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2bs4" style="width: 100%;" name="pekerjaan">
                                                <option selected="selected" value="pns">PNS</option>
                                                <option value="polisi">Polisi</option>
                                                <option value="tentara">Tentara</option>
                                                <option value="swasta">Swasta</option>
                                                <option value="wirausaha">wirausaha</option>
                                                <option value="IRT">IRT</option>
                                                <option value="pelajar">Pelajar</option>
                                                <option value="mahasiswa">Mahasiswa</option>
                                                <option value="honorer">Honorer</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- HUbungan Keluarga
                                    --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Hubungan Keluarga</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2bs4" style="width: 100%;" name="hub">
                                                <option selected="selected" value="suami">Suami</option>
                                                <option value="istri">Istri</option>
                                                <option value="AK">Anak Kandung</option>
                                                <option value="AT">Anak Tiri</option>
                                                <option value="AA">Anak Angkat</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- Tanggungan --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Tanggungan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2bs4" style="width: 100%;" name="dt">
                                                <option selected="selected" value="DT">DT</option>
                                                <option value="TT">TT</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                        <!-- /.card-footer -->

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal entry Pendidikan --}}
    <div class="modal fade text-sm" id="modal-lg-pend">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Pendidikan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" action="/pns/simpanpendidikan/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    {{-- jenjang --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">JENJANG PENDIDIKAN</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2bs4" style="width: 100%;" name="tingkat">
                                                <option selected="selected" value="SD">SD</option>
                                                <option value="SMP/MTs">SMP/MTs</option>
                                                <option value="SMA/MA/SMK">SMA/MA/SMK</option>
                                                <option value="DI">DI</option>
                                                <option value="DII">DII</option>
                                                <option value="DIII">DIII</option>
                                                <option value="DIV">DIV</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- nama --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NAMA SEKOLAH</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" style="text-transform: uppercase">
                                        </div>
                                    </div>
                                    {{-- jurusan --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">JURUSAN</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="jurusan" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-6">
                                    {{-- tahun kelulusan --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TAHUN KELULUSAN</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tahun" class="form-control">
                                        </div>
                                    </div>
                                    {{-- nomor ijazah --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NOMOR IJAZAH</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="no_ijazah" class="form-control">
                                        </div>
                                    </div>
                                    {{-- Gelar Pendidikan --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">GELAR PENDIDIKAN</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="gelar" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm col-form-label">UPLOAD IJAZAH</label>
                                <div class="col-sm">
                                    <input type="file" class="form-control" name="up_ijazah">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal entry Struktural --}}
    <div class="modal fade text-sm" id="modal-lg-struk">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Diklat Struktural</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" action="/pns/simpanstruktural/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    {{-- nama --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NAMA DIKLAT</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" style="text-transform: uppercase">
                                        </div>
                                    </div>
                                    {{-- NO STTPL --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NO STTPL</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="no_sttpl" class="form-control">
                                        </div>
                                        <label class="col-sm col-form-label">Jumlah Jam</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="lama" class="form-control">
                                        </div>
                                    </div>

                                    {{-- penyelnggara --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">PENYELENGGARA</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="penyelenggara" class="form-control" style="text-transform: uppercase">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    {{-- tgl mulai --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Tanggal Mulai</label>
                                        <DIV class="col-sm-10">
                                            <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate4" name="tgl_m" />
                                                <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- tgl selesai --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Tanggal Selesai</label>
                                        <DIV class="col-sm-10">
                                            <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate5" name="tgl_s" />
                                                <div class="input-group-append" data-target="#reservationdate5" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- upload sertifikat --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Upload Sertifikat</label>
                                        <div class="col-sm">
                                            <input type="file" class="form-control" name="diklat_s">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal entry teknis --}}
    <div class="modal fade text-sm" id="modal-lg-teknis">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Diklat Teknis</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" action="/pns/simpanteknis/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    {{-- nama --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NAMA DIKLAT</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" style="text-transform: uppercase">
                                        </div>
                                    </div>

                                    {{-- lama diklat --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">LAMA DIKLAT</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="lama" class="form-control">
                                        </div>
                                    </div>

                                    {{-- no STTPL --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NO SERTIFIKAT</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="no_sttpl" class="form-control">
                                        </div>
                                    </div>

                                    {{-- penyelnggara --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">PENYELENGGARA</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="penyelenggara" class="form-control" style="text-transform: uppercase">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    {{-- tgl mulai --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Tanggal Mulai</label>
                                        <DIV class="col-sm-10">
                                            <div class="input-group date" id="reservationdate6" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate6" name="tgl_m" />
                                                <div class="input-group-append" data-target="#reservationdate6" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- tgl selesai --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Tanggal Selesai</label>
                                        <DIV class="col-sm-10">
                                            <div class="input-group date" id="reservationdate7" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate7" name="tgl_s" />
                                                <div class="input-group-append" data-target="#reservationdate7" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- upload sertifikat --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Upload Sertifikat</label>
                                        <div class="col-sm">
                                            <input type="file" class="form-control" name="diklat_s">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal entry Riwayat Jabatan --}}
    <div class="modal fade text-sm" id="modal-lg-riwjab">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Riwayat Jabatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" action="/simpanriwjab/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    {{-- nama --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">JABATAN</label>
                                        <div class="col-sm">
                                            <input type="text" name="jabatan" class="form-control" style="text-transform: uppercase">
                                        </div>
                                    </div>

                                    {{-- Eselon --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">ESELON</label>
                                        <div class="col-sm">
                                            <select class="form-control select2bs4" style="width: 100%;" name="eselon">
                                                <option selected="selected" value="">-- PILIH ESELON --</option>

                                                @foreach ($jab as $j)
                                                    <option value="{{ $j->id }}">{{ $j->eselon }}
                                                    </option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    {{-- TMT --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TMT JABATAN</label>
                                        <DIV class="col-sm">
                                            <div class="input-group date" id="reservationdate8" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate8" name="tmt" />
                                                <div class="input-group-append" data-target="#reservationdate8" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- Tanggal SK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TANGGAL SK</label>
                                        <DIV class="col-sm">
                                            <div class="input-group date" id="reservationdate9" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate9" name="tgl_sk" />
                                                <div class="input-group-append" data-target="#reservationdate9" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{-- TMT LANTIK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TMT LANTIK</label>
                                        <DIV class="col-sm">
                                            <div class="input-group date" id="reservationdate10" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate10" name="tmt_lantik" />
                                                <div class="input-group-append" data-target="#reservationdate10" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- NO SK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NOMOR SK</label>
                                        <div class="col-sm">
                                            <input type="text" name="no_sk" class="form-control">
                                        </div>
                                    </div>

                                    {{-- UNIT KERJA --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">UNIT KERJA</label>
                                        <div class="col-sm">
                                            <input type="text" name="unit_k" class="form-control" style="text-transform: uppercase">
                                        </div>
                                    </div>

                                    {{-- SATUAN KERJA --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">SATUAN KERJA</label>
                                        <div class="col-sm">
                                            <input type="text" name="satuan" class="form-control" style="text-transform: uppercase">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- upload SK
                            --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">Upload SK</label>
                                <div class="col-sm">
                                    <input type="file" class="form-control" name="arsip">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal entry Riwayat Golongan --}}
    <div class="modal fade text-sm" id="modal-lg-riwgol">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Riwayat Golongan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" action="/simpanriwgol/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">

                                    {{-- NO SK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NOMOR SK</label>
                                        <div class="col-sm">
                                            <input type="text" name="no_sk" class="form-control">
                                        </div>
                                    </div>
                                    {{-- Golongan --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">GOLONGAN</label>
                                        <div class="col-sm">
                                            <select class="form-control select2bs4" style="width: 100%;" name="eselon">
                                                <option selected="selected" value="">-- PILIH GOLONGAN --</option>

                                                @foreach ($gol as $g)
                                                    <option value="{{ $g->id }}">{{ $g->gol }}
                                                    </option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-6">

                                    {{-- Tanggal SK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TANGGAL SK</label>
                                        <div class="col-sm">
                                            <div class="input-group date" id="reservationdate12" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate12" name="tgl_sk" />
                                                <div class="input-group-append" data-target="#reservationdate12" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- TMT --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TMT GOLONGAN</label>
                                        <DIV class="col-sm">
                                            <div class="input-group date" id="reservationdate11" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate11" name="tmt" />
                                                <div class="input-group-append" data-target="#reservationdate11" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            {{-- upload SK--}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">Upload SK</label>
                                <div class="col-sm">
                                    <input type="file" class="form-control" name="arsip">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal entry Riwayat Jabatan --}}
    <div class="modal fade text-sm" id="modal-lg-riwgaji">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Riwayat Jabatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" action="/simpanriwjab/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    {{-- nama --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">JABATAN</label>
                                        <div class="col-sm">
                                            <input type="text" name="jabatan" class="form-control" style="text-transform: uppercase">
                                        </div>
                                    </div>

                                    {{-- Eselon --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">ESELON</label>
                                        <div class="col-sm">
                                            <select class="form-control select2bs4" style="width: 100%;" name="eselon">
                                                <option selected="selected" value="">-- PILIH ESELON --</option>

                                                @foreach ($jab as $j)
                                                    <option value="{{ $j->id }}">{{ $j->eselon }}
                                                    </option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    {{-- TMT --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TMT JABATAN</label>
                                        <DIV class="col-sm">
                                            <div class="input-group date" id="reservationdate8" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate8" name="tmt" />
                                                <div class="input-group-append" data-target="#reservationdate8" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- Tanggal SK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TANGGAL SK</label>
                                        <DIV class="col-sm">
                                            <div class="input-group date" id="reservationdate9" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate9" name="tgl_sk" />
                                                <div class="input-group-append" data-target="#reservationdate9" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    {{-- TMT LANTIK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TMT LANTIK</label>
                                        <DIV class="col-sm">
                                            <div class="input-group date" id="reservationdate10" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate10" name="tmt_lantik" />
                                                <div class="input-group-append" data-target="#reservationdate10" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- NO SK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NOMOR SK</label>
                                        <div class="col-sm">
                                            <input type="text" name="no_sk" class="form-control">
                                        </div>
                                    </div>

                                    {{-- UNIT KERJA --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">UNIT KERJA</label>
                                        <div class="col-sm">
                                            <input type="text" name="unit_k" class="form-control" style="text-transform: uppercase">
                                        </div>
                                    </div>

                                    {{-- SATUAN KERJA --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">SATUAN KERJA</label>
                                        <div class="col-sm">
                                            <input type="text" name="satuan" class="form-control" style="text-transform: uppercase">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- upload SK
                            --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">Upload SK</label>
                                <div class="col-sm">
                                    <input type="file" class="form-control" name="arsip">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


@endsection
