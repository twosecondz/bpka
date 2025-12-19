<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>E-Surat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-800">

    <!-- NAVBAR -->
    <header class="border-b">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo-instansi.png') }}" class="h-10" alt="Logo">
            </div>

            <!-- User -->
            <div class="flex items-center gap-3">
                <span class="text-sm font-medium">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-gray-500 hover:text-gray-700">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- CONTENT -->
    <main>
        {{ $slot }}
    </main>

</body>
</html>
