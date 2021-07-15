@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title">Edit Data Keluarga:</h3>
                </div>
            </div>
        </div>

        {{-- data keluarga --}}
        <div class="card-body">
            <form class="form-horizontal" action="/simpaneditkel/{{ $pegawai->id }}/{{ $keluarga->id }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-6">

                    </div>

                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            {{-- nama --}}
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label">NAMA</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" value="{{ $keluarga->nama }}">
                                </div>
                            </div>
                            {{-- tgl lahir --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">Tanggal Lahir</label>
                                <DIV class="col-sm-10">
                                    <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="tgl_L" value="{{ $keluarga->tgl_l->format('d-m-Y') }}" />
                                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
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
                                    <select class="form-control select2bs4" style="width: 100%" name="status">
                                        <option value="kawin" @if ($keluarga->status == 'kawin') selected @endif
                                            >Kawin</option>
                                        <option value="belum kawin" @if ($keluarga->status == 'belum kawin') selected @endif>Belum Kawin</option>
                                        <option value="duda" @if ($keluarga->status == 'duda') selected @endif>Duda</option>
                                        <option value="janda" @if ($keluarga->status == 'janda') selected @endif>Janda</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="col-6">
                            {{-- Pekerjaan --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2bs4" style="width: 100%" name="pekerjaan">
                                        <option value="pns" @if ($keluarga->pekerjaan == 'pns') selected @endif>PNS</option>
                                        <option value="polisi" @if ($keluarga->pekerjaan == 'polisi') selected @endif>Polisi</option>
                                        <option value="tentara" @if ($keluarga->pekerjaan == 'tentara') selected @endif>Tentara</option>
                                        <option value="swasta" @if ($keluarga->pekerjaan == 'swasta') selected @endif>Swasta</option>
                                        <option value="wirausaha" @if ($keluarga->pekerjaan == 'wirausaha') selected @endif>wirausaha</option>
                                        <option value="IRT" @if ($keluarga->pekerjaan == 'IRT') selected @endif>IRT</option>
                                        <option value="pelajar" @if ($keluarga->pekerjaan == 'pelajar') selected @endif>Pelajar</option>
                                        <option value="mahasiswa" @if ($keluarga->pekerjaan == 'mahasiswa') selected @endif>Mahasiswa</option>
                                        <option value="honorer" @if ($keluarga->pekerjaan == 'honorer') selected @endif>Honorer</option>
                                    </select>
                                </div>
                            </div>
                            {{-- HUbungan Keluarga
                            --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">Hubungan Keluarga</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2bs4" style="width: 100%" name="hub">
                                        <option value="suami" @if ($keluarga->hub == 'suami') selected @endif>Suami</option>
                                        <option value="istri" @if ($keluarga->hub == 'istri') selected @endif>Istri</option>
                                        <option value="anak_k" @if ($keluarga->hub == 'AK') selected @endif>Anak Kandung</option>
                                        <option value="anak_t" @if ($keluarga->hub == 'AT') selected @endif>Anak Tiri</option>
                                        <option value="anak_a" @if ($keluarga->hub == 'AA') selected @endif>Anak Angkat</option>

                                    </select>
                                </div>
                            </div>
                            {{-- Tanggungan --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">Tanggungan</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2bs4" style="width: 100%" name="dt">
                                        <option value="DT" @if ($keluarga->dt == 'DT') selected @endif >DT</option>
                                        <option value="TT" @if ($keluarga->dt == 'TT') selected @endif>TT</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info ">Update</button>
                    <button type="button" class="btn btn-warning float-right " onclick="goBack()">Kembali</button>
                </div>
                <!-- /.card-footer -->

            </form>


        </div>
    </div>














@endsection
