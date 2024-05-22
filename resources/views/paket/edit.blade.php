<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Paket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('paket.update', $paket->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-5">
                            <label for="nama_paket"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Paket</label>
                            <input type="text" id="nama_paket" name="nama_paket" value="{{ $paket->nama_paket }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                        </div>
                        <div class="mb-5">
                            <label for="bandwith"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bandwitht</label>
                            <input type="text" id="bandwith" name="bandwith" value="{{ $paket->bandwith }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                        </div>
                        <div class="mb-5">
                            <label for="harga"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                            <input type="text" id="harga" name="harga" value="{{ $paket->harga }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                        </div>
                        <div class="mb-5">
                            <label for="jenis_paket"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Paket</label>
                            <select id="jenis_paket" name="jenis_paket"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                                <option value="Fiber">Fiber</option>
                                <option value="ADSL">ADSL</option>
                            </select>
                            <span id="jenis_paket_error" class="text-danger"></span>
                        </div>


                        <button type="submit"
                            class="flex items-center justify-center bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                            <i class="fas fa-check-circle mr-2"></i>Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
