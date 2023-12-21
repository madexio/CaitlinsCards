<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
</head>


<body>
<div class="flex">
    <div class="w-[15%]">
        <x-banner/>
    </div>
    <div class="w-[85%]">

        {{ $slot }}
    </div>
</div>


</body>
</html>
