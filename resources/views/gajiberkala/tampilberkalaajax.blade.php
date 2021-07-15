@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header col-12">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="card-title"><b>GAJI BERKALA PEGAWAI PNS DINAS PERHUBUNGAN TAHUN {{ date('Y') }}</b></h3>

                </div>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">


            <div class="col-sm">
                <label class="col-sm col-form-label">Pilih Tahun</label> <span>
                    <select class="form-control select2bs4" style="width: 100%;" name="tahun" id="tahun">
                        <option selected="selected" value="0">{{ date('Y') }}</option>
                        <option value="1">{{ date('Y') + 1 }}</option>
                    </select></span>
            </div>


            <table class="table table-bordered table-striped text-sm table-sm">
                <thead>

                    <tr style="text-align: center">
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Masa Kerja Sebelumya</th>
                        <th>Tanggal Harus Berkala</th>
                        <th style="width: 20px; text-align:center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="berkala">

                    {{-- {{ date('Y') - 1 }}---> untuk mengurang dari tahun skrg --}}
                    {{-- jika ingin menambah dari tahun skrg maka {{ date('Y') + 1 }} --}}
                    @foreach ($berkala as $berkala)
                        <tr>
                            <td style="width: 250px">{{ $berkala->pegawai->NIP }}</td>
                            <td style="width: 300px">{{ $berkala->pegawai->Nama }}</td>
                            <td style="width: 150px; text-align:center">{{ $berkala->pegawai->masa_kerja_t }} Tahun {{ $berkala->pegawai->masa_kerja_b }} Bulan </td>
                            <td style="width: 150px; text-align:center">
                                {{ $berkala->tgl_berlaku_S->format('d-m-Y') }}
                            </td>

                            <td style="text-align: center">

                                <a href="" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Cetak Gaji Berkala Pegawai" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>







@endsection
