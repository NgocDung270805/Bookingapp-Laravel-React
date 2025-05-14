<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Administration</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicons/admin.webp') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicons/admin.webp') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicons/admin.webp') }}">
    <link rel="manifest" href="{{ asset('img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('plugins/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('js/config.js') }}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->

    <link href="{{ asset('plugins/dropzone/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/choices/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="{{ asset('plugins/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="{{ asset('css/theme-rtl.min.css') }}" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('css/theme.min.css') }}" type="text/css" rel="stylesheet" id="style-default">
    <link href="{{ asset('css/user-rtl.min.css') }}" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('css/user.min.css') }}" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
        var phoenixIsRTL = window.config.config.phoenixIsRTL;
        if (phoenixIsRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
    <link href="{{ asset('plugins/leaflet/leaflet.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/leaflet.markercluster/MarkerCluster.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/leaflet.markercluster/MarkerCluster.Default.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.css') }}"
        rel="stylesheet">
    @livewireStyles




</head>

<body>
    <main class="main" id="top">
        <!-- ===============================================-->
        <!--    Main Content-->
        <!-- ===============================================-->

        @include('partials.slidebar')
        @include('partials.header')
        @include('partials.navbar')
        @yield('content')
        @livewireScripts
        <!-- ===============================================-->
        <!--    JavaScripts-->
        <!-- ===============================================-->
        <script src="{{ asset('plugins/popper/popper.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
        <script src="{{ asset('plugins/anchorjs/anchor.min.js') }}"></script>
        <script src="{{ asset('plugins/is/is.min.js') }}"></script>
        <script src="{{ asset('plugins/fontawesome/all.min.js') }}"></script>
        <script src="{{ asset('plugins/lodash/lodash.min.js') }}"></script>
        <script src="{{ asset('plugins/list.js/list.min.js') }}"></script>
        <script src="{{ asset('plugins/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('plugins/dayjs/dayjs.min.js') }}"></script>
        <script src="{{ asset('plugins/leaflet/leaflet.js') }}"></script>
        <script src="{{ asset('plugins/leaflet.markercluster/leaflet.markercluster.js') }}"></script>
        <script src="{{ asset('plugins/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js') }}"></script>
        <script src="{{ asset('plugins/echarts/echarts.min.js') }}"></script>
        <script src="{{ asset('js/phoenix.js') }}"></script>
        <script src="{{ asset('js/ecommerce-dashboard.js') }}"></script>

        <script src="{{ asset('plugins/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('plugins/dropzone/dropzone-min.js') }}"></script>
        <script src="{{ asset('plugins/choices/choices.min.js') }}"></script>
        <script src="{{ asset('plugins/flatpickr/flatpickr.min.js') }}"></script>
</body>

</html>
