<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body class="dark:bg-gray-800 dark:border-gray-700">
    {{-- Header --}}
    @include('components.guest-header')

    {{-- Content --}}
    <div class="items-center justify-center flex flex-row">
        @yield('main')
    </div>
    {{-- Footer --}}
    @include('components.home-footer')
    @stack('scripts')
</body>

<script>
    @vite('resources/js/app.js')
</script>

</html>
