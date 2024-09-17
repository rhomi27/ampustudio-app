@extends('layout.layout')
@section('content')
    @include('layout.modal.modal')
    @include('layout.sidebar.side')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <!-- Canvas for the Chart -->
            <canvas id="myChart" width="400" height="200"></canvas>

            <!-- Table for the Sales Data -->
            <table class="min-w-full mt-4 border-collapse">
                <thead>
                    <tr>
                        <th class="border text-black border-gray-300 p-2">Nama Penyewa</th>
                        <th class="border text-black border-gray-300 p-2">Nama Produk</th>
                        <th class="border text-black border-gray-300 p-2">Tanggal Transaksi</th>
                        <th class="border text-black border-gray-300 p-2">Total Biaya</th>
                        <th class="border text-black border-gray-300 p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr>
                            <td class="border text-black border-gray-300 p-2">{{ $item->name_customer }}</td>
                            <td class="border text-black border-gray-300 p-2">{{ $item->product->name }}</td>
                            <td class="border text-black border-gray-300 p-2">{{ $item->created_at }}</td>
                            <td class="border text-black border-gray-300 p-2">{{ $item->total_biaya }}</td>
                            <td class="border text-black border-gray-300 p-2"><button
                                    class="bg-blue-500 p-1 px-2 rounded-md text-white">Detail</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/node_modules/flowbite/dist/flowbite.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
    
        // Data dari backend
        var labels = @json($labels); 
        var data = @json($data);     
        var myChart = new Chart(ctx, {
            type: 'bar', 
            data: {
                labels: labels, 
                datasets: [{
                    label: 'Sales Data',
                    data: data, 
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
