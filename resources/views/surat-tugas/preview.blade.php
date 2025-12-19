<x-app-layout>
<div class="max-w-4xl mx-auto px-6 py-10 bg-white text-black">

    <!-- ACTION -->
    <div class="flex justify-between mb-8 print:hidden">
        <a href="{{ url()->previous() }}" class="text-gray-600 hover:underline">
            ← Kembali
        </a>
      <form method="POST" action="{{ route('surat-tugas.pdf') }}">
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

        <!-- KOP -->
        <div class="flex gap-4 mb-2">
            <img src="{{ asset('images/logo-instansi.png') }}" class="h-20">
            <div class="text-center w-full">
                <p class="font-bold">PEMERINTAH ACEH</p>
                <p class="font-bold text-lg">BADAN PENGELOLAAN KEUANGAN ACEH</p>
                <p class="text-sm">
                    Jln. T. Nyak Arief No. 219 Syiah Kuala, Kota Banda Aceh, 23114<br>
                    (Komplek Kantor Gubernur Aceh, Gedung D)<br>
                    Telp. 0651-7551045 Fax. 0651-7551046<br>
                    website: bpka.acehprov.go.id | email: sandi_bpka@acehprov.go.id
                </p>
            </div>
        </div>

        <hr class="border-black my-2">

        <!-- JUDUL -->
        <div class="text-center my-6">
            <p class="font-bold underline">SURAT TUGAS</p>
            <p>NOMOR : {{ $data['nomor_surat'] }}</p>
        </div>

        <!-- ISI -->
        <table class="w-full text-sm leading-relaxed">
            <tr>
                <td class="align-top w-24">Dasar</td>
                <td class="align-top w-4">:</td>
                <td>{{ $data['dasar'] }}</td>
            </tr>

            <tr><td colspan="3" class="pt-4 font-semibold">MEMERINTAHKAN :</td></tr>

            <tr>
                <td class="align-top">Kepada</td>
                <td class="align-top">:</td>
                <td>
                    @foreach ($data['pegawai']['nama'] as $i => $nama)
                        <div class="mb-4">
                            {{ $i + 1 }}.
                            <table>
                                <tr><td class="w-28">Nama</td><td class="w-4">:</td><td>{{ $nama }}</td></tr>
                                <tr><td>Pangkat/Gol</td><td>:</td><td>{{ $data['pegawai']['pangkat'][$i] }}</td></tr>
                                <tr><td>NIP</td><td>:</td><td>{{ $data['pegawai']['nip'][$i] }}</td></tr>
                                <tr><td>Jabatan</td><td>:</td><td>{{ $data['pegawai']['jabatan'][$i] }}</td></tr>
                                <tr><td>SKPA</td><td>:</td><td>{{ $data['pegawai']['skpa'][$i] ?? 'Badan Pengelolaan Keuangan Aceh' }}</td></tr>
                            </table>
                        </div>
                    @endforeach
                </td>
            </tr>

            <tr>
                <td class="align-top">Untuk</td>
                <td class="align-top">:</td>
                <td>{{ $data['maksud'] }}</td>
            </tr>

            <tr>
                <td class="align-top">Di</td>
                <td class="align-top">:</td>
                <td>
                    {{ $data['tempat_tujuan'] }}<br>
                    Pada tanggal {{ \Carbon\Carbon::parse($data['tanggal_mulai'])->translatedFormat('d') }}
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

        <p class="mt-6 text-sm">
            Demikian untuk dapat dilaksanakan sebagaimana mestinya.
        </p>

        <!-- TTD -->
        <div class="mt-10 text-right">
            <p>Banda Aceh, {{ now()->translatedFormat('d F Y') }}</p>
            <p>Kepala Badan Pengelolaan Keuangan Aceh</p>

            <div class="mt-16 font-bold underline">
                Reza Saputra, SSTP, M.Si
            </div>
            <p>Pembina Utama Muda</p>
            <p>NIP. 19800103 199810 1 002</p>
        </div>

    </div>
</div>
</x-app-layout>
