<x-app-layout>
<div class="max-w-4xl mx-auto px-6 py-10 bg-white text-black">

    <!-- ACTION -->
    <div class="flex justify-between mb-8 print:hidden">
        <a href="{{ url()->previous() }}" class="text-gray-600 hover:underline">
            ← Kembali
        </a>
      <form method="POST" action="{{ route('spd.spd-pdf') }}">
        @csrf
        @foreach ($data as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ is_array($value) ? json_encode($value) : $value }}">
        @endforeach

        <button class="bg-blue-700 text-white px-6 py-2 rounded-lg">
            Cetak PDF
        </button>
      </form>

    </div>

    <!-- SURAT -->
    <div class="p-10">
        {{-- ================= HEADER ================= --}}
        <table class="no-border">
            <tr>
                <td width="15%">
                    <img src="{{ asset('images/logo-instansi.png') }}" width="90">
                </td>
                <td class="text-center">
                    <div class="bold">PEMERINTAH ACEH</div>
                    <div class="bold" style="font-size:14px;">BADAN PENGELOLAAN KEUANGAN ACEH</div>
                    <div>Jln. T. Nyak Arief No. 219 Syiah Kuala, Kota Banda Aceh, 23114</div>
                    <div>Telp. 0651-7551045 Fax. 0651-7551046</div>
                    <div>website: bpka.acehprov.go.id | email: sandi_bpka@acehprov.go.id</div>
                </td>
            </tr>
        </table>

        <hr>

        <table class="no-border">
            <tr>
                <td width="65%"></td>
                <td>
                    Lembar ke :<br>
                    Kode No :<br>
                    Nomor : {{ $data['nomor_spd'] }}
                </td>
            </tr>
        </table>

        <br>

        <div class="text-center bold">SURAT PERJALANAN DINAS (SPD)</div>

        <br>

        {{-- ================= HALAMAN 1 ================= --}}
        <table>
            <tr>
                <td width="5%">1.</td>
                <td width="35%">Pejabat Pembuat Komitmen</td>
                <td>{{ $data['ppk'] }}</td>
            </tr>

            <tr>
                <td>2.</td>
                <td>Nama / NIP Pegawai</td>
                <td>
                    {{ $data['pegawai']['nama'] }}<br>
                    {{ $data['pegawai']['nip'] }}
                </td>
            </tr>

            <tr>
                <td rowspan="3">3.</td>
                <td>a. Pangkat dan Golongan</td>
                <td>{{ $data['pegawai']['pangkat'] }}</td>
            </tr>
            <tr>
                <td>b. Jabatan / Instansi</td>
                <td>{{ $data['pegawai']['jabatan'] }}</td>
            </tr>
            <tr>
                <td>c. Tingkat Biaya Perjalanan Dinas</td>
                <td>{{ $data['tingkat_biaya'] }}</td>
            </tr>

            <tr>
                <td>4.</td>
                <td>Maksud Perjalanan Dinas</td>
                <td>{{ $data['maksud'] }}</td>
            </tr>

            <tr>
                <td>5.</td>
                <td>Alat Angkutan yang Dipergunakan</td>
                <td>{{ $data['transportasi'] }}</td>
            </tr>

            <tr>
                <td rowspan="2">6.</td>
                <td>a. Tempat Berangkat</td>
                <td> Banda Aceh </td>
            </tr>
            <tr>
                <td>b. Tempat Tujuan</td>
                <td>{{ $data['tujuan'] }}</td>
            </tr>

            <tr>
                <td rowspan="3">7.</td>
                <td>a. Lamanya Perjalanan Dinas</td>
                <td>{{ $data['lama'] }} Hari</td>
            </tr>
            <tr>
                <td>b. Tanggal Berangkat</td>
                <td>{{ $data['tgl_mulai'] }}</td>
            </tr>
            <tr>
                <td>c. Tanggal Kembali</td>
                <td>{{ $data['tgl_selesai'] }}</td>
            </tr>

            <tr>
                <td>8.</td>
                <td>Pengikut</td>
                <td>-</td>
            </tr>

            <tr>
                <td rowspan="2">9.</td>
                <td>a. Kegiatan / Instansi</td>
                <td>{{ $data['kegiatan'] }}</td>
            </tr>
            <tr>
                <td>b. Akun / Kode Rekening</td>
                <td>{{ $data['kode_rekening'] }}</td>
            </tr>

            <tr>
                <td>10.</td>
                <td>Keterangan lain-lain</td>
                <td>-</td>
            </tr>
        </table>

        <br><br>

        <table class="no-border">
            <tr>
                <td width="60%"></td>
                <td class="text-center">
                    Dikeluarkan di Banda Aceh<br>
                    Tanggal {{ $data['tgl_mulai'] }}<br><br>
                    Pejabat Pelaksana Teknis Kegiatan<br>
                    Badan Pengelolaan Keuangan Aceh<br><br><br>
                    <u>{{ $data['pptk']}}</u><br>
                    {{ $data['pptk_pangkat'] }}<br>
                    NIP. {{ $data['pptk_nip'] }}
                </td>
            </tr>
        </table>

        <div class="page-break"></div>

        {{-- ================= HALAMAN 2 ================= --}}
        <table>
            <tr>
                <td width="50%">
                    <b>I.</b> Berangkat dari<br>
                    (Tempat Kedudukan)<br>
                    Ke<br>
                    Pada Tanggal
                </td>
                <td>
                    : Banda Aceh<br><br>
                    : {{ $data['tujuan'] }}<br>
                    : {{ $data['tgl_mulai'] }}<br><br>
                    Pejabat Pelaksana Teknis Kegiatan<br><br>
                    <u>{{ $data['pptk'] }}</u><br>
                    {{ $data['pptk_pangkat'] }}<br>
                    NIP. {{ $data['pptk_nip'] }}
                </td>
            </tr>

            @for ($i = 2; $i <= 6; $i++)
            <tr>
                <td>
                    <b>{{ $i }}.</b> Tiba di<br>
                    Pada Tanggal<br>
                    Kepala
                </td>
                <td>
                    Berangkat dari :<br>
                    Ke :<br>
                    Pada Tanggal :<br>
                    Kepala :
                </td>
            </tr>
            @endfor

            <tr>
                <td colspan="2">
                    <b>VII. CATATAN LAIN-LAIN</b><br>
                    <b>PERHATIAN :</b><br>
                    PPK/PPTK yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas,
                    para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara
                    bertanggung jawab berdasarkan peraturan keuangan negara.
                </td>
            </tr>
        </table>

        <br><br>

        <table class="no-border">
            <tr>
                <td width="60%"></td>
                <td class="text-center">
                    Pejabat Pelaksana Teknis Kegiatan<br>
                    Badan Pengelolaan Keuangan Aceh<br><br><br>
                    <u>{{ $data['pptk'] }}</u><br>
                    {{ $data['pptk_pangkat']}}<br>
                    NIP. {{ $data['pptk_nip'] }}
                </td>
            </tr>
        </table>
    </div>
</div>
</x-app-layout>
