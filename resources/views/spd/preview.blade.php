<x-app-layout>
    <div class="max-w-4xl mx-auto px-6 py-10">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold">Preview Surat Perjalanan Dinas</h1>

            <a href="{{ url()->previous() }}"
               class="border rounded-lg px-6 py-2 hover:bg-gray-100">
                Kembali
            </a>
        </div>

        <!-- SURAT -->
        <div class="border rounded-2xl p-10 bg-white text-gray-800">

            <!-- JUDUL -->
            <div class="text-center mb-8">
                <h2 class="text-lg font-bold uppercase">Surat Perjalanan Dinas (SPD)</h2>
                <p class="mt-2">
                    Nomor : {{ $data['nomor_spd'] ?? '-' }}
                </p>
            </div>

            <!-- INFORMASI UMUM -->
            <table class="w-full text-sm mb-6">
                <tr>
                    <td class="w-1/3 py-1">Pejabat Pembuat Komitmen</td>
                    <td class="py-1">: {{ $data['ppk'] ?? '-' }}</td>
                </tr>
            </table>

            <!-- DATA PEGAWAI -->
            <h3 class="font-semibold mb-2">I. Data Pegawai</h3>
            <table class="w-full text-sm mb-6">
                <tr>
                    <td class="w-1/3 py-1">Nama Pegawai</td>
                    <td>: {{ $data['pegawai']['nama'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-1">NIP</td>
                    <td>: {{ $data['pegawai']['nip'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-1">Pangkat / Golongan</td>
                    <td>: {{ $data['pegawai']['pangkat'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-1">Jabatan</td>
                    <td>: {{ $data['pegawai']['jabatan'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-1">Tingkat Biaya</td>
                    <td>: {{ $data['tingkat_biaya'] ?? '-' }}</td>
                </tr>
            </table>

            <!-- DETAIL PERJALANAN -->
            <h3 class="font-semibold mb-2">II. Detail Perjalanan Dinas</h3>
            <table class="w-full text-sm mb-6">
                <tr>
                    <td class="w-1/3 py-1">Maksud Perjalanan</td>
                    <td>: {{ $data['maksud'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-1">Alat Transportasi</td>
                    <td>: {{ $data['transportasi'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-1">Tempat Tujuan</td>
                    <td>: {{ $data['tujuan'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-1">Tanggal Berangkat</td>
                    <td>: {{ $data['tgl_mulai'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-1">Tanggal Kembali</td>
                    <td>: {{ $data['tgl_selesai'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-1">Lama Perjalanan</td>
                    <td>: {{ $data['lama'] ?? '-' }} hari</td>
                </tr>
            </table>

            <!-- ANGGARAN -->
            <h3 class="font-semibold mb-2">III. Pembebanan Anggaran</h3>
            <table class="w-full text-sm mb-8">
                <tr>
                    <td class="w-1/3 py-1">Kegiatan / Sub Kegiatan</td>
                    <td>: {{ $data['kegiatan'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="py-1">Kode Rekening</td>
                    <td>: {{ $data['kode_rekening'] ?? '-' }}</td>
                </tr>
            </table>

            <!-- TANDA TANGAN -->
            <div class="grid grid-cols-2 gap-10 mt-12 text-sm">
                <div></div>

                <div class="text-center">
                    <p>Pejabat Pelaksana Teknis Kegiatan</p>
                    <p class="mt-16 font-semibold">
                        {{ $data['pptk']['nama'] ?? '-' }}
                    </p>
                    <p>
                        {{ $data['pptk']['pangkat'] ?? '-' }}<br>
                        NIP. {{ $data['pptk']['nip'] ?? '-' }}
                    </p>
                </div>
            </div>
        </div>

        <!-- ACTION -->
        <div class="flex justify-end gap-4 mt-8">
            <form method="POST" action="{{ route('spd.spd-pdf') }}">
                @csrf
                @foreach ($data as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ is_array($value) ? json_encode($value) : $value }}">
                @endforeach

                <button
                    class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-semibold">
                    Simpan SPD
                </button>
            </form>
        </div>

    </div>
</x-app-layout>
