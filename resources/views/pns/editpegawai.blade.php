@extends('layouts.master')
@section('content')

    {{-- <div class="row"> --}}
        <div class="card">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h3 class="card-title"><b> EDIT DATA PEGAWAI PNS</b></h3>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
                {{-- <div class="row"> --}}
                    <form class="form-horizontal" action="/simpaneditpegawai/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row mt-4">
                                <div class="col-3">
                                    {{-- nip --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NIP</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="NIP" name="nip" value="{{ $pegawai->NIP }}">
                                        </div>
                                    </div>

                                    {{-- tempat lahir --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Tempat Lahir</label>
                                        <div class="col-sm">
                                            <input type="text" name="tempat_L" class="form-control" value="{{ $pegawai->tempat_L }}">
                                        </div>
                                    </div>

                                    {{-- email --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Email</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="email" name="email" value="{{ $pegawai->email }}">
                                        </div>
                                    </div>

                                    {{-- no HP --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Nomor Handphone</label>
                                        <div class="col-sm">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" data-inputmask="'mask': ['9999-9999-9999', '+099 999 999 9999']" data-mask name="hp" value="{{ $pegawai->hp }}">
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    {{-- pilih eselon --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">ESELON</label>
                                        <div class="col-sm">
                                            <select class="form-control select2bs4" style="width: 100%;" name="eselon">
                                                {{-- <option selected="selected" value="{{ $pegawai->master_jabatan_ID }}">{{ $pegawai->jabatan->eselon }}</option> --}}

                                                @foreach ($jab as $id => $eselon)
                                                    <option @if ($pegawai->master_jabatan_id == $id) selected
                                                @endif value="{{ $id }}">{{ $eselon }}
                                                </option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    {{-- BPJS --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">No. BPJS</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="BPJS" name="BPJS" value="{{ $pegawai->BPJS }}">
                                        </div>

                                    </div>

                                </div>

                                <div class="col-3">
                                    {{-- NIP lama--}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NIP Lama</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" name="nip_lama" placeholder="NIP LAMA" value="{{ $pegawai->NIP_lama }}">
                                        </div>
                                    </div>

                                    {{-- KK --}}
                                    <div class="form-group">
                                        <label class="col-sm-2 col-form-label">KK</label>
                                        <div class="col-sm">
                                            <input type="text" name="kk" class="form-control" value="{{ $pegawai->KK }}">
                                        </div>
                                    </div>

                                    {{-- tgl lahir --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Tanggal Lahir</label>
                                        <DIV class="col-sm">
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl_L" value="{{ $pegawai->tgl_L->format('d-m-Y') }}" />
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                    </div>
                                                </div>
                                            </DIV>
                                        </div>
                                    </div>

                                    {{-- NPWP, tolong tambahkan masked untuk mempercantik
                                    tampilan --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NPWP</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="NPWP" name="npwp" value="{{ $pegawai->NPWP }}">
                                        </div>
                                    </div>

                                    {{-- jabatan --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">JABATAN</label>
                                        <div class="col-sm">
                                            <input type="text" name="jab" class="form-control" value="{{ $pegawai->jab }}">
                                        </div>
                                    </div>

                                    {{-- Masa Kerja --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Masa Kerja</label>
                                        <div class="col-sm">
                                            <div class="form-group row">
                                                <input type="text" placeholder="Tahun" name="masa_kerja_t" style="width: 20px" class="form-control col-3" style="width: 20px" value="{{ $pegawai->masa_kerja_t }}"> &nbsp; <span><label for="tahun" style="text-align: center">-</label></span>&nbsp;&nbsp;

                                                <input type="text" placeholder="Bulan" name="masa_kerja_b" style="width: 20px" class="form-control col-3" style="width: 20px" value="{{ $pegawai->masa_kerja_b }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    {{-- nama --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NAMA</label>
                                        <div class="col-sm">
                                            <input type="text" name="nama" class="form-control" placeholder="NAMA" value="{{ $pegawai->Nama }}">
                                        </div>
                                    </div>

                                    {{-- pilih agama --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">AGAMA</label>
                                        <div class="col-sm">
                                            <select class="form-control select2bs4" style="width: 100%;" name="agama">
                                                <option @if ($pegawai->agama == 'islam') selected
                                                    @endif value="islam">ISLAM</option>
                                                <option @if ($pegawai->agama == 'kristen') selected
                                                    @endif value="kristen">KRISTEN</option>
                                                <option @if ($pegawai->agama == 'hindu') selected
                                                    @endif value="hindu">HINDU</option>
                                                <option @if ($pegawai->agama == 'budha') selected
                                                    @endif value="budha">BUDHA</option>
                                                <option @if ($pegawai->agama == 'kepercayaan') selected
                                                    @endif value="kepercayaan">KEPERCAYAAN</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- pilih status --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">STATUS</label>
                                        <div class="col-sm">
                                            <select class="form-control select2bs4" style="width: 100%;" name="status">
                                                <option @if ($pegawai->status == 'bujang') selected
                                                    @endif value="bujang">BUJANG</option>
                                                <option @if ($pegawai->status == 'gadis') selected
                                                    @endif value="gadis">GADIS</option>
                                                <option @if ($pegawai->status == 'menikah') selected
                                                    @endif value="menikah">MENIKAH</option>
                                                <option @if ($pegawai->status == 'duda') selected
                                                    @endif value="duda">DUDA</option>
                                                <option @if ($pegawai->status == 'janda') selected
                                                    @endif value="janda">JANDA</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- karpeg --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">KARTU PEGAWAI</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="karpeg" name="karpeg" value="{{ $pegawai->karpeg }}">
                                        </div>
                                    </div>

                                    {{-- select golongan --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">GOLONGAN</label>
                                        <div class="col-sm">
                                            <select class="form-control select2bs4" style="width: 100%;" name="golongan">
                                                {{-- <option selected="selected" value="{{ $pegawai->master_gol_id }}">{{ $pegawai->golongan->gol }}</option> --}}

                                                @foreach ($gol1 as $id => $gol2)
                                                    <option @if ($pegawai->master_gol_id == $id) selected
                                                @endif value="{{ $id }}">{{ $gol2 }}
                                                </option>

                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    {{-- upload foto --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Upload Foto</label>
                                        <div class="col-sm">
                                            <input type="file" class="form-control" name="foto" value="{{ $pegawai->foto }}">
                                            {{-- <div class="custom-file">

                                            </div> --}}
                                        </div>
                                    </div>

                                </div>

                                <div class="col-3">

                                    {{-- NIK --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NIK</label>
                                        <div class="col-sm">
                                            <input type="text" name="nik" class="form-control" value="{{ $pegawai->NIK }}">
                                        </div>
                                    </div>

                                    {{-- jenis kelamin --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Jenis kelamin</label>
                                        <div class="col-sm">
                                            <select class="form-control select2bs4" style="width: 100%;" name="JK">
                                                <option @if ($pegawai->jk == 'L') selected
                                                    @endif value="L">Laki-laki</option>
                                                <option @if ($pegawai->jk == 'P') selected
                                                    @endif value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- alamat --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Alamat</label>
                                        <div class="col-sm">
                                            <textarea class="form-control" rows="5" placeholder="Alamat" name="alamat">{{ $pegawai->Alamat }}</textarea>
                                        </div>
                                    </div>

                                    {{-- gapok --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">GAJI POKOK</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="gapok" name="gapok" value="{{ number_format($pegawai->gapok, 0, ',', '.') }}">
                                        </div>
                                    </div>

                                    {{-- Asal Instansi --}}
                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Asal Instansi</label>
                                        <div class="col-sm">
                                            <input type="text" name="asal_ins" class="form-control" value="{{ $pegawai->asal_ins }}">
                                        </div>
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

                    </form>
                    {{--
                </div> --}}
            </div>
        </div>
        {{--
    </div> --}}







@endsection
