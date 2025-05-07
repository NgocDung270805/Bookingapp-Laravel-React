<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Demo Livewire SPA')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="p-6">
    {{-- <livewire:navigation-bar /> --}}

    {{-- Gọi ra livewire/navigation-bar.blade.php --}}
   
    @include('partials.navbar')

    <div class="container">
        @yield('content')
    </div>


    

    @livewireScripts
</body>
</html>
