@extends('layouts.app')

@section('content')
    <div class="container-lg">
        <h1 class="text-center">Profile</h1>
        <div class="row">
            @foreach ($users as $user)
                <div class="card col-3 m-4 p-0" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">{{ $user->email }}</p>
                        <p class="card-text">
                            Status admin :
                            @if($user->is_admin) Yes @else No @endif
                        </p>
                        <p>Change status admin
                            <a href="{{ route('profile.toggle', $user) }}" class="btn btn-primary">Toggle</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
