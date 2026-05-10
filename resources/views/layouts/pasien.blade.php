@php use Illuminate\Support\Facades\Auth; @endphp
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg p-6">
        <h2 class="text-xl font-bold text-blue-600 mb-6">Klinik Pasien</h2>

        <nav class="space-y-3">
            <a href="/pasien/dashboard" class="block px-4 py-2 rounded-lg hover:bg-blue-50">🏠 Dashboard</a>
            <a href="/pasien/booking" class="block px-4 py-2 rounded-lg hover:bg-blue-50">📅 Booking Jadwal</a>
            <a href="/pasien/antrian" class="block px-4 py-2 rounded-lg hover:bg-blue-50">🧾 Status Antrian</a>
            <a href="/pasien/riwayat" class="block px-4 py-2 rounded-lg hover:bg-blue-50">📖 Riwayat Konsultasi</a>
            <a href="/profile" class="block px-4 py-2 rounded-lg hover:bg-blue-50">👤 Profile</a>
            @if(Auth::user()->email === 'admin@clinic.com')
            <a href="/admin/dashboard" class="block px-4 py-2 rounded-lg hover:bg-purple-50 text-purple-600">⚙️ Admin Panel</a>
            @endif
        </nav>

        <form method="POST" action="{{ route('logout') }}" class="mt-6 pt-6 border-t">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 rounded-lg hover:bg-red-50 text-red-600">
                🚪 Logout
            </button>
        </form>
    </aside>

    <!-- CONTENT -->
    <main class="flex-1 p-10">
        @yield('content')
    </main>

</div>

</body>
</html>