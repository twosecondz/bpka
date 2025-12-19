<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Perjalanan Dinas</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12px;
            line-height: 1.4;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .bold { font-weight: bold; }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            vertical-align: top;
            padding: 4px;
        }
        .border td {
            border: 1px solid #000;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>

{{-- ================= HALAMAN 1 ================= --}}

<table>
    <tr>
        <td width="15%">
            <img src="{{ public_path('logo-aceh.png') }}" width="80">
        </td>
        <td class="text-center">
            <div class="bold">PEMERINTAH ACEH</div>
            <div class="bold">BADAN PENGELOLAAN KEUANGAN ACEH</div>
            <div>Jl. T. Nyak Arief No. 219 Syiah Kuala, Kota Banda Aceh, 23114</div>
            <div>website: bpka.acehprov.go.id | email: sandi_bpka@acehprov.go.id</div>
        </td>
    </tr>
</table>

<hr>

<table style="margin-top:10px;">
    <tr>
        <td width="65%"></td>
        <td>
            Lembar ke : {{ $data['lembar'] ?? '' }}<br>
            Kode No : {{ $data['kode_no'] ?? '' }}<br>
            Nomor : {{ $data['nomor'] ?? '' }}
        </td>
    </tr>
</table>

<h3 class="text-center bold" style="margin:15px 0;">SURAT PERJALANAN DINAS (SPD)</h3>

<table class="border">
    <tr>
        <td width="5%">1.</td>
        <td width="35%">Pejabat Pembuat Komitmen</td>
        <td>{{ $data['ppk'] }}</td>
    </tr>

    <tr>
        <td>2.</td>
        <td>Nama / NIP Pegawai</td>
        <td>
            {{ $data['pegawai']['nama'][0] }}<br>
            {{ $data['pegawai']['nip'][0] }}
        </td>
    </tr>

    <tr>
        <td>3.</td>
        <td>
            a. Pangkat / Golongan<br>
            b. Jabatan / Instansi<br>
            c. Tingkat Biaya Perjalanan
        </td>
        <td>
            a. {{ $data['pegawai']['pangkat'][0] ?? '' }}<br>
            b. {{ $data['pegawai']['jabatan'][0] ?? '' }}<br>
            c. {{ $data['tingkat_biaya'] ?? '' }}
        </td>
    </tr>

    <tr>
        <td>4.</td>
        <td>Maksud Perjalanan Dinas</td>
        <td>{{ $data['maksud'] }}</td>
    </tr>

    <tr>
        <td>5.</td>
        <td>Alat Angkutan</td>
        <td>{{ $data['transportasi'] }}</td>
    </tr>

    <tr>
        <td>6.</td>
        <td>
            a. Tempat Berangkat<br>
            b. Tempat Tujuan
        </td>
        <td>
            a. {{ $data['berangkat'] }}<br>
            b. {{ $data['tujuan'] }}
        </td>
    </tr>

    <tr>
        <td>7.</td>
        <td>
            a. Lamanya Perjalanan<br>
            b. Tanggal Berangkat<br>
            c. Tanggal Kembali
        </td>
        <td>
            a. {{ $data['lama'] }} Hari<br>
            b. {{ $data['tgl_mulai'] }}<br>
            c. {{ $data['tgl_selesai'] }}
        </td>
    </tr>

    <tr>
        <td>8.</td>
        <td>Pengikut</td>
        <td>&nbsp;</td>
    </tr>

    <tr>
        <td>9.</td>
        <td>
            a. Kegiatan / Instansi<br>
            b. Akun / Kode Rekening
        </td>
        <td>
            a. {{ $data['kegiatan'] }}<br>
            b. {{ $data['kode_rekening'] }}
        </td>
    </tr>

    <tr>
        <td>10.</td>
        <td>Keterangan lain-lain</td>
        <td>&nbsp;</td>
    </tr>
</table>

<table style="margin-top:40px;">
    <tr>
        <td width="60%"></td>
        <td>
            Dikeluarkan di {{ $data['tempat_keluar'] }}<br>
            Tanggal {{ $data['tgl_keluar'] }}<br><br>
            Pejabat Pelaksana Teknis Kegiatan<br>
            Badan Pengelolaan Keuangan Aceh<br><br><br>
            <u>{{ $data['pptk_nama'] }}</u><br>
            NIP. {{ $data['pptk_nip'] }}
        </td>
    </tr>
</table>

<div class="page-break"></div>

{{-- ================= HALAMAN 2 ================= --}}

<table class="border">
@php
    $roman = ['I','II','III','IV','V','VI'];
@endphp

@foreach ($roman as $r)
<tr>
    <td width="50%">
        {{ $r }}. Tiba di :<br>
        Pada tanggal :<br>
        Kepala :<br><br><br>
        (...............................)<br>
        NIP
    </td>
    <td>
        Berangkat dari :<br>
        Ke :<br>
        Pada tanggal :<br>
        Kepala :<br><br><br>
        (...............................)<br>
        NIP
    </td>
</tr>
@endforeach

<tr>
    <td colspan="2">
        VII. CATATAN LAIN-LAIN
    </td>
</tr>

<tr>
    <td colspan="2">
        VIII. PERHATIAN :<br>
        PA/KPA/PPK/PPTK yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas,
        para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara
        pengeluaran bertanggung jawab berdasarkan peraturan keuangan negara.
    </td>
</tr>
</table>

<br><br>

<div class="text-center">
    PA / KPA / PPK / PPTK<br><br><br>
    <u>{{ $data['pptk_nama'] }}</u><br>
    NIP. {{ $data['pptk_nip'] }}
</div>

</body>
</html>
