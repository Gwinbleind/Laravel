<nav class="nav flex-sm-column">
    @forelse ($news as $article)
        <div>
            <a class="nav-link" href="{{ route('admin.news.show',$article )}}">
                {{ $article->title }}
            </a>
            <form action="{{ route('admin.news.edit',$article) }}">
                @csrf
                <button type="submit" class="btn btn-warning">Изменить</button>
            </form>
            <form method="post" action="{{ route('admin.news.destroy',$article) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
@empty
    <h3 class="mt-3">Новости кончились</h3>
    <a href="{{route('home')}}">На главную</a>
@endforelse
</nav>
