<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Promo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('promo.store') }}" method="POST">
                        @csrf

                        <div class="mb-5">
                            <label for="nama_paket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paket</label>
                            <select name="id_paket" id="id_paket" class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autofocus>
                                @forelse ($paket as $pkt)
                                    <option value="{{ $pkt->id }}">{{ $pkt->nama_paket }}</option>
                                @empty
                                    <option value="0">Tidak Ada</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="diskon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dikson</label>
                            <input type="integer" id="diskon" name="diskon"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                        </div>
                        <div class="mb-5">
                            <label for="expired"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expired</label>
                            <input type="date" id="expired" name="expired"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
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
