@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::open() }}
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
