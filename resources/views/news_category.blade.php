@include('layouts.header')
@include('layouts.main')

<div class="content">
    <h1>News Category</h1>
    <div class="box-main-news">
        <div>
            <p>Sport</p>
            @foreach ($news as $elem)
                @if($elem['group'] === 'Sport')
                    <a href="news/{{ $elem['id'] }}">
                        <div class="box-news">
                            <h2>{{ $elem['title'] }}</h2>
                            <p>{{ $elem['group'] }}</p>
                            <p>{{ $elem['description'] }}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <div>
            <p>Weather</p>
            @foreach ($news as $elem)
                @if($elem['group'] === 'Weather')
                    <a href="news/{{ $elem['id'] }}">
                        <div class="box-news">
                            <h2>{{ $elem['title'] }}</h2>
                            <p>{{ $elem['group'] }}</p>
                            <p>{{ $elem['description'] }}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>

    <div class="box-main-news">
        <div>
            <p>Politics</p>
            @foreach ($news as $elem)
                @if($elem['group'] === 'Politics')
                    <a href="news/{{ $elem['id'] }}">
                        <div class="box-news">
                            <h2>{{ $elem['title'] }}</h2>
                            <p>{{ $elem['group'] }}</p>
                            <p>{{ $elem['description'] }}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
        <div>
            <p>Art</p>
            @foreach ($news as $elem)
                @if($elem['group'] === 'Art')
                    <a href="news/{{ $elem['id'] }}">
                        <div class="box-news">
                            <h2>{{ $elem['title'] }}</h2>
                            <p>{{ $elem['group'] }}</p>
                            <p>{{ $elem['description'] }}</p>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>

@include('layouts.footer')
