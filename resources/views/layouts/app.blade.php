<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
        <!-- trix editor -->
        <link rel="stylesheet" href="{{ asset('assets/trix/trix.css') }}">
        <script type="text/javascript" src="{{ asset('assets/trix/trix.js') }}"></script>
        <style>
            .trix-button--icon-attach{ display: none;}
        </style>
    </head>
    <body>
       
        <!-- untuk navbar -->
       @include('partials.navbaradmin')
        <!-- isi content -->

                    <!-- Page Content -->
                    <main>
                        {{ $slot }}
                    </main>
        <footer>
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