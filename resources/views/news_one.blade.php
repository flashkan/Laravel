@include('layouts.header')
@include('layouts.main')

<div class="content">
    <h1>News single</h1>
    <div>
        <h2>{{ $news['title'] }}</h2>
        <p>{{ $news['group'] }}</p>
        <p>{{ $news['description'] }}</p>
    </div>
</div>

@include('layouts.footer')
