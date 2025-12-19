<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Surat Tugas</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.5;
        }
        .center { text-align: center; }
        .bold { font-weight: bold; }
        .underline { text-decoration: underline; }
        table { width: 100%; border-collapse: collapse; }
        td { vertical-align: top; }
        .kop img { height: 90px; }
        .mt-2 { margin-top: 10px; }
        .mt-4 { margin-top: 20px; }
        .mt-6 { margin-top: 40px; }
    </style>
</head>
<body>

    <!-- KOP -->
    <table class="kop">
        <tr>
            <td width="15%">
                <img src="{{ public_path('images/logo-instansi.png') }}">
            </td>
            <td class="center">
                <div class="bold">PEMERINTAH ACEH</div>
                <div class="bold">BADAN PENGELOLAAN KEUANGAN ACEH</div>
                <div>
                    Jln. T. Nyak Arief No. 219 Syiah Kuala, Kota Banda Aceh, 23114<br>
                    (Komplek Kantor Gubernur Aceh, Gedung D)<br>
                    Telp. 0651-7551045 Fax. 0651-7551046<br>
                    website: bpka.acehprov.go.id | email: sandi_bpka@acehprov.go.id
                </div>
            </td>
        </tr>
    </table>

    <hr>

    <!-- JUDUL -->
    <div class="center mt-2">
        <div class="bold underline">SURAT TUGAS</div>
        <div>NOMOR : {{ $data['nomor_surat'] }}</div>
    </div>

    <!-- ISI -->
    <table class="mt-4">
        <tr>
            <td width="15%">Dasar</td>
            <td width="3%">:</td>
            <td>{{ $data['dasar'] }}</td>
        </tr>

        <tr>
            <td colspan="3" class="bold mt-2">MEMERINTAHKAN :</td>
        </tr>

        <tr>
            <td>Kepada</td>
            <td>:</td>
            <td>
                @foreach ($data['pegawai']['nama'] as $i => $nama)
                    <div class="mt-2">
                        {{ $i + 1 }}.
                        <table>
                            <tr><td width="25%">Nama</td><td width="3%">:</td><td>{{ $nama }}</td></tr>
                            <tr><td>Pangkat/Gol</td><td>:</td><td>{{ $data['pegawai']['pangkat'][$i] }}</td></tr>
                            <tr><td>NIP</td><td>:</td><td>{{ $data['pegawai']['nip'][$i] }}</td></tr>
                            <tr><td>Jabatan</td><td>:</td><td>{{ $data['pegawai']['jabatan'][$i] }}</td></tr>
                            <tr><td>SKPA</td><td>:</td><td>Badan Pengelolaan Keuangan Aceh</td></tr>
                        </table>
                    </div>
                @endforeach
            </td>
        </tr>

        <tr>
            <td>Untuk</td>
            <td>:</td>
            <td>{{ $data['maksud'] }}</td>
        </tr>

        <tr>
            <td>Di</td>
            <td>:</td>
            <td>
                {{ $data['tempat_tujuan'] }}<br>
                Pada tanggal
                {{ \Carbon\Carbon::parse($data['tanggal_mulai'])->translatedFormat('d') }}
                s.d
                {{ \Carbon\Carbon::parse($data['tanggal_selesai'])->translatedFormat('d F Y') }}
            </td>
        </tr>

        <tr>
            <td>Kode Rekening</td>
            <td>:</td>
            <td>{{ $data['kode_rekening'] }}</td>
        </tr>
    </table>

    <div class="mt-2">
        Demikian untuk dapat dilaksanakan sebagaimana mestinya.
    </div>

    <!-- TTD -->
    <div class="mt-6" style="text-align:right;">
        Banda Aceh, {{ now()->translatedFormat('d F Y') }}<br>
        Kepala Badan Pengelolaan Keuangan Aceh<br><br><br><br>

        <span class="bold underline">Reza Saputra, SSTP, M.Si</span><br>
        Pembina Utama Muda<br>
        NIP. 19800103 199810 1 002
    </div>

</body>
</html>
