@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header col-12">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="card-title"><b>DATA PEGAWAI PNS {{ $jenis }} DINAS PERHUBUNGAN</b></h3>
                    <div class="float-right">
                        @if ($jenis == 'AKTIF')
                            <a href="/pns/entrypegawai" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Tambah Pegawai"><i class="fa fa-plus"> </i></a>

                        @endif
                        {{-- <a href="#" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Export Excel"><i class="fa fa-file-excel" aria-hidden="true"></i></a> --}}
                        <a href="#" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Export PDF"><i class="fa fa-file-pdf" aria-hidden="true"></i></a>
                        {{-- <a href="/pns/pegawai/{{ $jenis }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Tampilan Tabel"><i class="fa fa-bars" aria-hidden="true"></i></a> --}}
                        <a href="/pns/pegawaicard/{{ $jenis }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Tampilan Foto"><i class="fa fa-address-card" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-sm table-sm">
                <thead>

                    <tr style="text-align: center">
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Golongan</th>
                        <th>Jabatan</th>
                        <th>Eselon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pegawai as $p)
                        <tr>
                            <td style="width: 30px;text-align:center">{{ $no++ }}</td>
                            <td style="width: 150px">{{ $p->NIP }}</td>
                            <td style="width: 250px">{{ $p->Nama }}</td>
                            <td style="width: 50px">
                                {{-- relasi dari pegawai ke master_golongan --}}
                                {{ $p->golongan->gol }}
                            </td>

                            <td style="width: 150px"> {{ $p->jab }}</td>
                            <td style="width: 50px">
                                {{-- relasi dari pegawai ke master_jabatan --}}
                                {{ $p->jabatan->eselon }}

                            </td>
                            <td style="width: 145px; text-align:center">

                                <a href="/pns/{{ $p->id }}/diri" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Preview Pegawai"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                <a href="/editpegawai/{{ $p->id }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Pegawai"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <a href="/cetakdiri/{{ $p->id }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Cetak Data Pegawai" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>
                                {{-- <a href="/pns/hapus/{{ $p->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Pegawai"><i class="fa fa-times" aria-hidden="true"></i></a> --}}
                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-placement="top" title="Mutasi Pegawai" data-target="#modal-lg-mutasi"><i class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>

                        {{-- modal Edit Mutasi Pegawai --}}
                        <div class="modal fade text-sm" id="modal-lg-mutasi">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Mutasi Pegawai</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="form-horizontal" action="/mutasi/{{ $p->id }}" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            {{ csrf_field() }}
                                            <div class="card-body">

                                                {{-- Eselon --}}
                                                <div class="form-group">
                                                    <label class="col-sm col-form-label">MUTASI/MENINGGAL/PENSIUN</label>
                                                    <div class="col-12">
                                                        <select class="form-control select2bs4" style="width: 100%;" name="mutasi">
                                                            <option selected="selected" value="">-- PILIH --</option>

                                                            <option value="mutasi">MUTASI </option>
                                                            <option value="meninggal">MENINGGAL</option>
                                                            <option value="pensiun">PENSIUN</option>

                                                        </select>
                                                    </div>
                                                </div>

                                                {{-- Tanggal --}}
                                                <div class="form-group">
                                                    <label class="col-sm col-form-label">TANGGAL</label>
                                                    <DIV class="col-12">
                                                        <div class="input-group date" id="reservationdate8" data-target-input="nearest">
                                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate8" name="tgl" />
                                                            <div class="input-group-append" data-target="#reservationdate8" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                        </DIV>
                                                    </div>
                                                </div>

                                                {{-- LOKASI/KE --}}
                                                <div class="form-group">
                                                    <label class="col-sm col-form-label">LOKASI</label>
                                                    <div class="col-12">
                                                        <input type="text" name="lokasi" class="form-control">
                                                    </div>
                                                </div>


                                                {{-- upload SK --}}
                                                <div class="form-group">
                                                    <label class="col-sm col-form-label">Upload Data Terkait</label>
                                                    <div class="col-12">
                                                        <input type="file" class="form-control" name="arsip">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>

                    @endforeach
                    </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
