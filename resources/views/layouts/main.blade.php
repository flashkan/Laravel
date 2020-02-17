<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Site</title>
    <link rel="stylesheet" href="{{ asset('css/apt.css') }}">
</head>
<body>

<div class="content">
    <div class="links">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('project') }}">Project</a>
        <a href="{{ route('news.all') }}">News</a>
        <a href="{{ route('news.categories') }}">News Category</a>
    </div>
</div>

@yield('menu')
@yield('content')

<footer>
    This is footer
</footer>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
