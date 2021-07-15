@extends('layouts.master')
@section('content')

    {{-- <div class="row"> --}}
    <div class="card">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title"><b> ENTRY DATA PEGAWAI PNS</b></h3>
                </div>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            {{-- <div class="row"> --}}
            <form class="form-horizontal" action="/pns/simpanpribadi" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="class card-body">
                                {{-- nip --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">NIP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="NIP" name="nip" required>
                                    </div>
                                </div>

                                {{-- NIP lama --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">NIP Lama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nip_lama" placeholder="NIP LAMA">
                                    </div>
                                </div>

                                {{-- nama --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama" class="form-control" placeholder="NAMA" required>
                                    </div>
                                </div>

                                {{-- NIK --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">NIK</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nik" class="form-control" placeholder="Nomor KTP">
                                    </div>
                                </div>

                                {{-- tempat lahir --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="tempat_L" class="form-control" required placeholder="Tempat Lahir">
                                    </div>
                                </div>

                                {{-- tgl lahir --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Tanggal Lahir</label>
                                    <DIV class="col-sm-9">
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl_L" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i>
                                                </div>
                                            </div>
                                        </DIV>
                                    </div>
                                </div>

                                {{-- jenis kelamin --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Jenis kelamin</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2bs4" style="width: 100%;" name="jk">
                                            <option selected="selected" value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- pilih status --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2bs4" style="width: 100%;" name="status" required>
                                            <option selected="selected" value="bujang">BUJANG</option>
                                            <option value="gadis">GADIS</option>
                                            <option value="menikah">MENIKAH</option>
                                            <option value="duda">DUDA</option>
                                            <option value="janda">JANDA</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- alamat --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="5" placeholder="Alamat" name="alamat"></textarea>
                                    </div>
                                </div>

                                {{-- no HP --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Nomor Handphone</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask="'mask': ['9999-9999-9999', '+099 999 999 9999']" data-mask name="hp">
                                        </div>
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                {{-- pilih agama --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Agama</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2bs4" style="width: 100%;" name="agama" required>
                                            <option selected="selected" value="islam">ISLAM</option>
                                            <option value="kristen">KRISTEN</option>
                                            <option value="hindu">HINDU</option>
                                            <option value="budha">BUDHA</option>
                                            <option value="kepercayaan">KEPERCAYAAN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="class card-body">

                                {{-- KK --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">KK</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="kk" class="form-control" placeholder="Nomor KK">
                                    </div>
                                </div>

                                {{-- email --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" placeholder="email" name="email">
                                    </div>
                                </div>

                                {{-- NPWP, tolong tambahkan masked untuk mempercantik
                                    tampilan --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">NPWP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="NPWP" name="npwp">
                                    </div>
                                </div>

                                {{-- karpeg --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Kartu Pegawai</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="karpeg" name="karpeg">
                                    </div>
                                </div>

                                {{-- pilih eselon --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Eselon</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2bs4" style="width: 100%;" name="eselon">
                                            <option selected="selected" value="">-- PILIH ESELON --</option>

                                            @foreach ($jab as $id => $eselon)
                                                <option value="{{ $id }}">{{ $eselon }}
                                                </option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                {{-- jabatan --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jab" class="form-control" required placeholder="Jabatan">
                                    </div>
                                </div>

                                {{-- select golongan --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Golongan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control select2bs4" style="width: 100%;" name="golongan">
                                            <option selected="selected" value="">-- PILIH GOLONGAN --</option>

                                            @foreach ($gol1 as $id => $gol2)
                                                <option value="{{ $id }}">{{ $gol2 }}
                                                </option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                {{-- gapok --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Gaji Pokok</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="rupiah1" class="form-control" placeholder="gapok" name="gapok">
                                    </div>
                                </div>

                                {{-- BPJS --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">No.BPJS</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="BPJS" name="BPJS">
                                    </div>

                                </div>

                                {{-- Masa Kerja --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Masa Kerja</label>
                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <input type="text" placeholder="Tahun" name="masa_kerja_t" style="width: 20px" class="form-control col-3"> &nbsp; <span><label for="tahun" style="text-align: center">-</label></span>&nbsp;&nbsp;
                                            <input type="text" placeholder="Bulan" name="masa_kerja_b" style="width: 20px" class="form-control col-3">
                                        </div>
                                    </div>
                                </div>

                                {{-- Asal Instansi --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Asal Instansi</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="asal_ins" class="form-control" placeholder="Asal Instansi">
                                    </div>
                                </div>

                                {{-- upload foto --}}
                                <div class="form-group row">
                                    <label class="col-sm col-form-label">Upload Foto</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control" name="foto">
                                        {{-- <div class="custom-file">

                                            </div> --}}
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                        <label class="col-sm-4 col-form-label">Nomor Handphone</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" data-inputmask="'mask': ['9999-9999-9999', '+099 999 999 9999']" data-mask>
                                            </div>
                                        </div>
                                        <!-- /.input group -->
                                    </div> --}}
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
            {{-- </div> --}}
        </div>
    </div>
    {{-- </div> --}}







@endsection
