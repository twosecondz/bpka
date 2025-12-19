<x-app-layout>
<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- BACK -->
    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-800">
            ←
        </a>
        <h1 class="text-2xl font-semibold">Surat Tugas</h1>
    </div>

    <form method="POST" action="{{ route('surat-tugas.preview') }}" class="space-y-10">
        @csrf

        <!-- INFORMASI SURAT -->
        <div class="border rounded-2xl p-8">
            <h2 class="text-lg font-semibold mb-6">Informasi Surat</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="font-medium">Nomor Surat *</label>
                    <input
                        type="text"
                        name="nomor_surat"
                        placeholder="800.1.11.1/ST/"
                        class="w-full mt-2 rounded-lg border-gray-300"
                        required
                    >
                </div>

                <div>
                    <label class="font-medium">Kode Rekening</label>
                    <select
                        name="kode_rekening"
                        class="w-full mt-2 rounded-lg border-gray-300"
                    >
                        <option value="">Pilih Kode Rekening ...</option>
                        <option value="5.1.02.04.01.0001/Sub Kegiatan 5.02.02.1.01.0007">
                            5.1.02.04.01.0001/Sub Kegiatan 5.02.02.1.01.0007
                        </option>
                    </select>
                </div>
            </div>

            <div class="mt-6">
                <label class="font-medium">Dasar</label>
                <textarea
                    name="dasar"
                    rows="3"
                    class="w-full mt-2 rounded-lg border-gray-300"
                    placeholder="Peraturan Gubernur Aceh Nomor 18 Tahun 2024 ..."
                ></textarea>
            </div>

            <div class="mt-6">
                <label class="font-medium">Maksud Perjalanan Dinas *</label>
                <textarea
                    name="maksud"
                    rows="3"
                    class="w-full mt-2 rounded-lg border-gray-300"
                    required
                ></textarea>
            </div>

            <div class="mt-6">
                <label class="font-medium">Tempat Tujuan *</label>
                <input
                    type="text"
                    name="tempat_tujuan"
                    class="w-full mt-2 rounded-lg border-gray-300"
                    required
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <label class="font-medium">Tanggal Mulai *</label>
                    <input
                        type="date"
                        name="tanggal_mulai"
                        class="w-full mt-2 rounded-lg border-gray-300"
                        required
                    >
                </div>

                <div>
                    <label class="font-medium">Tanggal Selesai *</label>
                    <input
                        type="date"
                        name="tanggal_selesai"
                        class="w-full mt-2 rounded-lg border-gray-300"
                        required
                    >
                </div>
            </div>
        </div>

        <!-- DATA PEGAWAI -->
        <div class="border rounded-2xl p-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-lg font-semibold">Data Pegawai</h2>
                <button
                    type="button"
                    onclick="addPegawai()"
                    class="border rounded-lg px-4 py-2 text-sm hover:bg-gray-100"
                >
                    + Tambah Pegawai
                </button>
            </div>

            <div id="pegawai-wrapper" class="space-y-8">

                <!-- PEGAWAI ITEM -->
                <div class="pegawai-item border rounded-xl p-6 relative">

                    <!-- HAPUS -->
                    <button
                        type="button"
                        onclick="removePegawai(this)"
                        class="absolute top-4 right-4 text-sm text-red-500 hover:text-red-700 hidden btn-remove"
                    >
                        Hapus
                    </button>

                    <div class="mb-4">
                        <label class="font-medium">Nama Pegawai *</label>
                        <input
                            type="text"
                            name="pegawai[nama][]"
                            class="w-full mt-2 rounded-lg border-gray-300"
                            required
                        >
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="font-medium">Pangkat / Golongan</label>
                            <input
                                type="text"
                                name="pegawai[pangkat][]"
                                class="w-full mt-2 rounded-lg border-gray-300"
                            >
                        </div>

                        <div>
                            <label class="font-medium">NIP</label>
                            <input
                                type="text"
                                name="pegawai[nip][]"
                                class="w-full mt-2 rounded-lg border-gray-300"
                            >
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="font-medium">Jabatan</label>
                        <input
                            type="text"
                            name="pegawai[jabatan][]"
                            class="w-full mt-2 rounded-lg border-gray-300"
                        >
                    </div>

                </div>
            </div>
        </div>

        <!-- ACTION -->
        <div class="flex justify-between">
            <a
                href="{{ route('dashboard') }}"
                class="border rounded-lg px-8 py-3"
            >
                Batal
            </a>

            <button
                type="submit"
                class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-10 py-3 rounded-lg"
            >
                Preview Surat
            </button>
        </div>

    </form>
</div>

<!-- JS -->
<script>
function addPegawai() {
    const wrapper = document.getElementById('pegawai-wrapper');
    const firstItem = wrapper.querySelector('.pegawai-item');
    const clone = firstItem.cloneNode(true);

    clone.querySelectorAll('input').forEach(input => input.value = '');
    wrapper.appendChild(clone);

    updateRemoveButton();
}

function removePegawai(btn) {
    const wrapper = document.getElementById('pegawai-wrapper');
    if (wrapper.children.length > 1) {
        btn.closest('.pegawai-item').remove();
    }
    updateRemoveButton();
}

function updateRemoveButton() {
    const items = document.querySelectorAll('.pegawai-item');
    items.forEach((item, index) => {
        const btn = item.querySelector('.btn-remove');
        btn.classList.toggle('hidden', index === 0);
    });
}

updateRemoveButton();
</script>

</x-app-layout>
