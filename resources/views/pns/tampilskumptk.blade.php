@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header col-12">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="card-title"><b>CETAK SKUMPTK PEGAWAI PNS DINAS PERHUBUNGAN</b></h3>
                    {{-- <div class="class float-right">
                        <a href="#" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Cetak yang dipilih"><i
                                class="fa fa-print"> &nbsp; <span>cetak yang dipilih</i></a>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Cetak Semua"><i class="fa fa-print"> &nbsp; <span>cetak semua</i></a>
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ url('bulk_delete') }}" method="post">
                {{ csrf_field() }}
                <button type="submit" class="btn bg-gradient-danger float-right" id="bulk_delete" style="display:none"><i class="fa fa-print"> &nbsp; <span>Cetak yang dipilih</i></button>

            <table id="example1" class="table table-bordered table-striped text-sm table-sm">
                <thead>

                    <tr style="text-align: center">
                        <th style="width: 8px"><input type="checkbox" id="selectall" class="checked"></th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Golongan</th>
                        <th>Jabatan</th>
                        <th>Eselon</th>
                        {{-- <th style="width: 20px; text-align:center">Aksi</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai as $p)
                        <tr>
                            <td style="text-align: center"><input type="checkbox" name="id[]" value="{{ $p->id }}" onclick="checkbox_is_checked()" class="check-all" >
                            </td>
                            <td style="width: 150px">{{ $p->NIP }}</td>
                            <td style="width: 250px">{{ $p->Nama }}</td>
                            <td style="width: 50px">
                                {{-- relasi dari pegawai ke master_golongan --}}
                                {{ $p->golongan->gol }}
                            </td>

                            <td style="width: 150px"> {{ $p->jab }}</td>
                            <td style="width: 50px">
                                {{-- relasi dari pegawai ke master_jabatan --}}
                                {{ $p->jabatan->eselon }}

                            </td>
                            {{-- <td style="text-align: center">

                                <a href="/cetakskumptk/{{ $p->id }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Cetak SKUMPTK Pegawai" target="_blank"><i class="fa fa-print" aria-hidden="true"></i></a>

                            </td> --}}
                        </tr>
                    @endforeach
                    </tfoot>
            </table>
            </form>
        </div>
        <!-- /.card-body -->
    </div>

    @section('js')
        
    <script>
        $(function() {
                $("#selectall").click(function() {
                    if ($("#selectall").is(':checked')) {
                        $("input[type=checkbox]").each(function() {
                            $(this).attr("checked", true);
                        });
                        $("#bulk_delete").show();
                    } else {
                        $("input[type=checkbox]").each(function() {
                            $(this).attr("checked", false);
                        });
                        $("#bulk_delete").hide();
    
                    }
                })
            })
    
    </script>
    
    <script>
        function checkbox_is_checked() {
                if ($(".check-all:checked").length > 0) {
                    $("#bulk_delete").show();
                } else {
                    $("#bulk_delete").hide();
                }
    
            }
    
    </script>
    
    @endsection


@endsection
