<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="id_pelanggan" value="{{ $pengajuan->id_pelanggan }}">
                        {{-- <input type="hidden" name="nama_pelanggan" value="{{$pengajuan->nama_pelanggan}}"> --}}

                        <div>
                            <label for="id_pelanggan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pelanggan</label>
                            <input type="text" name="nama_pelanggan"
                                value="{{ $pengajuan->pelanggan->nama_pelanggan }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                        </div>


                        {{-- 
                        <div class="mb-5">
                            <label for="nama_pelanggan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Pelanggan</label>
                            <select class="form-select" name="id_pelanggan" id="id_pelanggan" value="{{$pengajuan->id_pelanggan}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autofocus>
                                @forelse ($pelanggan as $plg)
                                    <option value="{{ $plg->id }}">{{ $plg->nama_pelanggan }}</option>
                                @empty
                                    <option value="0">Tidak Ada</option>
                                @endforelse
                            </select>                        
                        </div> --}}
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

                        {{-- <div class="mb-3">
                            <label for="paket"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paket</label>
                            <select id="paket" name="paket"
                                class="form-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                                <option value="{{ $pengajuan->paket }}">{{ $pengajuan->paket }}</option>
                                <option value="Paket Hemat 1">Paket Hemat 1</option>
                                <option value="Paket Hemat 2">Paket Hemat 2</option>
                                <option value="Paket Bisnis">Paket Bisnis</option>
                            </select>
                            <span id="paket_error" class="text-danger"></span>
                        </div> --}}


                        <div class="mb-5">
                            <label for="tgl_pemasangan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Pemasangan</label>
                            <input type="date" id="tgl_pemasangan" name="tgl_pemasangan"
                                value="{{ $pengajuan->tgl_pemasangan }}"
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







                        {{-- <input type="hidden" name="id_pelanggan" value="{{$pengajuan->id_pelanggan}}">
                        <input type="hidden" name="nama_pelanggan" value="{{$pengajuan->nama_pelanggan}}">
                        <div>
                            <label for="paket">paket</label>
                            <select class="form-select" id="paket" name="paket" required autofocus>
                                <option value="{{$pengajuan->paket}}">{{$pengajuan->paket}}</option>
                                <option value="Paket Hemat 1">Paket Hemat 1</option>
                                <option value="Paket Hemat 2">Paket Hemat 2</option>
                                <option value="Paket Bisnis">Paket Bisnis</option>
                                </select>                        
                            </div>
                        <div>
                            <label for="tgl_pemasangan">Tanggal Pemasangan</label>
                            <input value="{{$pengajuan->tgl_pemasangan}}" type="date" id="tgl_pemasangan" name="tgl_pemasangan" required autofocus>
                        </div>
                        <div>
                            <label for="id_pegawai">Nama Pegawai</label>
                            <select name="id_pegawai" id="id_pegawai">
                                @forelse ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @empty
                                    <option value="0">Tidak Ada</option>
                                @endforelse
                            </select>
                        </div>
                        @if (Auth::user()->role == 'A' || Auth::user()->role == 'C')
                        <div>
                            <label for="status">Status</label>
                            <select id="status" name="status" required>
                                <option value="1">Proses</option>
                                <option value="0">On Proses</option>
                                </select>                          
                            </div>
                        @endif
                       --}}
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
