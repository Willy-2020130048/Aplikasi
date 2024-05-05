<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css')

    @stack('style')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js"
        integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    {{-- Header --}}
    @if (auth()->user() == null)
        @include('components.guest-header')
    @else
        @include('components.home-header')
    @endif


    {{-- Content --}}
    <div class="items-center justify-center flex flex-col">
        @include('layouts.alert')
        @yield('main')
    </div>
    {{-- Footer --}}
    @include('components.home-footer')
    @stack('scripts')
</body>

@vite('resources/js/app.js')

</html>
