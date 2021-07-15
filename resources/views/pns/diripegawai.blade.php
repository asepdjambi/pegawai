@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Data Pegawai Dinas Perhubungan</h3>
                </div>
                {{-- <div class="col-sm-4">
                    <a href="/pns/entrypegawai" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> Tambah
                            Pegawai</i></a>
                </div> --}}
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <form class="form-horizontal" action="/pns/simpankeluarga" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="col-sm col-form-label">Nama Pegawai</label>
                            <div class="col-sm">
                                <select class="form-control select2bs4" style="width: 100%;" name="peg_id" id="peg_id">
                                    <option selected="selected" value="">-- PILIH NAMA --
                                    </option>

                                    {{-- dropdown langsung dari database
                                    --}}
                                    @foreach ($pegawai as $pega)
                                        <option value="{{ $pega->id }}">{{ $pega->Nama }} | {{ $pega->NIP }}
                                        </option>

                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                </div>

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
                                        <input type="text" class="form-control datetimepicker-input"
                                            data-target="#reservationdate2" name="tgl_L" />
                                        <div class="input-group-append" data-target="#reservationdate2"
                                            data-toggle="datetimepicker">
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
                                        <option value="anak_k">Anak Kandung</option>
                                        <option value="anak_t">Anak Tiri</option>
                                        <option value="anak_a">Anak Angkat</option>
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

                            {{-- <div class="form-group">
                                <label class="col-sm-4 col-form-label">Nomor Handphone</label>
                                <div class="col-sm-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control"
                                            data-inputmask="'mask': ['9999-9999-9999', '+099 999 999 9999']" data-mask>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div> --}}
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    {{-- <button type="submit"
                        class="btn btn-default float-right">Cancel</button> --}}
                </div>
                <!-- /.card-footer -->


            </form>

            {{-- tabel keluarga --}}
            <table id="example1" class="table table-bordered table-striped">
                <thead>

                    <tr>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Status</th>
                        <th>Pekerjaan</th>
                        <th>Hubungan Keluarga</th>
                        <th>Tanggungan</th>
                        {{-- <th>Aksi</th> --}}
                    </tr>
                </thead>
                <tbody id="keluarga">

                    {{-- @foreach ($keluarga as $k)
                        <tr>
                            <td>{{ $k->nama }}</td>
                            <td>{{ $k->tgl_l->format('d-m-Y') }}</td>
                            <td>{{ $k->status }}</td>
                            <td>{{ strtoupper($k->pekerjaan) }}</td>
                            <td> {{ $k->hub }}</td>
                            <td>{{ $k->dt }}</td> --}}
                            {{-- <td>
                                <a href="#" class="btn btn-secondary btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                            </td> --}}
                            {{--
                        </tr>
                    @endforeach --}}
                    </tfoot>
            </table>


        </div>
    </div>


    <!-- /.card-body -->






@endsection
