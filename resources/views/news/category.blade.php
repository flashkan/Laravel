@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <h1 class="text-center">News</h1>
        <p class="text-center">Latest {{ current($news)->group }} News!!!</p>
        <div class="row">
            @foreach ($news as $elem)
                <div class="card col-3 m-4 p-0" style="width: 18rem;">
                    <img src="http://placehold.it/250x200" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $elem->title }}</h5>
                        <p class="card-text">{{ $elem->description }}</p>
                        @if(!$elem->private)
                            <a href="{{ route('news.one', ['id' => $elem->id]) }}" class="btn btn-primary">More</a>
                        @else
                            <p class="card-text">This news is private. Register for
                                access</p>
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
