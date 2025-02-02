<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DetailPengajuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Pelanggan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga Awal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Diskon
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pengajuan->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $pengajuan->pelanggan->nama_pelanggan }}

                            </td>
                            <td class="px-6 py-4">
                                {{ $pengajuan->paket->harga }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $detailpromo->promo->diskon ?? 0 }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pengajuan->paket->harga - ($detailpromo->promo->diskon ?? 0) }}
                            </td>


                            </form>
                    </tbody>
                    {{-- <ul>
                        <li>
                            No {{ $pengajuan->id }}
                        </li>
                        <li>Nama Pelanggan
                            {{ $pengajuan->pelanggan->nama_pelanggan }}
                        </li>
                        <li>Harga Awal{{ $pengajuan->paket->harga }}
                        </li>
                        <li>Diskon
                            {{ $detailpromo->promo->diskon ?? 0 }}
                        </li>
                        <li>
                            Jumlah {{ $pengajuan->paket->harga - ($detailpromo->promo->diskon ?? 0) }}
                        </li>
                    </ul> --}}
                </table>
            </div>


            <div class="mt-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <form action="{{ route('detailpengajuan.store') }}" method="POST">
                        @csrf
                        <div class="flex items-center">
                            <input type="hidden" name="id_pengajuan" value="{{ $pengajuan->id }}">

                            <select name="id_barang" id="id_barang"
                                class="flex-1 bg-gray-50 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autofocus>
                                @forelse ($barang as $brg)
                                    <option value="{{ $brg->id }}">{{ $brg->nama_barang }}</option>
                                @empty
                                    <option value="0">Tidak Ada</option>
                                @endforelse
                            </select>

                            <input type="number" name="qty">

                            <button type="submit"
                                class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md flex items-center justify-center hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                <i class="fas fa-plus-circle mr-2"></i> Tambah
                            </button>
                        </div>
                    </form>
                    <div class="overflow-x-auto shadow-md sm:rounded-lg mt-4">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">No Transaksi</th>
                                    <th scope="col" class="px-6 py-3">Nama Barang</th>

                                    <th scope="col" class="px-6 py-3">QTy</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($detail as $no => $dtl)
                                    <tr
                                        class="{{ $no % 2 === 0 ? 'bg-gray-50 dark:bg-gray-800' : 'bg-white dark:bg-gray-900' }} border-b dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $no + 1 }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $dtl->id_pengajuan }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $dtl->barang->nama_barang }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $dtl->qty }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('detailpengajuan.destroy', $dtl->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-600 focus:outline-none">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4">Kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

</x-app-layout>
