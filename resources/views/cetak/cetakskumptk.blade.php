{{--
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak SKUMPTK</title>

    <link rel="stylesheet" href="admin/assets/dist/css/bootstrap.min.css">
</head>

<body>





    <h5 style="text-align: center">SURAT KETERANGAN <br />
        UNTUK MENDAPATKAN PEMBAYARAN TUNJANGAN KELUARGA </h5>
    <hr>


    <p style="font-size: 10pt"> Yang bertanda tangan di bawah ini : </p>


    <table width="100" style="font-size: 10pt;border-color:black">
        <thead>
        </thead>
        <tbody>
            <tr style="font-size: 10pt">
                <td style="text-align: right">1.</td>
                <td style="width:45px">NAMA LENGKAP</td>
                <td style=" width:5px">:</td>
                <td style="text-align: left;width:300px">{{ $pegawai->Nama }}</td>
                <td style="text-align: right">NIP</td>
                <td style="width:3%">:</td>
                <td style="text-align: left;width:300px">{{ $pegawai->NIP }}</td>
            </tr>
            <tr style="font-size: 10pt">
                <td style="text-align: right">2.</td>
                <td style="width:45px">TEMPAT/TGL LAHIR</td>
                <td style=" width:5px">:</td>
                <td style="text-align: left;width:250px">{{ $pegawai->tempat_L }} / {{ $pegawai->tgl_L->format('d-m-Y') }}</td>
            </tr>
            <tr style="font-size: 10pt">
                <td style="text-align: right">3.</td>
                <td style="width:45px">JENSI KELAMIN</td>
                <td style=" width:5px">:</td>
                <td style="text-align: left;width:250px">{{ $pegawai->JK }}</td>
            </tr>
            <tr style="font-size: 10pt">
                <td style="text-align: right">4.</td>
                <td style="width:45px">AGAMA</td>
                <td style=" width:5px">:</td>
                <td style="text-align: left;width:250px">{{ $pegawai->agama }}</td>
            </tr>
            <tr style="font-size: 10pt">
                <td style="text-align: right">5.</td>
                <td style="width:60px">STATUS KEPEGAWAIAN</td>
                <td style=" width:5px">:</td>
                <td style="text-align: left;width:250px">PEGAWAI NEGERI SIPIL</td>
            </tr>
            <tr style="font-size: 10pt">
                <td style="text-align: right">6.</td>
                <td style="width:45px">JABATAN</td>
                <td style=" width:5px">:</td>
                <td style="text-align: left;width:250px">{{ $pegawai->jab }}</td>
            </tr>
            <tr style="font-size: 10pt">
                <td style="text-align: right">7.</td>
                <td style="width:60px">PANGKAT/GOLONGAN</td>
                <td style="width:5px">:</td>
                <td style="text-align: left;width:250px">{{ $pegawai->golongan->Pangkat }} ({{ $pegawai->golongan->gol }})</td>
            </tr>
            <tr style="font-size: 10pt">
                <td style="text-align: right">8.</td>
                <td style="width:45px">PADA INSTANSI</td>
                <td style="width:5px">:</td>
                <td style="text-align: left;width:250px">DINAS PERHUBUNGAN KAB. BATANG HARI</td>
            </tr>

            {{-- @php

            $now=now();//tanggal hari ini
            $t_capeg=$pns->tmt_capeg; //tanggal capeg
            $mager_tahun=$t_capeg->diffInYears($now); //menghitung usia dalam tahun
            $mager_bulan=$t_capeg->diffInMonths($now); //menghitung usia dalam bulan

            @endphp --}}


            <tr style="font-size: 10pt">
                <td style="text-align: right">9.</td>
                <td style="width:45px">MASA KERJA GOLONGAN</td>
                <td style="width:5px">:</td>
                <td style="text-align: left;width:250px">{{ $pegawai->masa_kerja_t }} TAHUN {{ $pegawai->masa_kerja_b }} BULAN</td>
            </tr>
            <tr style="font-size: 10pt">
                <td style="text-align: right">10.</td>
                <td style="width:45px">GAJI POKOK</td>
                <td style="width:5px">:</td>
                <td style="text-align: left;width:250px">Rp. {{ number_format($pegawai->gapok, 0, ',', '.') }},-</td>
            </tr>
            <tr style="font-size: 10pt">
                <td style="text-align: right">11.</td>
                <td style="width:45px">ALAMAT</td>
                <td style="width:5px">:</td>
                <td style="text-align: left;width:250px" colspan="2">{{ $pegawai->Alamat }}</td>
            </tr>

        </tbody>
    </table>
    <br>

    <p style="font-size: 10pt"> Menerangkan dengan sesungguhnya bahwa : </p>
    <table style="font-size: 10pt">
        <thead>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: right">a.</td>
                <td style="width:500px">Disamping Jabatan Utama Tersebut, Bekerja Pula Sebagai:</td>
                <td style=" width:5px">:</td>
                <td style="text-align: left;width:350px">-</td>
            </tr>
        </tbody>
    </table>

    <table style="font-size: 10pt">
        <thead>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: right">b.</td>
                <td style="width:350px">Mempunyai Pensiun Janda</td>
                <td style=" width:5px"></td>
                <td style="text-align: left;width:5px">Rp.</td>
                <td style=" width:80px;text-align:right">Sebulan</td>
            </tr>
            <tr>
                <td style="text-align: right">c.</td>
                <td style="width:350px">Mempunyai Susunan Keluarga, sbb:</td>
            </tr>
        </tbody>
    </table>

    <table class=" table table-bordered table-striped table-sm" style="font-size: 10pt">
        <thead>
            <tr>
                <th rowspan=" 2" style=" text-align: center;vertical-align:middle">Nama Istri/ Suami/ Anak Tanggungan</th>
                <th colspan="2" style=" text-align: center;vertical-align:middle">Tanggal</th>
                <th rowspan="2" style=" text-align: center;vertical-align:middle">Pekerjaan/Sekolah</th>
                <th colspan="2" style=" text-align: center;vertical-align:middle">Keterangan</th>
            </tr>
            <tr>
                <th style=" text-align: center;vertical-align:middle">Kelahiran</th>
                <th style=" text-align: center;vertical-align:middle">Perkawinan</th>
                <th style=" text-align: center;vertical-align:middle">(AK,AT,AA)</th>
                <th style=" text-align: center;vertical-align:middle">DT/TT</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($keluarga as $kel)
                <tr>
                    <td>{{ $kel->nama }}</td>
                    <td>{{ $kel->tgl_l->format('d-m-Y') }}</td>
                    <td>{{ strtoupper($kel->status) }}</td>
                    <td>{{ strtoupper($kel->pekerjaan) }}</td>
                    <td>{{ strtoupper($kel->hub) }}</td>
                    <td>{{ $kel->dt }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <table style="font-size: 10pt">
        <thead>
        </thead>
        <tbody>
            @php


            // $anak=substr($keluarga->hub,0,4)
            // // menggunakan 2 penggunaan where
            // // $j_anak=App\Models\keluarga::where('hub','=', 'anak')
            $j_anak=App\Models\keluarga::where('pegawai_id','=',$pegawai->id)
            ->wherein('hub',['AA','AK','AT'])->get()->count();


            @endphp
            <tr>
                <td style="text-align: right">d.</td>
                <td style="width:350px">Jumlah anak {{ $j_anak }} ({{ Terbilang::make($j_anak) }}) orang (yang menjadi tanggungan termasuk yang tidak masuk dalam daftar gaji)</td>

            </tr>
        </tbody>
    </table>
    <br>
    <p style="text-align: justify;font-size: 10pt">Keterangan ini saya buat dengan sesungguhnya dan apabila keterangan ini ternyata tidak benar (palsu) saya bersedia dituntut di muka pengadilan berdasarkan Undang-undang yang berlaku, dan bersedia mengembalikan semua penghasilan yang telah saya terima seharusnya bukan menjadi hak saya.</p>

    <div class="row">
        {{-- membuat format tanggal 03 Desember 2020
        dengan catatan bahwa now() tidak ditulis pada model-->$dates --}}
        <div class="float-right" style="font-size: 10pt">Muara Bulian, {{ now()->isoformat('DD MMMM Y') }}</div>
    </div>

    <div class=" row mb-3">
        <div class="col-4" style="font-size: 10pt">
            <br>
            <p style="text-align: center">Mengetahui<br />
                KEPALA DINAS PERHUBUNGAN<br />
                KABUPATEN BATANG HARI<br>
                <br>
                <br>
            </p>
            <p style="text-align: center"><u> {{ strtoupper($kadis->pegawai->Nama) }}</u><br />
                NIP: {{ $kadis->pegawai->NIP }}</p>
        </div>
        <div class="col-5"></div>
        <div class="col-3 float-right" style="font-size: 10pt">
            <p style="text-align: center">
            <br>
                Yang Menerangkan<br />
                <br>
                <br>
                <br>
                <br>
            </p>
            <p style="text-align: center"><u> {{ $pegawai->Nama }}</u><br />
                NIP: {{ $pegawai->NIP }}</p>
        </div>
    </div>

</body>

</html>
