@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title"><b> ENTRY DATA KEPALA DINAS</b></h3>
                </div>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            {{-- <div class="row"> --}}
            <form class="form-horizontal" action="/simpankadisbaru" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            {{-- no CAPEG --}}
                            <div class="form-group">
                                <label class="col-sm col-form-label">NAMA KADIS</label>
                                <div class="col-sm">
                                    <select class="form-control select2bs4" style="width: 100%;" name="pegawai_id">
                                        {{-- <option value="{{ $kad->id }}" selected>{{ $kad->pegawai->Nama }} | {{ $kad->pegawai->NIP }} --}}

                                        @foreach ($pegawai as $kad)
                                            <option value="{{ $kad->id }}">{{ $kad->Nama }} | {{ $kad->NIP }}
                                            </option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Simpan</button>
                    <button class="btn btn-warning float-right" onclick="goBack()">Kembali</button>
                </div>
                <!-- /.card-footer -->
            </form>
            {{-- </div> --}}
        </div>
    </div>

@endsection
