<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klinik - Layanan Kesehatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-white">
    <div class="min-h-screen flex flex-col items-center justify-center p-8">
        <div class="text-center max-w-2xl">
            <div class="mb-6">
                <svg class="w-24 h-24 mx-auto text-blue-600" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="48" height="48" rx="8" fill="#3B82F6"/>
                    <path d="M24 12C17.373 12 12 17.373 12 24C12 30.627 17.373 36 24 36C30.627 36 36 30.627 36 24C36 17.373 30.627 12 24 12ZM24 14C29.523 14 34 18.477 34 24C34 29.523 29.523 34 24 34C18.477 34 14 29.523 14 24C14 18.477 18.477 14 24 14Z" fill="white"/>
                    <path d="M24 18V30M18 24H30" stroke="white" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Selamat Datang di Klinik</h1>
            <p class="text-xl text-gray-600 mb-8">Layanan kesehatan terpercaya untuk keluarga Anda</p>
            
            <div class="flex gap-4 justify-center">
                <a href="/login" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium">
                    Login
                </a>
                <a href="/register" class="px-6 py-3 border-2 border-blue-600 text-blue-600 rounded-lg hover:bg-blue-50 font-medium">
                    Register
                </a>
            </div>
            
            <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-bold text-gray-800 mb-2">🏥 Booking Online</h3>
                    <p class="text-sm text-gray-600">Pesan jadwal konsultasi dengan mudah</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-bold text-gray-800 mb-2">🧾 Antrian Digital</h3>
                    <p class="text-sm text-gray-600">Cek status antrian secara real-time</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="font-bold text-gray-800 mb-2">📖 Rekam Medis</h3>
                    <p class="text-sm text-gray-600">Riwayat kesehatan tersimpan aman</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>