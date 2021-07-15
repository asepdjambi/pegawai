@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Edit Data Pendidikan</h3>
                </div>
            </div>
        </div>

        {{-- data keluarga --}}
        <form class="form-horizontal" action="/simpaneditpend/{{ $pegawai->id }}/{{ $pendidikan->id }}" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-6">
                        {{-- jenjang --}}
                        <div class="form-group">
                            <label class="col-sm col-form-label">Jenjang Pendidikan</label>
                            <div class="col-sm-10">
                                <select class="form-control select2bs4" style="width: 100%;" name="tingkat" disabled>
                                    <option value="SD" @if ($pendidikan->tingkat == 'SD')
                                        selected @endif>SD</option>
                                    <option value="SMP/MTs" @if ($pendidikan->tingkat == 'SMP/MTs')
                                        selected @endif>SMP/MTs</option>
                                    <option value="SMA/MA/SMK" @if ($pendidikan->tingkat == 'SMA/MA/SMK')
                                        selected @endif>SMA/MA/SMK</option>
                                    <option value="DI" @if ($pendidikan->tingkat == 'DI')
                                        selected @endif>DI</option>
                                    <option value="DII" @if ($pendidikan->tingkat == 'DII')
                                        selected @endif>DII</option>
                                    <option value="DIII" @if ($pendidikan->tingkat == 'DIII')
                                        selected @endif>DIII</option>
                                    <option value="DIV" @if ($pendidikan->tingkat == 'DIV')
                                        selected @endif>DIV</option>
                                    <option value="S1" @if ($pendidikan->tingkat == 'S1')
                                        selected @endif>S1</option>
                                    <option value="S2" @if ($pendidikan->tingkat == 'S2')
                                        selected @endif>S2</option>
                                    <option value="S3" @if ($pendidikan->tingkat == 'S3')
                                        selected @endif>S3</option>
                                </select>
                            </div>
                        </div>
                        {{-- nama --}}
                        <div class="form-group">
                            <label class="col-sm col-form-label">NAMA SEKOLAH</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama" class="form-control" value="{{ $pendidikan->nama_s }}" style="text-transform: uppercase">
                            </div>
                        </div>
                        {{-- jurusan --}}
                        <div class="form-group">
                            <label class="col-sm col-form-label">JURUSAN</label>
                            <div class="col-sm-10">
                                <input type="text" name="jurusan" class="form-control" value="{{ $pendidikan->jurusan }}">
                            </div>
                        </div>

                    </div>

                    <div class="col-6">
                        {{-- tahun kelulusan --}}
                        <div class="form-group">
                            <label class="col-sm col-form-label">TAHUN KELULUSAN</label>
                            <div class="col-sm-10">
                                <input type="text" name="tahun" class="form-control" value="{{ $pendidikan->tahun }}">
                            </div>
                        </div>
                        {{-- nomor ijazah --}}
                        <div class="form-group">
                            <label class="col-sm col-form-label">NOMOR IJAZAH</label>
                            <div class="col-sm-10">
                                <input type="text" name="no_ijazah" class="form-control" value="{{ $pendidikan->no_Ijazah }}">
                            </div>
                        </div>
                        {{-- Gelar Pendidikan --}}
                        <div class="form-group">
                            <label class="col-sm col-form-label">GELAR PENDIDIKAN</label>
                            <div class="col-sm-10">
                                <input type="text" name="gelar" class="form-control" value="{{ $pendidikan->gelar }}">
                            </div>
                        </div>
                    </div>
                </div>


                <table>
                    <tr style="color: rgb(252, 92, 0); font-size:16pt">
                        <th><label class="col-sm col-form-label">Nama File Ijazah:</label></th>
                        <th style="text-align: left">
                            @if ($pendidikan->ijazah !== '')
                                {{-- <a href="{{ url('arsip/ijazah/' . $pendidikan->ijazah) }}" target="_blank"><label class="col-sm col-form-label" style="text-align: left" name="ijazah">{{ $pendidikan->ijazah }}</label></a> --}}

                                <label class="col-sm col-form-label" style="text-align: left" name="ijazah">{{ $pendidikan->ijazah }}</label>
                            @else
                                <label class="col-sm col-form-label" style="color: red">Tidak Ada File Ijazah</label>
                            @endif
                        </th>
                        <th>
                            @if ($pendidikan->ijazah !== '')
                                <a href="{{ url('arsip/ijazah/' . $pendidikan->ijazah) }}" target="_blank" class="btn btn-primary btn-sm">View</a>
                            @endif

                        </th>
                    </tr>
                </table>

                <div class="form-group">
                    <label class="col-sm col-form-label">Upload Ulang File Ijazah</label>
                    <div class="col-sm">
                        <input type="file" class="form-control" name="up_ijazah">
                    </div>

                </div>

            </div>

            <!-- /.card-body -->
            <div class="card-footer">
                <button type="button" class="btn btn-info " onclick="goBack()">Kembali</button>
                <button type="submit" class="btn btn-warning float-right">Update</button>
            </div>
            <!-- /.card-footer -->

        </form>


    </div>









@endsection
