<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Learn Laravel 2024</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

<div class="container mx-auto px-4 py-4">
    <div class="prose max-w-none">
        {!! \Illuminate\Support\Str::markdown($readme) !!}
    </div>
</div>

</body>
</html>
