<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

                <!-- Primary Meta Tags -->
        <meta name="title" content="Fokusin Belajar - Pelajaran yang dipersonalisasi">
        <meta name="description" content="Pengguna dapat belajar sesuka hati, belajar secara mandiri, dan memilih mata pelajaran yang disukai">

        <!--SEO buat di Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://fokusinbelajar.ga/">
        <meta property="og:title" content="Fokusin Belajar - Pelajaran yang dipersonalisasi">
        <meta property="og:description" content="Pengguna dapat belajar sesuka hati, belajar secara mandiri, dan memilih mata pelajaran yang disukai">
        <meta property="og:image" content="{{ asset('assets/img/fokusinbelajarsmall.png')}}">

        <!-- ini SEO buat di Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://fokusinbelajar.ga/">
        <meta property="twitter:title" content="Fokusin Belajar - Pelajaran yang dipersonalisasi">
        <meta property="twitter:description" content="Pengguna dapat belajar sesuka hati, belajar secara mandiri, dan memilih mata pelajaran yang disukai">
        <meta property="twitter:image" content="{{ asset('assets/img/fokusinbelajarsmall.png')}}">
        <title>{!! config('app.name') .' | '. $title  !!}</title>
        <!-- icon -->
        <link rel="icon" href="{{ asset('assets/img/fokusinbelajarsmall.png')}}">
        <!-- css style -->
        <link rel="stylesheet" href="{{ asset('style.css') }}">
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

    </head>
    <body>
       
        <!-- untuk navbar -->
       @include('partials.navbarguest')
        <!-- isi content -->

                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
        <footer>
            <div class="grid md:grid-flow-col bg-gray-600">
                <div class="ml-8 mt-2"><img src="{{ asset('assets/img/footer.png')}}" class="object-contain md:object-scale-down" alt="logo" width="200" height="50" style="display: block; margin-left: auto; margin-right: auto; margin-top: 30px;">
                </div>
                <div class="m-8">
                    <div class="mx-5 my-2 text-justify text-white">
                        <p><b>Fokusin Belajar</b> awalnya hanyalah sebuah website yang dibentuk untuk menyelesaikan tugas sekolah
                            oleh
                            para pendirinya sebagai salah satu syarat kelulusan.
                            Pada September tahun 2020, website ini resmi dipublikasikan. Dengan tujuan membantu para pelajar lain
                            mencari
                            materi belajar yang berkualitas.
                            <br>
                            <br>
                            Namun seiring berjalannya waktu website <b>Fokusin Belajar</b> kini semakin berkembang hingga saat ini.
                        </p>
                    </div>
                </div>
                <div class="m-8">
                    <p class=" text-3xl font-sans text-white my-1">Contact & Social</p>
                    <ul>
                        <li>
                            <a href="mailto:fokusinbelajar@gmail.com" target="_blank" class="text-green-500 no-underline hover:text-white hover:no-underline transition duration-200">Email</a>
                        </li>
                        <li>
                            <a href="https://web.facebook.com/fokusinbelajar/" target="_blank" class="text-green-500 no-underline hover:text-white hover:no-underline transition duration-200">Facebook</a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCZ2TRTXnPCs2SHaEkO_jUlA" target="_blank" class="text-green-500 no-underline hover:text-white hover:no-underline transition duration-200">Youtube</a>
                        </li>
                    </ul>
                </div>
            </div>
            <p class="text-center bg-gray-700 text-white py-4 font-mono"> &copy;2021 Fokusin Belajar Team</p>
        </footer>
        <script>
            //Javascript to toggle the menu
            document.getElementById('nav-toggle').onclick = function() {
                document.getElementById("nav-content").classList.toggle("hidden");
            }
        </script>
    </body>

    </html>