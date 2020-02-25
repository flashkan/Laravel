@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Comments</h1>
        <ul class="list-group">
            @foreach($comments as $one)
                <li class="list-group-item">
                    <strong>Name: {{$one->userName}}</strong>
                    <p>Text: {{$one->comment}}</p>
                </li>
            @endforeach
        </ul>
        <h4 class="mt-4">
            Create new comment.
        </h4>
        <form method="post" action="{{ route('commentCreate') }}">
            @csrf
            <div class="form-group">
                {{ Form::label('userName', 'Name') }}
                {{ Form::text('userName', '', ['class' => 'form-control']) }}
            </div>
            @error('userName')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                {{ Form::label('comment', 'Comment') }}
                {{ Form::textarea('comment', '', ['class' => 'form-control', 'rows' => 3]) }}
            </div>
            @error('comment')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
