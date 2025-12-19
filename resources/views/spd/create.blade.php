<x-app-layout>
<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- BACK -->
    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-800">
            ←
        </a>
        <h1 class="text-2xl font-semibold">Surat Perjalanan Dinas (SPD)</h1>
    </div>

    <form method="POST" action="{{ route('spd.preview') }}" class="space-y-10">
        @csrf

        <!-- INFORMASI DASAR -->
        <div class="border rounded-2xl p-8">
            <h2 class="text-lg font-semibold mb-6">Informasi Dasar</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="font-medium">Nomor SPD *</label>
                    <input type="text" name="nomor_spd" placeholder="/SPD/VI/2025"
                        class="w-full mt-2 rounded-lg border-gray-300">
                </div>

                <div>
                    <label class="font-medium">Pejabat Pembuat Komitmen</label>
                    <select name="ppk" class="w-full mt-2 rounded-lg border-gray-300">
                        <option value="">Pilih PPK</option>
                        <option>Kepala Badan Pengelolaan Keuangan Aceh</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- DATA PEGAWAI -->
        <div class="border rounded-2xl p-8">
            <h2 class="text-lg font-semibold mb-6">Data Pegawai</h2>

            <div class="mb-4">
                <label class="font-medium">Nama Pegawai *</label>
                <select name="pegawai[nama]" class="w-full mt-2 rounded-lg border-gray-300">
                    <option value="">Pilih Pegawai</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="font-medium">Pangkat / Golongan</label>
                    <input type="text" name="pegawai[pangkat]"
                        class="w-full mt-2 rounded-lg border-gray-300">
                </div>
                <div>
                    <label class="font-medium">NIP</label>
                    <input type="text" name="pegawai[nip]"
                        class="w-full mt-2 rounded-lg border-gray-300">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                <div>
                    <label class="font-medium">Jabatan</label>
                    <input type="text" name="pegawai[jabatan]"
                        class="w-full mt-2 rounded-lg border-gray-300">
                </div>
                <div>
                    <label class="font-medium">Tingkat Biaya</label>
                    <select name="tingkat_biaya" class="w-full mt-2 rounded-lg border-gray-300">
                        <option value="">Pilih Tingkat Biaya</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- DETAIL PERJALANAN -->
        <div class="border rounded-2xl p-8">
            <h2 class="text-lg font-semibold mb-6">Detail Perjalanan</h2>

            <div class="mb-4">
                <label class="font-medium">Maksud Perjalanan Dinas *</label>
                <textarea name="maksud" rows="3"
                    class="w-full mt-2 rounded-lg border-gray-300"></textarea>
            </div>

            <div class="mb-4">
                <label class="font-medium">Alat Transportasi</label>
                <select name="transportasi" class="w-full mt-2 rounded-lg border-gray-300">
                    <option value="">Pilih Transportasi</option>
                    <option>Transportasi Darat</option>
                    <option>Pesawat</option>
                    <option>Kapal</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="font-medium">Tempat Tujuan *</label>
                <input type="text" name="tujuan"
                    class="w-full mt-2 rounded-lg border-gray-300">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="font-medium">Tanggal Mulai *</label>
                    <input type="date" name="tgl_mulai"
                        class="w-full mt-2 rounded-lg border-gray-300">
                </div>
                <div>
                    <label class="font-medium">Tanggal Selesai *</label>
                    <input type="date" name="tgl_selesai"
                        class="w-full mt-2 rounded-lg border-gray-300">
                </div>
            </div>

            <div class="mt-4">
                <label class="font-medium">Lamanya (hari)</label>
                <input type="number" name="lama"
                    class="w-full mt-2 rounded-lg border-gray-300">
            </div>
        </div>

        <!-- PEMBEBANAN ANGGARAN -->
        <div class="border rounded-2xl p-8">
            <h2 class="text-lg font-semibold mb-6">Pembebanan Anggaran</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="font-medium">Kegiatan / Sub Kegiatan</label>
                    <select name="kegiatan" class="w-full mt-2 rounded-lg border-gray-300">
                        <option value="">Pilih Kegiatan</option>
                    </select>
                </div>

                <div>
                    <label class="font-medium">Kode Rekening</label>
                    <select name="kode_rekening" class="w-full mt-2 rounded-lg border-gray-300">
                        <option value="">Pilih Kode Rekening</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- PENANDATANGAN -->
        <div class="border rounded-2xl p-8">
            <h2 class="text-lg font-semibold mb-6">Penandatanganan (PPTK)</h2>

            <div class="mb-4">
                <label class="font-medium">Nama PPTK</label>
                <select name="pptk[nama]" class="w-full mt-2 rounded-lg border-gray-300">
                    <option value="">Pilih Nama PPTK</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="font-medium">Pangkat</label>
                    <input type="text" name="pptk[pangkat]"
                        class="w-full mt-2 rounded-lg border-gray-300">
                </div>
                <div>
                    <label class="font-medium">NIP</label>
                    <input type="text" name="pptk[nip]"
                        class="w-full mt-2 rounded-lg border-gray-300">
                </div>
            </div>
        </div>

        <!-- ACTION -->
        <div class="flex justify-between">
            <a href="{{ route('dashboard') }}"
                class="border rounded-lg px-8 py-3">
                Batal
            </a>

            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-10 py-3 rounded-lg">
                Preview Surat
            </button>
        </div>

    </form>
</div>
</x-app-layout>
