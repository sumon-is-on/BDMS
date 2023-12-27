<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Carbook</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('css/googleapis.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/iconicBootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owlcarousel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themedefault.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific.css') }}">
        <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('css/ionicons.css') }}">
        <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('css/timepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @notifyCss
    </head>

    <body>
	    @include('Web.layouts.header')
        @yield('content')
        @include('Web.layouts.footer')
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/migrate.js') }}"></script>
        <script src="{{ asset('js/pooper.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/easing.js') }}"></script>
        <script src="{{ asset('js/waypoint.js') }}"></script>
        <script src="{{ asset('js/steller.js') }}"></script>
        <script src="{{ asset('js/owlcarousel.js') }}"></script>
        <script src="{{ asset('js/magnify.js') }}"></script>
        <script src="{{ asset('js/aos.js') }}"></script>
        <script src="{{ asset('js/animatenumber.js') }}"></script>
        <script src="{{ asset('js/datepicker.js') }}"></script>
        <script src="{{ asset('js/timepicker.js') }}"></script>
        <script src="{{ asset('js/acrollax.js') }}"></script>
        <script src="{{ asset('js/googleapi.js') }}"></script>
        <script src="{{ asset('js/map.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        @include('notify::components.notify')
        @notifyJs
    </body>
</html>
