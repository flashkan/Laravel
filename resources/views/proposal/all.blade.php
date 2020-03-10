@extends('layouts.app')

@section('content')
    <div class="container-lg">
{{--        <h1 class="text-center">News</h1>--}}
{{--        <p class="text-center">The latest news!!!</p>--}}
        <div class="row">
            @foreach ($proposal as $elem)
                <div class="card col-3 m-4 p-0" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">User: {{ $elem->user->name }}</h5>
                        <p class="card-text">Email: {{ $elem->user->email }}</p>
                        <a href="{{ route('proposal.one', ['proposal' => $elem]) }}" class="btn btn-primary">More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
