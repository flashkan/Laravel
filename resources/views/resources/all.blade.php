@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <div class="m-3">
            <h1>Resources</h1>
            <a href="{{ route('resources.add') }}" class="btn btn-success">Add new resource</a>
        </div>
        <div>
            @foreach ($resources as $resource)
                <div class="row m-1">
                    <div class="col-1">Resource:</div>
                    <div class="col-8">{{ $resource->link }}</div>
                    <div class="col-3 btn-group">
                        <a href="{{ route('resources.update', ['resources' => $resource]) }}" class="btn btn-primary">Update</a>
                        <a href="{{ route('resources.delete', ['resources' => $resource]) }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
