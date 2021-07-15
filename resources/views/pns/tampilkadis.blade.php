@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header col-12">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="card-title"><b>KEPALA DINAS PERHUBUNGAN</b></h3>
                    @if ($kadis->isEmpty())
                        <a href="/entrykadis" class="btn btn-primary btn-sm float-right" data-toggle="tooltip" data-placement="top" title="Tambah Kadis"><i class="fa fa-plus"> Tambah Kadis </i></a>
                    @endif
                </div>
                {{-- <div class="col-sm-4">
                    <a href="/entrykadis" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> Data</i></a>
                </div> --}}
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped text-sm table-sm">
                <thead>

                    <tr style="text-align: center">
                        <th>NIP</th>
                        <th>Nama</th>


                        <th style="width: 30px; text-align:center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kadis as $k)
                        <tr>
                            <td style="width: 150px">{{ $k->pegawai->NIP }}</td>
                            <td style="width: 250px">{{ $k->pegawai->Nama }}</td>

                            <td style="text-align:center">

                                <a href="/editkadis" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Data Kadis"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                <a href="/hapuskadis/{{ $k->id }}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Hapus Data Kadis"><i class="fa fa-times" aria-hidden="true"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>



@endsection
