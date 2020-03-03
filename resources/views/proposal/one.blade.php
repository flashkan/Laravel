@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Proposal single</h1>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 m-4 p-0" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">User: {{ $proposal->userName }}</h5>
                <p class="card-text">Phone: {{ $proposal->userPhone }}</p>
                <p class="card-text">Email: {{ $proposal->userEmail }}</p>
                <p class="card-text">Proposal: {{ $proposal->userProposal }}</p>
            </div>
            <a href="{{ route('proposal.update', $proposal) }}" class="btn btn-primary">Update</a>
            <a href="{{ route('proposal.delete', $proposal) }}" class="btn btn-primary">Delete</a>
        </div>
        <div class="col-3"></div>
    </div>
</div>
@endsection
