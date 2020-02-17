<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">Home</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('project') }}">Project</a>
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
        @foreach($categories as $category)
            <a class="dropdown-item"
               href="{{ route('news.category', ['id' => $category->id]) }}">{{ $category->name }}</a>
        @endforeach
    </div>
</div>
<li class="nav-item">
    <a class="nav-link" href="{{ route('news.page.create') }}">Create News</a>
</li>

