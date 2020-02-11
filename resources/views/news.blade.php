@include('layouts.header')
@include('layouts.main')

<div class="content">
    <h1>News</h1>
    <p>The latest news!!!</p>

    @foreach ($news as $elem)
        <a href="news/{{ $elem['id'] }}">
            <div style="border: gray solid 1px; margin: 10px 33%">
                <h2>{{ $elem['title'] }}</h2>
                <p>{{ $elem['group'] }}</p>
                <p>{{ $elem['description'] }}</p>
            </div>
        </a>
    @endforeach
</div>

@include('layouts.footer')
