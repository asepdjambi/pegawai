@extends('layouts.master')
@section('content')

{{-- <div class="row"> --}}
<div class="card">
    <div class="card-header">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h3 class="card-title"><b> ENTRY GAJI BERKALA</b></h3>
            </div>
            {{-- <div class="col-sm-4">
                        <a href="/pns/entrypegawai" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"> Tambah
                                Pegawai</i></a>
                    </div> --}}
        </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        {{-- <div class="row"> --}}
        <form class="form-horizontal" action="/simpangajiberkala/{{ $pegawai->id }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{-- <div class="card-body"> --}}
            <div class="row mt-3">
                <div class="col-4">
                    {{-- id Pegawai
                                    <div class="form-group">
                                        <div class="col-sm">
                                            <input type="hidden" class="form-control" placeholder="Nomor" name="id_peg" value="{{ $pegawai->id }}">
                </div>
            </div> --}}

            {{-- Nomor Surat --}}
            <div class="form-group">
                <label class="col-sm col-form-label">Nomor Surat</label>
                <div class="col-sm">
                    <input type="text" class="form-control" placeholder="Nomor" name="No">
                </div>
            </div>

            {{-- Gaji Baru --}}
            <div class="form-group">
                <label class="col-sm col-form-label">Gaji Baru</label>
                <div class="col-sm">
                    <input type="text" id="rupiah1" class="form-control" placeholder="gaji baru" name="gaji_baru">
                </div>
            </div>

            {{-- Masa Kerja --}}
            <div class="form-group">
                <label class="col-sm col-form-label">Masa Kerja Lama</label>
                <div class="col-sm">
                    <div class="form-group row">
                        <input type="text" placeholder="Tahun" name="masa_L_tahun" style="width: 20px" class="form-control col-3" style="width: 20px"> &nbsp; <span><label for="tahun" style="text-align: center">-</label></span>&nbsp;&nbsp;

                        <input type="text" placeholder="Bulan" name="masa_L_bulan" style="width: 20px" class="form-control col-3" style="width: 20px">
                    </div>
                </div>
            </div>

            {{-- Masa Kerja Baru --}}
            <div class="form-group">
                <label class="col-sm col-form-label">Masa Kerja Baru</label>
                <div class="col-sm">
                    <div class="form-group row">
                        <input type="text" class="form-control col-3" placeholder="Tahun" name="masa_kerja_tahun_B" style="width: 20px"> &nbsp; <span><label for="tahun" style="text-align: center">-</label></span>&nbsp;&nbsp;

                        <input type="text" class="form-control col-3" placeholder="Bulan" name="masa_kerja_bulan_B" style="width: 20px">
                    </div>
                </div>
            </div>

    </div>

    <div class=" col-4">

        {{-- tgl Surat --}}
        <div class="form-group">
            <label class="col-sm col-form-label">Tanggal Surat</label>
            <DIV class="col-sm">
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tgl" />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </DIV>
            </div>
        </div>

        {{-- Pejabat yang Mengesahkan --}}
        <div class="form-group">
            <label class="col-sm col-form-label">Pejabat Yang Mengesahkan</label>
            <div class="col-sm">
                <input type="text" class="form-control" placeholder="pejabat" name="pejabat">
            </div>
        </div>

        {{-- tgl dan Nomor surat yang sebelumnya--}}
        <div class="form-group">
            <label class="col-sm col-form-label">Tanggal dan Nomor Surat Sebelumnya </label>
            <div class="col-sm">
                <input type="text" class="form-control" placeholder="Tanggal / Nomor Surat" name="tgl_no_L">
            </div>
        </div>

        {{-- select golongan --}}
        <div class="form-group">
            <label class="col-sm col-form-label">GOLONGAN</label>
            <div class="col-sm">
                <select class="form-control select2bs4" style="width: 100%;" name="master_gol_id">
                    <option selected="selected" value="">-- PILIH GOLONGAN --</option>

                    @foreach ($gol1 as $id => $gol2)
                    <option value="{{ $gol2->id }}">{{ $gol2->gol }}
                    </option>

                    @endforeach

                </select>
            </div>
        </div>

    </div>

    <div class="col-4">

        {{-- Gaji Lama --}}
        <div class="form-group">
            <label class="col-sm col-form-label">Gaji Lama</label>
            <div class="col-sm">
                <input type="text" id="rupiah2" class="form-control" placeholder="gaji lama" name="gaji_lama">
            </div>
        </div>

        {{-- tgl Surat lama Berlaku--}}
        <div class="form-group">
            <label class="col-sm col-form-label">Tanggal Berlaku Gaji Sebelumnya</label>
            <DIV class="col-sm">
                <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" name="tgl_berlaku_l" />
                    <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </DIV>
            </div>
        </div>

        {{-- tgl Berlaku yang Baru--}}
        <div class="form-group">
            <label class="col-sm col-form-label">Tanggal Berlaku Gaji Baru</label>
            <DIV class="col-sm">
                <div class="input-group date" id="reservationdate4" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate4" name="tgl_berlaku_B" />
                    <div class="input-group-append" data-target="#reservationdate4" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </DIV>
            </div>
        </div>

        {{-- tgl Kenaikan Gaji Selanjutnya--}}
        <div class="form-group">
            <label class="col-sm col-form-label">Tanggal Kenaikan Gaji Selanjutnya</label>
            <DIV class="col-sm">
                <div class="input-group date" id="reservationdate5" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate5" name="tgl_berlaku_S" />
                    <div class="input-group-append" data-target="#reservationdate5" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i>
                        </div>
                    </div>
                </DIV>
            </div>
        </div>

    </div>

</div>
{{-- upload SK --}}
<div class="form-group">
    <label class="col-sm col-form-label">Upload SK</label>
    <div class="col-sm">
        <input type="file" class="form-control" name="arsip">
        {{-- <div class="custom-file">

                                    </div> --}}
    </div>
</div>
{{--
                        </div> --}}
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-info">Simpan</button>
    {{-- <button type="button" class="btn btn-default float-right" id="goBack()">Kembali</button> --}}
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

@section('js')
<script type="text/javascript">
    var rupiah = document.getElementById('rupiah2');
    rupiah.addEventListener('keyup', function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
        // hanya angka saja tanpa 'Rp'
        rupiah.value = formatRupiah(this.value);
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

@stop