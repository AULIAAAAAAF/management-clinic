<!DOCTYPE html>
<html>
<head>
    <title>Admin - Klinik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <aside class="w-64 bg-white shadow-lg p-6">
            <h2 class="text-xl font-bold text-blue-600 mb-6">Admin Klinik</h2>
            <nav class="space-y-3">
                <a href="/" class="block px-4 py-2 rounded-lg hover:bg-gray-50">🏠 Home</a>
                <a href="/admin/dashboard" class="block px-4 py-2 rounded-lg hover:bg-blue-50">🏠 Dashboard</a>
                <a href="/admin/antrian" class="block px-4 py-2 rounded-lg hover:bg-blue-50">🧾 Kelola Antrian</a>
                <a href="/admin/bookings" class="block px-4 py-2 rounded-lg hover:bg-blue-50">📅 Semua Booking</a>
                <a href="/admin/dokters" class="block px-4 py-2 rounded-lg hover:bg-blue-50">👨‍⚕️ Dokter</a>
                <a href="/admin/pasien" class="block px-4 py-2 rounded-lg hover:bg-blue-50">👥 Pasien</a>
                <a href="/pasien/dashboard" class="block px-4 py-2 rounded-lg hover:bg-green-50 text-green-600">👤 View as Pasien</a>
            </nav>
            <form method="POST" action="{{ route('logout') }}" class="mt-6 pt-6 border-t">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 rounded-lg hover:bg-red-50 text-red-600">
                    🚪 Logout
                </button>
            </form>
        </aside>
        <main class="flex-1 p-10">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>