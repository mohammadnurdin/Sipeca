<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="flex justify-between items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pemasangan</h6>
                        <a href="{{ route('pengajuan.create') }}">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded-md flex items-center justify-center hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                <i class="fas fa-plus-circle mr-2"></i> Tambah
                            </button>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    {{-- <th scope="col" class="px-6 py-3">
                                Id Pelanggan
                            </th> --}}
                                    <th scope="col" class="px-6 py-3">
                                        Nama Pelanggan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Paket
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Bandwith
                                    </th>

                                    <th scope="col" class="px-6 py-3">
                                        Tanggal Pemasangan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama Pegawai
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        No Telpon
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengajuans as $no => $pengajuan)
                                    <tr
                                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no + 1 }}
                                        </th>
                                        {{-- <td class="px-6 py-4">
                                    {{ $pengajuan->pelanggan->id }}
                                </td> --}}
                                        <td class="px-6 py-4">
                                            <a href="{{ route('pengajuan.show', $pengajuan->id) }}">
                                                {{ $pengajuan->pelanggan->nama_pelanggan }}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $pengajuan->paket->nama_paket }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $pengajuan->paket->bandwith }}
                                        </td>

                                        <td class="px-6 py-4">
                                            {{ $pengajuan->tgl_pemasangan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $pengajuan->user->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $pengajuan->user->no_telp }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{-- {{ $pengajuan->status ? 'Proses' : 'On Proses' }} --}}
                                            @if ($pengajuan->status)
                                                <i class="fa-solid fa-check text-green-500"></i>
                                            @else
                                                <i class="fas fa-spinner text-yellow-500 mr-1"></i>
                                            @endif
                                        </td>

                                        <td class="px-6 py-4">
                                            <a href="{{ route('pengajuan.edit', $pengajuan->id) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}"
                                                method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
