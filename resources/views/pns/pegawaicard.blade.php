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
                        <a href="/pns/pegawai/{{ $jenis }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Tampilan Tabel"><i class="fa fa-bars" aria-hidden="true"></i></a>
                        {{-- <a href="/pns/pegawaicard/" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Tampilan Foto"><i class="fa fa-address-card" aria-hidden="true"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-solid">
        <div class="card-body pb-0">

            <div class="row d-flex align-items-stretch">
                @foreach ($pegawai as $p)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                                {{ $p->jab }}
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{ $p->Nama }}</b></h2>
                                        <p class="text-muted text-sm"><b>NIP: </b> {{ $p->NIP }} </p>
                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: {{ $p->Alamat }}</li>
                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: &nbsp; {{ $p->hp }}</li>
                                        </ul>
                                    </div>
                                    <div class="col-5 text-center">
                                        @if ($p->foto == '')
                                            <img src="{{ url('/arsip/foto/no-photo.png') }}" alt="" class="img-circle img-fluid">
                                        @else

                                            <img src="{{ url('/arsip/foto/' . $p->foto) }}" alt="" class="img-circle img-fluid">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <a href="/pns/{{ $p->id }}/diri" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Preview Pegawai"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Pegawai"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Cetak Data Pegawai"><i class="fa fa-print" aria-hidden="true"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-placement="top" title="Mutasi Pegawai" data-target="#modal-lg-mutasi"><i class="fa fa-times" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

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
            </div>
        </div>
        <div class="card-footer">
            <nav aria-label="Contacts Page Navigation">
                Jumlah Pegawai:{{ $pegawai->total() }}
                <div class="d-flex justify-content-center">

                    {{ $pegawai->links() }}

                </div>
            </nav>
        </div>
    </div>










@endsection
