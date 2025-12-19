<x-guest-layout>
    <div class="min-h-screen grid grid-cols-1 md:grid-cols-2">

        <!-- LEFT: LOGIN FORM -->
        <div class="flex items-center justify-center px-8">
            <div class="w-full max-w-md">

                <h1 class="text-3xl font-bold mb-8">Login</h1>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- NIP -->
                    <div>
                        <label class="block font-medium mb-1">NIP</label>
                        <input
                            type="text"
                            name="nip"
                            required
                            autofocus
                            placeholder="Masukkan NIP"
                            class="w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring-yellow-500"
                        />
                        <x-input-error :messages="$errors->get('nip')" class="mt-1" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block font-medium mb-1">Kata Sandi</label>
                        <input
                            type="password"
                            name="password"
                            required
                            placeholder="Masukkan kata sandi"
                            class="w-full rounded-lg border-gray-300 focus:border-yellow-500 focus:ring-yellow-500"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Button -->
                    <button
                        type="submit"
                        class="w-full bg-yellow-400 hover:bg-yellow-500 text-white font-semibold py-3 rounded-lg transition"
                    >
                        Login
                    </button>
                </form>

                <p class="text-sm text-gray-500 mt-6">
                    Akun hanya dapat dibuat oleh administrator sistem.
                </p>
            </div>
        </div>

        <!-- RIGHT: LOGO -->
        <div class="hidden md:flex items-center justify-center bg-gray-50">
            <img
                src="{{ asset('images/logo-instansi.png') }}"
                alt="Logo Instansi"
                class="max-w-md"
            >
        </div>

    </div>
</x-guest-layout>
