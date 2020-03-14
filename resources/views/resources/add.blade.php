@extends('layouts.app')

@section('content')
    <div class="container">

        {{ Form::open() }}
        @csrf
        <div class="form-group">
            {{ Form::label('link', 'Link ') }}
            {{ Form::text('link', $resources->link, ['class' => 'form-control']) }}
        </div>
        @error('link')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>

@endsection
