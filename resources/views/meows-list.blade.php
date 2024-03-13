<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>startLaravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('css/meows-list.css') }}"/>
</head>
<body>
<div class="container">
    <h1>Meows</h1>
    @if(count($meows) > 0)
        @foreach ($meows as $meow)
            <div class="meow">
                <h3>{{ $meow->user->name }}</h3>
                <p>{{ $meow->content }}</p>
                <p>mis à jour le {{ $meow->updated_at }}</p>
                @foreach ($meow->comments as $comment)
                    <div class="comment">
                        <p>{{ $comment->user->name }}: {{ $comment->content }}  {{ $comment->updated_at }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    @else
        <p>No meows to display</p>
    @endif
</div>
</body>
</html>
