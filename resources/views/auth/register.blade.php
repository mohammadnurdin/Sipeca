<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->


        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
{{-- 
        <div>
            <x-input-label for="jk" :value="__('Jenis Kelamin')" />
            <x-text-input id="jk" class="block mt-1 w-full" type="text" name="jk" :value="old('jk')" required autofocus autocomplete="jk" />
            <x-input-error :messages="$errors->get('jk')" class="mt-2" />
        </div> --}}

        <div>
            <x-input-label for="jk" :value="__('Jenis Kelamin')" />
            <div class="mt-1">
                <input type="radio" id="jk" name="jk" value="1" :checked="old('jk') === 'Laki-laki'" required autofocus />
                <label for="jk">Laki-laki</label>
        
                <input type="radio" id="jk" name="jk" value="0" :checked="old('jk') === 'Perempuan'" required />
                <label for="jk">Perempuan</label>
            </div>
            <x-input-error :messages="$errors->get('jk')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required autofocus autocomplete="alamat" />
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="no_telp" :value="__('No Telpon')" />
            <x-text-input id="no_telp" class="block mt-1 w-full" type="text" name="no_telp" :value="old('no_telp')" required autofocus autocomplete="no_telp" />
            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
        </div>

        

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

<!-- Confirm Password -->
<div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="role" :value="__('Role')" />
            <x-text-input id="role" class="block mt-1 w-full" type="text" name="role" :value="old('role')" required autofocus autocomplete="role" />
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="status" :value="__('Status')" />
            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" :value="old('status')" required autofocus autocomplete="status" />
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>
        
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
