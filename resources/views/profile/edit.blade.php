<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto p-8">
        <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>

        @if(session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                Profile updated successfully!
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" class="bg-white p-6 rounded-2xl shadow space-y-4">
            @csrf
            @method('patch')

            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border rounded-md p-2">
                @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border rounded-md p-2">
                @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            @if($pasien)
            <hr class="my-4">

            <h2 class="text-lg font-semibold mb-3">Data Pasien</h2>

            <div>
                <label class="block text-sm font-medium text-gray-700">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $pasien->nik) }}" class="mt-1 block w-full border rounded-md p-2">
                @error('nik') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" class="mt-1 block w-full border rounded-md p-2">
                @error('tanggal_lahir') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="mt-1 block w-full border rounded-md p-2">
                    <option value="L" {{ $pasien->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $pasien->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" class="mt-1 block w-full border rounded-md p-2">{{ old('alamat', $pasien->alamat) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">No. Telepon</label>
                <input type="text" name="no_telp" value="{{ old('no_telp', $pasien->no_telp) }}" class="mt-1 block w-full border rounded-md p-2">
            </div>
            @endif

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</body>
</html>