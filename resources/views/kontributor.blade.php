<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontributor</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    @include('navbar')

    <!-- Header -->
    <section class="flex flex-row mx-auto w-[90%]">
        <div class="w-full bg-base-300 rounded-2xl shadow-xl p-10 mb-10">
            <h1 class="text-3xl font-bold text-center">Kontributor Kami</h1>
        </div>
    </section>

    <!-- Main Content -->
    <section class="flex flex-col items-center justify-center mx-auto w-[90%]">
        <div class="bg-base-100">
            <!-- List Kontributor -->
            <div class="flex flex-col md:flex-row gap-6 w-full bg-base-300 shadow-xl p-6 rounded-lg mb-10">
                <!-- Kontributor 1 -->
                <div class="flex flex-col justify-evenly items-center bg-base-100 rounded-lg shadow-lg p-4">
                    <img src="{{ asset('img/person.svg') }}" alt="Foto Kontributor"
                        class="rounded-full w-24 md:w-32 lg:w-40 mb-4">
                    <h3 class="text-xl font-semibold text-center">Yusuf Anggara, S.Kom</h3>
                    <p class="text-center">Kepala Jurusan Rekayasa Perangkat Lunak</p>
                </div>
                <!-- Kontributor 2 -->
                <div class="flex flex-col justify-evenly items-center bg-base-100 rounded-lg shadow-lg p-4">
                    <img src="{{ asset('img/person.svg') }}" alt="Foto Kontributor"
                        class="rounded-full w-24 md:w-32 lg:w-40 mb-4">
                    <h3 class="text-xl font-semibold text-center">Yogi Aprilian, S.Kom</h3>
                    <p class="text-center">Kepala Manajemen IT SMK Swadhipa 2 Natar</p>
                </div>
                <!-- Kontributor 3 -->
                <div class="flex flex-col justify-evenly items-center bg-base-100 rounded-lg shadow-lg p-4">
                    <img src="{{ asset('img/person.svg') }}" alt="Foto Kontributor"
                        class="rounded-full w-24 md:w-32 lg:w-40 mb-4">
                    <h3 class="text-xl font-semibold text-center">Yanuar Prayogi, S. Pd</h3>
                    <p class="text-center">Kepala Tata Usaha SMK Swadhipa 2 Natar</p>
                </div>
                <!-- Kontributor 4 -->
                <div class="flex flex-col justify-evenly items-center bg-base-100 rounded-lg shadow-lg p-4">
                    <img src="{{ asset('img/person.svg') }}" alt="Foto Kontributor"
                        class="rounded-full w-24 md:w-32 lg:w-40 mb-4">
                    <h3 class="text-xl font-semibold text-center">Dzulkifli Anwar</h3>
                    <p class="text-center">Murid magang</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('footer')

</body>

</html>
