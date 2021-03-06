@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header col-12">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="card-title"><b>PANGKAT BERKALA PEGAWAI PNS DINAS PERHUBUNGAN</b></h3>

                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="row">

                <div class="col-12">
                    <label>Pilih Tahun :</label>
                    <select style="width: 80px" name="tahun" id="tahun">

                        @for ($i = 2020; $i <= date('Y') + 1; $i++)
                            <option value={{ $i }}>{{ $i }}</option>;
                        @endfor
                    </select>
                </div>

            </div>
            <br>

            <table id="" class="table table-bordered table-striped text-sm table-sm">
                <thead>

                    <tr style="text-align: center">
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Masa Kerja Sebelumya</th>
                        <th>Tanggal Harus Berkala</th>
                        <th style="width: 20px; text-align:center">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    {{-- {{ date('Y') - 1 }}---> untuk mengurang dari tahun skrg --}}
                    {{-- jika ingin menambah dari tahun skrg maka {{ date('Y') + 1 }} --}}
                    @foreach ($pangkat as $berk)
                        <tr>
                            <td style="width: 250px">{{ $berk->pegawai->NIP }}</td>
                            <td style="width: 300px">{{ $berk->pegawai->Nama }}</td>
                            <td style="width: 150px; text-align:center">{{ $berk->pegawai->masa_kerja_t }} Tahun {{ $berk->pegawai->masa_kerja_b }} Bulan </td>
                            <td style="width: 150px; text-align:center">
                                {{ $berk->tgl_berlaku_S->format('d-m-Y') }}
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
