<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $jurusan }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    @include('navbar')

    <!-- Header -->
    <section class="flex w-full items-center justify-center px-4 md:px-0">
        <div class="bg-base-300 rounded-2xl shadow-xl p-10 mb-10 w-full max-w-screen-lg">
            <h1 class="text-3xl font-bold text-center">Statistik Alumni {{ $jurusan }}</h1>
        </div>
    </section>

    <!-- Main Content -->
    <section class="flex flex-col w-full bg-base-100 items-center justify-center px-4 md:px-0">
        <!-- Perbandingan Berdasarkan Jenis Kelamin (Card) -->
        <div class="card w-full max-w-screen-lg bg-base-300 shadow-xl mb-10 p-6 rounded-lg">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-4">Perbandingan Jumlah Alumni Berdasarkan Jenis
                Kelamin</h2>
            <div id="genderChart" class="w-full" style="height: 400px;"></div>
        </div>

        <!-- Perbandingan Berdasarkan Tahun Lulus (Card) -->
        <div class="card w-full max-w-screen-lg bg-base-300 shadow-xl mb-10 p-6 rounded-lg">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-4">Perbandingan Jumlah Alumni Berdasarkan Tahun
                Lulus</h2>
            <div id="yearChart" class="w-full" style="height: 400px;"></div>
        </div>
    </section>

    <!-- Footer -->
    @include('footer')

    <!-- Chart Script -->
    <script>
        // Data dummy untuk jenis kelamin
        const genderData = [{
                name: 'Laki-laki',
                y: 60,
                color: '#4F46E5'
            },
            {
                name: 'Perempuan',
                y: 40,
                color: '#EC4899'
            }
        ];

        // Data dummy untuk tahun lulus
        const yearData = [{
                name: '2020',
                y: 20,
                color: '#4F46E5'
            },
            {
                name: '2021',
                y: 30,
                color: '#4F46E5'
            },
            {
                name: '2022',
                y: 25,
                color: '#4F46E5'
            },
            {
                name: '2023',
                y: 15,
                color: '#4F46E5'
            }
        ];

        // Konversi data dari PHP ke format Highcharts
        // const genderDataFromPHP = @json($jenisKelamin);
        // const genderData = genderDataFromPHP.map(item => ({
        //     name: item.jenis_kelamin,
        //     y: parseInt(item.jumlah), // Pastikan jumlah diubah ke integer
        //     color: item.jenis_kelamin === 'Laki-laki' ? '#4F46E5' : '#EC4899'
        // }));

        // const yearDataFromPHP = @json($tahunLulus);
        // const yearData = yearDataFromPHP.map(item => ({
        //     name: item.tahun_lulus,
        //     y: parseInt(item.jumlah),
        //     color: '#4F46E5' // Bisa menyesuaikan warna sesuai kebutuhan
        // }));

        // Fungsi untuk inisialisasi pie chart
        function createPieChart(renderTo, seriesName, data) {
            Highcharts.chart(renderTo, {
                chart: {
                    type: 'pie',
                    backgroundColor: 'rgba(255, 255, 255, 0)', // Set background transparent
                },
                title: {
                    text: null // Remove the title
                },
                credits: {
                    enabled: false
                }, // Remove branding
                tooltip: {
                    enabled: true
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: seriesName,
                    data: data
                }]
            });
        }

        // Fungsi untuk inisialisasi bar chart vertikal
        function createBarChart(renderTo, seriesName, data) {
            Highcharts.chart(renderTo, {
                chart: {
                    type: 'column',
                    backgroundColor: 'rgba(255, 255, 255, 0)' // Set background transparent
                },
                title: {
                    text: null // Remove the title
                },
                credits: {
                    enabled: false
                }, // Remove branding
                xAxis: {
                    categories: data.map(item => item.name),
                    title: {
                        text: 'Tahun Lulus'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah Alumni'
                    }
                },
                tooltip: {
                    shared: true
                },
                plotOptions: {
                    column: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: [{
                    name: seriesName,
                    data: data.map(item => item.y),
                    colorByPoint: true,
                    colors: data.map(item => item.color)
                }]
            });
        }

        // Inisialisasi Chart
        createPieChart('genderChart', 'Jumlah Alumni', genderData);
        createBarChart('yearChart', 'Jumlah Alumni', yearData);
    </script>
</body>

</html>
