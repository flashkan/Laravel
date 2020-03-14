@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">News single</h1>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 m-4 p-0" style="width: 18rem;">
                <img src="http://placehold.it/750x400" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $news->title }}</h5>
                    <p class="card-text">{!! $news->description !!}</p>
                    <p class="card-text">Private: @if($news->private)Yes @else No @endif</p>
                    <p class="card-text">{!! date('d F Y H:i', strtotime($news['pubDate'])) !!}</p>
                    @if(\App\User::isAdmin())
                        <a href="{{ route('news.update', $news) }}" class="btn btn-primary">Update</a>
                        <a href="{{ route('news.delete', $news) }}" class="btn btn-primary">Delete</a>
                    @endif
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection
