@extends('layouts.master')
@section('content')

    {{-- <div class="row"> --}}
        <div class="card">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h3 class="card-title"><b> ENTRY DATA PNS</b></h3>
                    </div>
                    {{-- <div class="col-sm-4">
                        <a href="/pns/entrypegawai" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> Tambah
                                Pegawai</i></a>
                    </div> --}}
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                {{-- <div class="row"> --}}
                    <form class="form-horizontal" action="/simpanpns/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    {{-- no CAPEG --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Nomor SK CAPEG</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="SK CAPEG" name="no_capek">
                                        </div>
                                    </div>

                                    {{-- select golongan --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">GOLONGAN</label>
                                        <div class="col-sm">
                                            <select class="form-control select2bs4" style="width: 100%;" name="golongan">
                                                <option selected="selected" value="">-- PILIH GOLONGAN --</option>

                                                @foreach ($gol1 as $id => $gol2)
                                                    <option value="{{ $id }}">{{ $gol2 }}
                                                    </option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    {{-- tmt capeg --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TMT CAPEG</label>
                                        <DIV class="col-sm">
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tmt_capeg" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- upload CAPEG --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Upload SK CAPEG</label>
                                        <div class="col-sm">
                                            <input type="file" class="form-control" name="scan_capeg">
                                        </div>
                                    </div>

                                    {{-- no SKUMPTK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Nomor SKUMPTK</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="NO SKUMPTK" name="no_skumptk">
                                        </div>
                                    </div>

                                    {{-- tmt SKUMPTK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TMT SKUMPTK</label>
                                        <DIV class="col-sm">
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tmt_skumptk" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- upload SKUMPTK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Upload SK SKUMPTK</label>
                                        <div class="col-sm">
                                            <input type="file" class="form-control" name="scan_skumptk">
                                        </div>
                                    </div>

                                    {{-- no PNS --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Nomor SK PNS</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="NO SK PNS" name="no_pns">
                                        </div>
                                    </div>

                                    {{-- tmt capeg --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">TMT SK PNS</label>
                                        <DIV class="col-sm">
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tmt_pns" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- upload SK PNS --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Upload SK PNS</label>
                                        <div class="col-sm">
                                            <input type="file" class="form-control" name="scan_pns">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Simpan</button>
                                <button class="btn btn-warning float-right" onclick="goBack()">Kembali</button>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                    </form>
                    {{--
                </div> --}}
            </div>
        </div>
        {{--
    </div> --}}







@endsection
