<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    @include('navbar')

    <!-- Hero -->
    <section class="relative bg-cover bg-center text-white py-52"
        style="background-image: url('{{ asset('img/sekolah.jpg') }}');">
        <div class="absolute inset-0 bg-black/50 z-10"></div>
        <div class="relative z-20 container mx-auto text-center px-4">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">Selamat Datang di Web Data Alumni</h1>
            <p class="text-base md:text-lg lg:text-xl mb-6">Hubungkan masa lalu dengan masa depan. Jelajahi dan tetap
                terhubung dengan sesama alumni.</p>
            <div class="flex flex-col sm:w-[80%] md:w-[60%] lg:w-[40%] mx-auto justify-center gap-y-4">
                <a href="{{ route('data-alumni') }}"
                    class="btn btn-outline btn-light text-white border-white hover:bg-white hover:text-black rounded-full">Lihat
                    Semua Alumni</a>
                <a href="#"
                    class="btn btn-outline btn-light text-white border-white hover:bg-white hover:text-black rounded-full">Gabung
                    Grup Telegram</a>
            </div>
        </div>
    </section>

    <!-- Jurusan -->
    <section class="my-10">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold mb-4 text-center">Jurusan</h2>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <div onclick="window.location.href='{{ route('rpl') }}'"
                    class="flex flex-col items-center justify-center w-full sm:basis-1/2 md:basis-1/3 lg:basis-1/5 bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer">
                    <img src="{{ asset('img/rpl.png') }}" alt="Icon" class="my-4 h-32 mx-auto">
                    <p class="group-hover:text-black font-bold text-center">Rekayasa Perangkat Lunak</p>
                </div>
                <div onclick="window.location.href='{{ route('tkj') }}'"
                    class="flex flex-col items-center justify-center w-full sm:basis-1/2 md:basis-1/3 lg:basis-1/5 bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer">
                    <img src="{{ asset('img/tkj.png') }}" alt="Icon" class="my-4 h-32 mx-auto">
                    <p class="group-hover:text-black font-bold text-center">Teknik Komputer dan Jaringan</p>
                </div>
                <div onclick="window.location.href='{{ route('titl') }}'"
                    class="flex flex-col items-center justify-center w-full sm:basis-1/2 md:basis-1/3 lg:basis-1/5 bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer">
                    <img src="{{ asset('img/titl.png') }}" alt="Icon" class="my-4 h-32 mx-auto">
                    <p class="group-hover:text-black font-bold text-center">Teknik Instalasi Tenaga Listrik</p>
                </div>
                <div onclick="window.location.href='{{ route('tkr') }}'"
                    class="flex flex-col items-center justify-center w-full sm:basis-1/2 md:basis-1/3 lg:basis-1/5 bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer">
                    <img src="{{ asset('img/tkr.png') }}" alt="Icon" class="my-4 h-32 mx-auto">
                    <p class="group-hover:text-black font-bold text-center">Teknik Kendaraan Ringan</p>
                </div>
                <div onclick="window.location.href='{{ route('tbsm') }}'"
                    class="flex flex-col items-center justify-center w-full sm:basis-1/2 md:basis-1/3 lg:basis-1/5 bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer">
                    <img src="{{ asset('img/tbsm.png') }}" alt="Icon" class="my-4 h-32 mx-auto">
                    <p class="group-hover:text-black font-bold text-center">Teknik Bisnis dan Sepeda Motor</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Jumlah Alumni Berdasarkan Tahun Lulus -->
    <section class="container mx-auto px-6">
        <div class="card w-full mx-auto bg-base-300 rounded-lg shadow-xl mb-10 p-6">
            <h2 class="text-2xl md:text-3xl font-bold text-center mb-4"> Jumlah Alumni Berdasarkan Tahun
                Lulus
            </h2>
            <div id="yearChart" class="w-full" style="height: 400px;"></div>
        </div>
    </section>

    <!-- Footer -->
    @include('footer')

    <!-- Highcharts CDN -->
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <!-- Chart Script -->
    <script>
        const yearDataFromPHP = @json($tahunLulus);
        const yearData = yearDataFromPHP.map(item => ({
            name: item.tahun_lulus,
            y: parseInt(item.jumlah),
            color: '#2CAFFE' // Bisa menyesuaikan warna sesuai kebutuhan
        }));

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
                    data: data
                }]
            });
        }

        // Panggil fungsi chart setelah Highcharts dimuat
        createBarChart('yearChart', 'Jumlah Alumni', yearData);
    </script>
</body>

</html>
