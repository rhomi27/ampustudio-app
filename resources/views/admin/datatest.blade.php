@extends('layout.layout')
@section('content')
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="flex">
            <div class="w-1/4 bg-blue-600 text-white h-screen p-4">
                <h2 class="text-xl font-bold mb-4">Admin AmpuStudio</h2>
                <ul>
                    <li class="mb-2"><a href="/halamanadmin" class="block p-2 bg-blue-700 rounded">Data Penjualan</a></li>
                    </li>
                    <li class="mb-2"><a href="/halamandataproduk" class="block p-2 bg-blue-700 rounded">Data Produk</a>
                    </li>
                    <li class="mb-2"><a href="/kontakedit" class="block p-2 bg-blue-700 rounded">Kontak Edit</a></li>
                </ul>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-8">
                <div class="flex justify-between items-center mb-4">
                    <h1 class="text-2xl font-bold">Data Produk</h1>
                    <a href="/tambahproduk" class="bg-purple-600 text-white py-2 px-4 rounded">Tambah Produk</a>
                </div>

                <!-- Search Bar -->
                <div class="mb-4">
                    <input type="text" placeholder="Search" class="w-full p-2 border border-gray-500 rounded">
                </div>

                <!-- Product Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full border-b-slate-300 text-left">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b  border-b-slate-300">Nama Produk</th>
                                <th class="py-2 px-4 border-b  border-b-slate-300">Kode Produk</th>
                                <th class="py-2 px-4 border-b  border-b-slate-300">Spesifikasi</th>
                                <th class="py-2 px-4 border-b  border-b-slate-300">Stok</th>
                                <th class="py-2 px-4 border-b  border-b-slate-300">Harga</th>
                                <th class="py-2 px-4 border-b  border-b-slate-300">Merk</th>
                                <th class="py-2 px-4 border-b  border-b-slate-300">Deskripsi</th>
                                <th class="py-2 px-4 border-b  border-b-slate-300">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produk as $item)
                                <!-- Example Row -->
                                <tr>
                                    <td class="font-medium text-gray-800-whitespace-nowrap dark:text-white">
                                        {{ $item->name }}</td>
                                    <td>{{ $item->kode_produk }}</td>
                                    <td>{{ $item->stok }}</td>
                                    <td>{{ number_format($item->harga, 0, ',', ',') }}</td>
                                    <td>{{ $item->spesifikasi }}</td>
                                    <td>{{ $item->merk }}</td>
                                    <td class="line-clamp-2">{{ $item->deskripsi }}</td>
                                    <td>

                                    <div class="flex glap-2">
                                        <a href="" class="bg-blue-500 p-1 px-2 rounded-md text-white"> Detail</a>
                                        <a href="/admin/produkedit={{ $item->id }}" class="bg-green-500 p-1 px-2 rounded-md text-white">Edit</a>
                                        <form id="delete-form-{{ $item->id }}"
                                            action="/deleteproduk/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $item->id }})"
                                                class="bg-red-500 p-1 px-2 rounded-md text-white">Hapus</button>
                                        </form>
                                    </div>

                                    </td>
                                </tr>
                            @endforeach
                            <!-- Add more rows as needed -->
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        @push('script')
            <script src="{{ asset('js/sweetalert.js') }}"></script>
            <script>
                function confirmDelete(id) {
                    Swal.fire({
                        title: 'Hapus Produk!',
                        text: 'Apakah Anda Yakin?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus Ini!',
                        cancelButtonText: 'Tidak, Batalkan'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById('delete-form-' + id).submit();
                        }
                    });
                }
            </script>
        @endpush
    @endsection