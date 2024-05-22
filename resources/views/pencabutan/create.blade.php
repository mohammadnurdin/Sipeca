<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pencabutan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('pencabutan.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="id_pengajuan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Pengajuan</label>
                            <select name="id_pengajuan" id="id_pengajuan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                                @forelse ($pengajuan as $png)
                                    <option value="{{ $png->id }}">{{ $png->id }}</option>
                                @empty
                                    <option value="0">Tidak Ada</option>
                                @endforelse
                            </select>
                        </div>
                        <div>
                            <label for="nama_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pelanggan</label>
                            <select name="id_pelanggan" id="id_pelanggan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                                @forelse ($pelanggan as $plg)
                                    <option value="{{ $plg->id }}">{{ $plg->nama_pelanggan }}</option>
                                @empty
                                    <option value="0">Tidak Ada</option>
                                @endforelse
                            </select>
                        </div>
                        <div>
                            <label for="id_paket"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paket</label>
                            <select name="id_paket" id="id_paket"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                                @forelse ($paket as $pkt)
                                    <option value="{{ $pkt->id }}">{{ $pkt->nama_paket }}</option>
                                @empty
                                    <option value="0">Tidak Ada</option>
                                @endforelse
                            </select>
                        </div>

                        {{-- <div>
                            <label for="paket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paket</label>
                            <select id="paket" name="paket" class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autofocus>
                                <option value="">Pilih Paket</option>
                                <option value="Paket Hemat 1">Paket Hemat 1</option>
                                <option value="Paket Hemat 2">Paket Hemat 2</option>
                                <option value="Paket Bisnis">Paket Bisnis</option>
                            </select>
                        </div> --}}


                        <div>
                            <label for="tgl_pencabutan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Pencabutan</label>
                            <input type="date" id="tgl_pencabutan" name="tgl_pencabutan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                        </div>

                        <div>
                            <label for="id_pegawai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pegawai</label>
                            <select name="id_pegawai" id="id_pegawai"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                                @forelse ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @empty
                                    <option value="0">Tidak Ada</option>
                                @endforelse
                            </select>
                        </div>

                        <div>
                            <label for="alasan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alasan</label>
                            <input type="text" id="alasan" name="alasan"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                        </div>

                        <div>
                            <label for="status"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select id="status" name="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                                <option value="1">Accepted</option>
                                <option value="0">Proses</option>
                            </select>
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
