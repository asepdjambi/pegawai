@extends('layouts.master')
@section('content')

<div class="card">
  <div class="card-header col-12">
    <div class="row">
      <div class="col-sm-12">
        <h3 class="card-title"><b>GAJI BERKALA PEGAWAI PNS DINAS PERHUBUNGAN</b></h3>

      </div>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body">

    <div class="row">

      <div class="col-12">
        <label>Pilih Tahun :</label>

        <!-- {{-- {{ date('Y') - 1 }}---> untuk mengurang dari tahun skrg --}}
        {{-- jika ingin menambah dari tahun skrg maka {{ date('Y') + 1 }} --}} -->

        <select style="width: 140px" name="tahun" id="tahun-filter" class="filter-tahun">
          @for($i=2020; $i<= date('Y')+1 ; $i++) <option value={{ $i }} <?= $i == date('Y') ? 'selected' : '' ?>>{{ $i }}
            </option>;
            @endfor
        </select>
      </div>

    </div>
    <br>

    <table id="tabel" class="table table-bordered table-striped text-sm table-sm table-gaji">
      <thead>

        <tr style="text-align: center">
          <th>NIP</th>
          <th>Nama</th>
          <th>Masa Kerja Sebelumya(Tahun)</th>
          <th>Masa Kerja Sebelumya(Bulan)</th>
          <th>Tanggal Harus Berkala</th>
          <!-- <th style="width: 20px; text-align:center">Aksi</th> -->
        </tr>
      </thead>
      <tbody>

      </tbody>
      </tfoot>
    </table>
  </div>
  <!-- /.card-body -->
</div>

@endsection

@section('js')

<script type="text/javascript">
  let tahun = $('#tahun-filter').val();

  const table = $('#tabel').DataTable({
    "pageLength": 100,
    "lengthMenu": [
      [10, 25, 50, 100, -1],
      [10, 25, 50, 100, 'semua']
    ],
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": true,
    "processing": true,
    "bServerSide": true,
    "order": [
      [1, "desc"]
    ],
    "autoWidth": false,
    "ajax": {
      url: "/tampilberkalafilter",
      type: "POST",
      data: function(d) {
        d.tahun = tahun;
        return d
      }
    },

    columnDefs: [{
        "targets": 0,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.NIP;
        }
      },
      {
        "targets": 1,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.Nama;
        }
      },
      {
        "targets": 2,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.masa_kerja_t;
        }
      },
      {
        "targets": 3,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.masa_kerja_b;
        }
      },
      {
        "targets": 4,
        "class": "text-nowrap",
        "render": function(data, type, row, meta) {
          return row.tgl_berlaku_S;
        }
      }
    ]
  });


  $('#tahun-filter').on('change', function() {
    tahun = $("#tahun-filter").val()
    table.ajax.reload(null, false)
  })


</script>
@endsection