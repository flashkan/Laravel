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
