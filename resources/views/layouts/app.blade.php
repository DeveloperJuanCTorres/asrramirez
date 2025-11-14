<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ASR') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <?php
        $version = '1993.0.2';
    ?>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logos/16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('logos/32x32.png') }}">
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('logos/48x48.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('logos/64x64.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('logos/96x96.png') }}">
    <link rel="icon" type="image/png" sizes="128x128" href="{{ asset('logos/128x128.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('logos/192x192.png') }}">
    <link rel="icon" type="image/png" sizes="256x256" href="{{ asset('logos/256x256.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('logos/512x512.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('logos/apple-touch-icon.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
     <link rel="stylesheet" href="{{ asset('css/bootstrap-offcanvas.css') }}?v=<?php echo $version ?>">
    <link href="{{asset('css/wpp.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <link href="{{asset('lib/animate/animate.min.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}?v=<?php echo $version ?>" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/style.css')}}?v=<?php echo $version ?>" rel="stylesheet">
    <link href="{{asset('css/phone.css')}}?v=<?php echo $version ?>" rel="stylesheet">

    <!-- Scripts -->
    <!-- vite(['resources/sass/app.scss', 'resources/js/app.js']) -->
</head>
<body>
    <div id="app">        
        <main>            
            @yield('content')
        </main>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}?v=<?php echo $version ?>"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}?v=<?php echo $version ?>"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('mail/jqBootstrapValidation.min.js')}}?v=<?php echo $version ?>"></script>
    <script src="{{asset('mail/contact.js')}}?v=<?php echo $version ?>"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}?v=<?php echo $version ?>"></script>
    <script src="{{asset('js/addcart.js')}}?v=<?php echo $version ?>"></script>
    <script src="{{asset('js/phone.js')}}?v=<?php echo $version ?>"></script>
    <script src="{{asset('js/ubigeo.js')}}?v=<?php echo $version ?>"></script>
    <script src="{{asset('js/buscar.js')}}?v=<?php echo $version ?>"></script>
    
    @stack('scripts')
</body>
</html>
