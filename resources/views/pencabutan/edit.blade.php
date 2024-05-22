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
                    <form action="{{ route('pencabutan.update', $pencabutan->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="id_pengajuan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Id Pengajuan</label>
                            <input type="text" name="id_pengajuan" value="{{ $pencabutan->id_pengajuan }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                        </div>

                        <input type="hidden" name="id_pelanggan" value="{{ $pencabutan->id_pelanggan }}">

                        <div>
                            <label for="id_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pelanggan</label>
                            <input type="text" name="nama_pelanggan"
                                value="{{ $pencabutan->pelanggan->nama_pelanggan }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                        </div>

                        {{-- <div>
    <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pelanggan</label>
    <select name="id_pelanggan" id="id_pelanggan" value="{{$pencabutan->pelanggan->id}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autofocus>
        @forelse ($pelanggan as $plg)
            <option value="{{$plg->id}}">{{$plg->nama_pelanggan}}</option>
        @empty
            <option value="0">Tidak Ada</option>
        @endforelse
    </select>
</div> --}}
                        <input type="hidden" name="id_paket" value="{{ $pencabutan->id_paket }}">


                        <div class="mb-5">
                            <label for="tgl_pencabutan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Pencabutan</label>
                            <input type="date" id="tgl_pencabutan" name="tgl_pencabutan"
                                value="{{ $pencabutan->tgl_pencabutan }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                        </div>

                        <div>
                            <label for="id_pegawai"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pegawai</label>
                            <select name="id_pegawai" id="id_pegawai"
                                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
                            <input type="text" id="alasan" name="alasan" value="{{ $pencabutan->alasan }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                        </div>

                        @if (Auth::user()->role == 'A' || Auth::user()->role == 'C')
                            <div class="mb-5">
                                <label for="status"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select id="status" name="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required autofocus>
                                    <option value="1">Accepted</option>
                                    <option value="0">Proses</option>
                                </select>
                                <span id="status_error" class="text-danger"></span>
                            </div>
                        @endif

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
