<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Silkscreen&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    @livewireStyles
    @wireUiScripts
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

</head>

<body>
    {{ $slot }}
    <x-notifications />
    @livewireScripts
</body>

</html>
