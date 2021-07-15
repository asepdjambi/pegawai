@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Edit Riwayat Golongan:</h3>
                </div>
            </div>
        </div>

        {{-- data diklat golongan --}}
        <div class="card-body">
            <form class="form-horizontal" action="/simpanriwgol/{{ $riwgol->id }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">

                                {{-- NO SK --}}
                                <div class="form-group">
                                    <label class="col-sm col-form-label">NOMOR SK</label>
                                    <div class="col-sm">
                                        <input type="text" name="no_sk" class="form-control" value="{{ $riwgol->no_sk }}">
                                    </div>
                                </div>
                                {{-- Golongan --}}
                                <div class="form-group">
                                    <label class="col-sm col-form-label">GOLONGAN</label>
                                    <div class="col-sm">
                                        <select class="form-control select2bs4" style="width: 100%;" name="eselon">
                                            {{-- <option selected="selected" value="{{ $riwgol->master_gol_if }}">{{ $riwgol->master_gol->gol }}</option> --}}

                                            @foreach ($gol as $g)
                                                @if ($riwgol->master_gol_id == $g->id)
                                                    @php
                                                    $select="selected";
                                                    @endphp
                                                @else
                                                    @php
                                                    $select="";
                                                    @endphp
                                                @endif
                                                <option {{ $select }} value="{{ $g->id }}">{{ $g->gol }}
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
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate12" name="tgl" value="{{ $riwgol->tgl->format('d-m-Y') }}" />
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
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate11" name="tmt" value="{{ $riwgol->tmt->format('d-m-Y') }}" />
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

                        <table>
                            <tr style="color: rgb(252, 92, 0); font-size:16pt">
                                <th><label class="col-sm col-form-label">Nama File SK:</label></th>
                                <th style="text-align: left">
                                    @if ($riwgol->arsip !== '')
                                        {{-- <a href="{{ url('arsip/ijazah/' . $pendidikan->ijazah) }}" target="_blank"><label class="col-sm col-form-label" style="text-align: left" name="ijazah">{{ $pendidikan->ijazah }}</label></a>
                                        --}}

                                        <label class="col-sm col-form-label" style="text-align: left" name="ijazah">{{ $riwgol->arsip }}</label>
                                    @else
                                        <label class="col-sm col-form-label" style="color: red">Tidak Ada File
                                            Arsip</label>
                                    @endif
                                </th>
                                <th>
                                    @if ($riwgol->arsip !== '')
                                        <a href="{{ url('arsip/jabatan/' . $riwgol->arsip) }}" target="_blank" class="btn btn-primary btn-sm">View</a>
                                    @endif

                                </th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-primary" onclick="goBack()">Kembali</button>
                    <button type="submit" class="btn btn-warning">Update</button>
                </div>
            </form>
        </div>

    </div>










@endsection
