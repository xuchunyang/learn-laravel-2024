<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Learnku 话题备份</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

<div class="container mx-auto px-4 py-4">
    <h1 class="text-2xl font-bold text-center">Learnku 话题备份</h1>

    <ul class="space-y-4 divide-y">
        @forelse($topics as $topic)
            <li class="pt-4">
                <details>
                    <summary class="">
                        {{ $topic['title'] }}
                        <a href="{{ $topic['url'] }}" class="pl-2 text-sm text-blue-500" target="_blank">查看原文</a>
                    </summary>
                    <div class="prose max-w-none prose-sm bg-gray-100 p-4 my-4">
                        {!! \Illuminate\Support\Str::markdown($topic->body) !!}
                    </div>
                </details>
            </li>
        @empty
            <li class="pt-4 text-center">暂无数据</li>
        @endforelse
    </ul>
</div>

</body>
</html>
