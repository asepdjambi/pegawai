@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h3 class="card-title"><b> EDIT DATA SEKDA</b></h3>
                </div>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            {{-- <div class="row"> --}}
            <form class="form-horizontal" action="/simpansekda/{{ $sekda->id }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            {{-- no CAPEG --}}
                            <div class="form-group">
                                <div class="col-sm">

                                    <div class="form-group">
                                        <label class="col-sm col-form-label">NIP</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="karpeg" name="nip" value="{{ $sekda->NIP }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm col-form-label">Nama</label>
                                        <div class="col-sm">
                                            <input type="text" class="form-control" placeholder="karpeg" name="nama" value="{{ Str::upper($sekda->NAMA) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info float-right">Simpan</button>
                    {{-- <button class="btn btn-warning float-right" onclick="goBack()">Kembali</button> --}}
                </div>
                <!-- /.card-footer -->
            </form>
            {{-- </div> --}}
        </div>
    </div>

@endsection
