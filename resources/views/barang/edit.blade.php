<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                   
                        <div class="mb-5">
                            <label for="nama_barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                            <input type="text" id="nama_barang" name="nama_barang" value="{{$barang->nama_barang}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autofocus>
                        </div>
                        <div class="mb-5">
                            <label for="qty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty</label>
                            <input type="text" id="qty" name="qty" value="{{$barang->qty - $qty}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autofocus>
                        </div>
                        <div class="mb-5">
                            <label for="satuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Barang</label>
                            <input type="text" id="satuan" name="satuan" value="{{$barang->satuan}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autofocus>
                        </div>
                        <div class="mb-5">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select id="status" name="status" value="{{$barang->status}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autofocus>
                                <option value="1">Ada</option>
                                <option value="0">Tidak Ada</option>
                            </select>
                            <span id="status_error" class="text-danger"></span>
                        </div>

                        <button type="submit" class="flex items-center justify-center bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                            <i class="fas fa-check-circle mr-2"></i>Submit
                        </button>
                                        </form>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
