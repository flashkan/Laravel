<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">Home</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('news.all') }}">News</a>
</li>
<div class="btn-group" role="group">
    <a id="btnGroupDrop1" type="button" class="nav-link" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">
        News Category
    </a>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        @foreach($group as $one)
            <a class="dropdown-item"
               href="{{ route('news.group', $one) }}">{{ $one->name }}</a>
        @endforeach
    </div>
</div>
<li class="nav-item">
    <a class="nav-link" href="{{ route('comment.all') }}">Comments</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('proposal.add') }}">New proposal</a>
</li>

{{--при не авторизованном пользователе выдает ошибку из-за (null->is_admin) Сделал доп проверку.--}}
@if(\App\User::isAdmin())
    <div class="btn-group" role="group">
        <a id="btnGroupDrop2" type="button" class="nav-link" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">
            Admin
        </a>
        <div class="dropdown-menu" aria-labelledby="btnGroupDrop2">
            <a class="nav-link" href="{{ route('news.add') }}">Create News</a>
            <a class="nav-link" href="{{ route('proposal.all') }}">Proposal</a>
        </div>
    </div>
@endif


