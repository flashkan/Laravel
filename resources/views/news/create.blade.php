@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::open() }}
        <div class="form-group">
            {{ Form::label('title', 'Title ') }}
            {{ Form::text('title', '', ['class' => 'form-control']) }}
        </div>
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            {{ Form::label('description', 'Description ') }}
            {{ Form::textarea('description', '', ['class' => 'form-control']) }}
        </div>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            {{ Form::label('group', 'Group') }}
            {{ Form::select('group', $group, null, ['class' => 'form-control']) }}
        </div>
        @error('group')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{ $errors->login->first('title') }}
        <div class="form-group">
            {{ Form::label('private', 'Private', ['class' => 'form-check-label']) }}
            {{ Form::checkbox('private', true, ['class' => 'form-check-input']) }}
        </div>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>

@endsection
