<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="nik" :value="__('NIK')" />
            <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')" required maxlength="16" />
            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="tanggal_lahir" :value="__('Tanggal Lahir')" />
            <x-text-input id="tanggal_lahir" class="block mt-1 w-full" type="date" name="tanggal_lahir" :value="old('tanggal_lahir')" required />
            <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
            <select id="jenis_kelamin" name="jenis_kelamin" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <x-input-error :messages="$errors->get('jenis_kelamin')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <textarea id="alamat" name="alamat" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" rows="2">{{ old('alamat') }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="no_telp" :value="__('No. Telepon')" />
            <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')" maxlength="20" />
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>