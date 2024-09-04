<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lol Champions</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

<div class="container mx-auto px-4 py-4">
    <h1 class="text-2xl font-bold text-center">Lol Champions</h1>

    <ul class="flex flex-wrap gap-4 my-4 justify-evenly">
        @forelse($champions as $champion)
            <li class="border p-4">
                <div>ID: {{ $champion->uid }}</div>
                <div>Name: {{ $champion->name }}</div>
                <div>Title: {{ $champion->title }}</div>
                <div class="max-w-[300px]">Blurb: {{ $champion->blurb }}</div>
            </li>
        @empty
            <li class="pt-4 text-center">暂无数据</li>
        @endforelse
    </ul>
</div>

</body>
</html>
