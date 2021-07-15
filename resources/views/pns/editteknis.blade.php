@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Edit Diklat Teknis:</h3>
                </div>
            </div>
        </div>

        {{-- data diklat teknis --}}
        <div class="card-body">
            <form class="form-horizontal" action="/simpaneditteknis/{{ $pegawai->id }}/{{ $teknis->id }}" method="POST"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            {{-- nama --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">NAMA DIKLAT</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" style="text-transform: uppercase"
                                        value="{{ $teknis->nama_t }}">
                                </div>
                            </div>

                            {{-- lama diklat --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">LAMA DIKLAT</label>
                                <div class="col-sm-10">
                                    <input type="text" name="lama" class="form-control" value="{{ $teknis->lama }}">
                                </div>
                            </div>

                            {{-- nomor STTPL --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">NO SERTIFIKAT</label>
                                <div class="col-sm-10">
                                    <input type="text" name="no_sttpl" class="form-control"
                                        value="{{ $teknis->no_sertifikat }}">
                                </div>
                            </div>

                            {{-- penyelnggara --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">PENYELENGGARA</label>
                                <div class="col-sm-10">
                                    <input type="text" name="penyelenggara" class="form-control"
                                        style="text-transform: uppercase" value="{{ $teknis->penyelenggara }}">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            {{-- tgl mulai --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">Tanggal Mulai</label>
                                <DIV class="col-sm-10">
                                    <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#reservationdate4" name="tgl_m"
                                            value="{{ $teknis->tgl_m->format('d-m-Y') }}" />
                                        <div class="input-group-append" data-target="#reservationdate4"
                                            data-toggle="datetimepicker">
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
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#reservationdate5" name="tgl_s"
                                            value="{{ $teknis->tgl_s->format('d-m-Y') }}" />
                                        <div class="input-group-append" data-target="#reservationdate5"
                                            data-toggle="datetimepicker">
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
                    <table>
                        <tr style="color: rgb(252, 92, 0); font-size:16pt">
                            <th><label class="col-sm col-form-label">Nama File Sertifikat:</label></th>
                            <th style="text-align: left">
                                @if ($teknis->arsip !== '')
                                    {{-- <a
                                        href="{{ url('arsip/ijazah/' . $pendidikan->ijazah) }}" target="_blank"><label
                                            class="col-sm col-form-label" style="text-align: left"
                                            name="ijazah">{{ $pendidikan->ijazah }}</label></a>
                                    --}}

                                    <label class="col-sm col-form-label" style="text-align: left"
                                        name="ijazah">{{ $teknis->arsip }}</label>
                                @else
                                    <label class="col-sm col-form-label" style="color: red">Tidak Ada File
                                        Sertifikat</label>
                                @endif
                            </th>
                            <th>
                                @if ($teknis->arsip !== '')
                                    <a href="{{ url('arsip/struktural/' . $teknis->arsip) }}" target="_blank"
                                        class="btn btn-primary btn-sm">View</a>
                                @endif

                            </th>
                        </tr>
                    </table>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="button" class="btn btn-info " onclick="goBack()">Kembali</button>
                    <button type="submit" class="btn btn-warning float-right">Update</button>
                </div>
                <!-- /.card-footer -->

            </form>
        </div>

    </div>
    </div>














@endsection
