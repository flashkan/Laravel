@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::open() }}
        <div class="form-group">
            {{ Form::label('userName', 'userName ') }}
            {{ Form::text('userName', $proposal->userName, ['class' => 'form-control']) }}
        </div>
        @error('userName')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            {{ Form::label('userPhone', 'userPhone ') }}
            {{ Form::text('userPhone', $proposal->userPhone, ['class' => 'form-control']) }}
        </div>
        @error('userPhone')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-group">
            {{ Form::label('userEmail', 'userEmail ') }}
            {{ Form::text('userEmail', $proposal->userEmail, ['class' => 'form-control']) }}
        </div>
        @error('userEmail')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            {{ Form::label('userProposal', 'userProposal ') }}
            {{ Form::textarea('userProposal', $proposal->userProposal, ['class' => 'form-control', 'rows' => 5]) }}
        </div>
        @error('userProposal')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{ $errors->login->first('title') }}
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
    </div>
@endsection
