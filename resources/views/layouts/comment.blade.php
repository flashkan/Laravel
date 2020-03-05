<div class="container mb-5">
    <h1 class="text-center">Comments</h1>
    <ul class="list-group">
        @foreach($comment as $one)
            <li class="list-group-item">
                <strong>Name: {{$one->userName}}</strong>
                <p>Text: {{$one->comment}}</p>
            </li>
        @endforeach
    </ul>
    @if(\Illuminate\Support\Facades\Auth::check())
        <h4 class="mt-4">
            Create new comment.
        </h4>
        <form id="comment-form" method="post" action="{{ route('comment.add') }}">
            @csrf
            <div class="form-group">
                {{ Form::label('comment', 'Comment') }}
                {{ Form::textarea('comment', '', ['class' => 'form-control', 'rows' => 3]) }}
            </div>
            @error('comment')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    @endif
</div>
