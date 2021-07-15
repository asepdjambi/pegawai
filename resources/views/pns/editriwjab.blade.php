@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Edit Riwayat Jabatan:</h3>
                </div>
            </div>
        </div>

        {{-- data diklat struktural --}}
        <div class="card-body">
            <form class="form-horizontal" action="/simpaneditriwjab/{{ $riwjab->id }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            {{-- nama --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">JABATAN</label>
                                <div class="col-sm">
                                    <input type="text" name="jabatan" class="form-control" style="text-transform: uppercase" value="{{ $riwjab->jabatan }}">
                                </div>
                            </div>

                            {{-- Eselon --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">ESELON</label>
                                <div class="col-sm">
                                    <select class="form-control select2bs4" style="width: 100%;" name="eselon">
                                        {{-- <option selected="selected" value="{{ $riwjab->master_gol_id }}">{{ $riwjab->jabeselon->eselon }}</option> --}}

                                        @foreach ($jab as $j)
                                            @if ($riwjab->master_gol_id == $j->id)
                                                @php
                                                $select="selected";
                                                @endphp
                                            @else
                                                @php
                                                $select="";
                                                @endphp
                                            @endif
                                            <option {{ $select }} value="{{ $j->id }}">{{ $j->eselon }}
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
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate8" name="tmt" value="{{ $riwjab->tmt->format('d-m-Y') }}" />
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
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate9" name="tgl_sk" value="{{ $riwjab->tgl_sk->format('d-m-Y') }}" />
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
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate10" name="tmt_lantik" value="{{ $riwjab->tmt_lantik->format('d-m-Y') }}" />
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
                                    <input type="text" name="no_sk" class="form-control" value="{{ $riwjab->no_sk }}">
                                </div>
                            </div>

                            {{-- UNIT KERJA --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">UNIT KERJA</label>
                                <div class="col-sm">
                                    <input type="text" name="unit_k" class="form-control" style="text-transform: uppercase" value="{{ $riwjab->unit_k }}">
                                </div>
                            </div>

                            {{-- SATUAN KERJA --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">SATUAN KERJA</label>
                                <div class="col-sm">
                                    <input type="text" name="satuan" class="form-control" style="text-transform: uppercase" value="{{ $riwjab->satuan }}">
                                </div>
                            </div>

                        </div>

                    </div>
                    {{-- upload sertifikat --}}
                    <div class="form-group">
                        <label class="col-sm col-form-label">UPLOAD SK</label>
                        <div class="col-sm">
                            <input type="file" class="form-control" name="diklat_s">
                        </div>
                    </div>
                    <table>
                        <tr style="color: rgb(252, 92, 0); font-size:16pt">
                            <th><label class="col-sm col-form-label">Nama File Sertifikat:</label></th>
                            <th style="text-align: left">
                                @if ($riwjab->arsip !== '')
                                    {{-- <a href="{{ url('arsip/ijazah/' . $pendidikan->ijazah) }}" target="_blank"><label class="col-sm col-form-label" style="text-align: left" name="ijazah">{{ $pendidikan->ijazah }}</label></a>
                                    --}}

                                    <label class="col-sm col-form-label" style="text-align: left" name="ijazah">{{ $riwjab->arsip }}</label>
                                @else
                                    <label class="col-sm col-form-label" style="color: red">Tidak Ada File
                                        Arsip</label>
                                @endif
                            </th>
                            <th>
                                @if ($riwjab->arsip !== '')
                                    <a href="{{ url('arsip/jabatan/' . $riwjab->arsip) }}" target="_blank" class="btn btn-primary btn-sm">View</a>
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















@endsection
