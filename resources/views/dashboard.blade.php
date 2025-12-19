<x-app-layout>
    <div class="max-w-7xl mx-auto px-6 py-16">

        <!-- TITLE -->
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold mb-4">
                Buat Surat Dinas Anda
            </h1>
            <p class="text-gray-500 text-lg">
                Pilih jenis surat yang ingin Anda buat. Sistem akan memandu <br>
                Anda mengisi data yang diperlukan.
            </p>
        </div>

        <!-- CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

            <!-- SURAT TUGAS -->
            <div class="border rounded-2xl p-10 text-center hover:shadow-md transition">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center">
                        📄
                    </div>
                </div>

                <h2 class="text-2xl font-semibold mb-3">
                    Surat Tugas
                </h2>

                <p class="text-gray-500 mb-8">
                    Buat surat tugas untuk pegawai yang akan
                    melaksanakan kegiatan dinas
                </p>

                <a href="surat-tugas/create"
                   class="inline-block w-full bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-3 rounded-lg transition">
                    Buat Surat Tugas
                </a>
            </div>

            <!-- SURAT DINAS / SPD -->
            <div class="border rounded-2xl p-10 text-center hover:shadow-md transition">
                <div class="flex justify-center mb-6">
                    <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center">
                        ✈️
                    </div>
                </div>

                <h2 class="text-2xl font-semibold mb-3">
                    Surat Dinas
                </h2>

                <p class="text-gray-500 mb-8">
                    Buat surat perjalanan dinas (SPD) untuk
                    perjalanan pegawai
                </p>

                <a href="spd/create"
                   class="inline-block w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 rounded-lg transition">
                    Buat Surat Dinas
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
