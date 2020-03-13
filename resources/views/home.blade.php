@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <h1>Hello, world!!!</h1>
            <p>Welcome to this site.</p>
            <p>senectus et netus et malesuada fames ac turpis egestas integer eget aliquet nibh praesent tristique magna
                sit
                amet purus gravida quis blandit turpis cursus in hac habitasse platea dictumst quisque sagittis purus
                sit amet
                volutpat consequat mauris nunc congue nisi vitae suscipit tellus mauris a diam maecenas sed enim ut sem
                viverra
                aliquet eget sit amet tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra magna ac
                placerat
                vestibulum lectus mauris ultrices eros in cursus turpis massa tincidunt dui ut ornare lectus sit amet
                est
                placerat in egestas erat imperdiet sed euismod nisi porta lorem mollis aliquam ut porttitor</p>
        </div>
    </div>

    <div class="container mb-5">
        <h1 class="text-center">Comments</h1>
        <ul class="list-group">
            @foreach($comment as $one)
                <li class="list-group-item">
                    <strong>Name: {{$one->user->name}}</strong>
                    <p>Text: {{$one->comment}}</p>
                </li>
            @endforeach
        </ul>
        @if(\Illuminate\Support\Facades\Auth::check())
            <h4 class="mt-4">
                Create new comment.
            </h4>
            <form id="comment-form" method="post" action="{{ route('comment.add') }}">
                @csrf
                <div class="form-group">
                    {{ Form::label('comment', 'Comment') }}
                    {{ Form::textarea('comment', '', ['class' => 'form-control', 'rows' => 3]) }}
                </div>
                @error('comment')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @endif
    </div>

@endsection
