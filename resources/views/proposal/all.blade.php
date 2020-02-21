@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <h1 class="text-center">News</h1>
        <p class="text-center">The latest news!!!</p>
        <div class="row">
            @foreach ($proposal as $elem)
                <div class="card col-3 m-4 p-0" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">User: {{ $elem->userName }}</h5>
                        <p class="card-text">Phone: {{ $elem->userPhone }}</p>
                        <p class="card-text">Email: {{ $elem->userEmail }}</p>
                        <a href="{{ route('proposal.one', ['id' => $elem->id]) }}" class="btn btn-primary">More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
