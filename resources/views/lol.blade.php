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
    @if($champions->isNotEmpty())
        <ul class="space-y-4 my-4">
            @foreach($champions as $champion)
                <li class="border px-4 py-2 rounded shadow">
                    <div class="flex items-center mb-1">
                        <h1 class="font-bold text-lg">{{ $champion->name }}</h1>
                        <h2 class="ml-2 text-gray-500 text-sm mr-auto">{{ $champion->title }}</h2>
                        <div class="text-sm uppercase text-gray-500">{{ $champion->uid }}</div>
                    </div>
                    <p class="text-sm text-gray-500 line-clamp-1">{{ $champion->blurb }}</p>
                </li>
            @endforeach
        </ul>

        <div class="space-y-4 my-4">
            {{ $champions->links() }}
            {{ $champions2->links() }}
            {{ $champions2->links('my-simple-pagination') }}
            {{ $champions->links('pagination::default') }}
        </div>
    @else
        <div class="pt-4 text-center">暂无数据</div>
    @endif
</div>

</body>
</html>
