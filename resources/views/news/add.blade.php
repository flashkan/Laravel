@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Form::open(['url' => route($route, ['news' => $news])]) }}
        <div class="form-group">
            {{ Form::label('title', 'Title ') }}
            {{ Form::text('title', $news->title, ['class' => 'form-control']) }}
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            {{ Form::label('description', 'Description ') }}
            {{ Form::textarea('description', $news->description, ['class' => 'form-control']) }}
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            {{ Form::label('group', 'Group') }}
            @if($news->id)
                {{ Form::select('group', $group, $news->group, ['class' => 'form-control']) }}
            @else
                {{ Form::select('group', $group, null, ['class' => 'form-control']) }}
            @endif
        </div>
        @error('group')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            {{ Form::label('private', 'Private', ['class' => 'form-check-label']) }}
            {{ Form::hidden('private', 0) }}
            {{ Form::checkbox('private', 1, $news->private,['class' => 'form-check-input ml-1']) }}
        </div>
        @error('private')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>

@endsection
