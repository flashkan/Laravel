@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <h1 class="text-center">News</h1>
        <p class="text-center">The latest news!!!</p>
        <div class="row">
            @foreach ($news as $elem)
                <div class="card col-3 m-4 p-0" style="width: 18rem;">
                    <img src="http://placehold.it/250x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $elem->title }}</h5>
                        <p class="card-text">{{ $elem->description }}</p>
                        @if($elem->private && \Illuminate\Support\Facades\Auth::guest())
                            <p class="card-text">This news is private. Register for
                                access</p>
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        @else
                            <a href="{{ route('news.one', $elem) }}" class="btn btn-primary">More</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
