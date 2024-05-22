{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div>
            <p>jumlah barang : {{ $jml_brg }}</p>
        </div> --}}

            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Barang
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jml_brg }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-boxes fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

              
                



                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Paket
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $jml_paket }}
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Pengajuan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jml_pengajuan }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pelanggan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $jml_pelanggan }}</div>
                                </div>
                                <div class="col-auto">
                                    <i  class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>




        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Content Row -->

            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pemasangan</h6>
                            {{-- <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div> --}}
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myChart" width="200" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pencabutan</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body text-center">
                            <div class="chart-area">
                                <canvas id="myPieChart" width="200" height="200"></canvas>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>



    {{-- <div class="w-1/3">
        <canvas id="myChart" width="100" height="100"></canvas>


    </div> --}}
    {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold">Welcome to Your Dashboard!</h1>
                    <p class="mt-4"> {{ __("You're logged in!") }}</p>
                    <!-- Tambahkan konten dashboard lainnya di sini sesuai kebutuhan -->
                </div>
            </div> --}}

    @push('script')
        <script>
            const getPengajuan = async () => {
                try {
                    const response = await axios.get('/dashboard/pengajuan');
                    const data = response.data;
                    let labels = [];
                    let counts = [];
                    data.forEach(element => {
                        console.log(element);
                        labels.push(element.bulan_pemasangan);
                        counts.push(element.jumlah_pengajuan);
                    });
                    console.log(labels);
                    console.log(counts);
                    var dataChart = {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Pemasangan',
                            data: counts,
                            borderWidth: 1
                        }]
                    };

                    // Membuat grafik menggunakan Chart.js
                    // var ctx = document.getElementById('myChart').getContext('2d');
                    // var myChart = new Chart(ctx, {
                    //     type: 'bar',
                    //     data: dataChart,
                    // });

                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: dataChart,
                        options: {
                            plugins: {
                                legend: {
                                    display: false
                                },
                                tooltip: {
                                    enabled: true
                                }
                            },
                            scales: {
                                x: {
                                    beginAtZero: true
                                },
                                y: {
                                    beginAtZero: true
                                }
                            },
                            animation: {
                                animateRotate: true,
                                animateScale: true
                            }
                        }
                    });

                    console.log(response.data);
                } catch (error) {
                    console.log(error);
                }
            }

            getPengajuan();
            // Data untuk grafik

            const getPencabutan = async () => {
                try {
                    const response = await axios.get('/dashboard/pencabutan');
                    const data = response.data;
                    let labels = [];
                    let counts = [];
                    data.forEach(element => {
                        console.log(element);
                        labels.push(element.bulan_pencabutan);
                        counts.push(element.jumlah_pencabutan);
                    });
                    console.log(labels);
                    console.log(counts);
                    var dataChart = {
                        labels: labels,
                        datasets: [{
                            label: 'Jumlah Pemutusan',
                            data: counts,
                            borderWidth: 1
                        }]
                    };

                    // Membuat grafik menggunakan Chart.js
                    //     var ctx = document.getElementById('myPieChart').getContext('2d');
                    //     var myPieChart = new Chart(ctx, {
                    //         type: 'pie',
                    //         data: dataChart,
                    //     });
                    //     console.log(response.data);
                    // } catch (error) {
                    //     console.log(error);
                    // }

                    var ctx = document.getElementById('myPieChart').getContext('2d');
                    var myPieChart = new Chart(ctx, {
                        type: 'pie',
                        data: dataChart,
                        options: {
                            animation: {
                                animateScale: true, // Aktifkan animasi scaling
                                animateRotate: true // Aktifkan animasi rotasi
                            }
                        }
                    });
                    console.log(response.data);
                } catch (error) {
                    console.log(error);
                }

            }

            getPencabutan();
        </script>
    @endpush
</x-app-layout>
