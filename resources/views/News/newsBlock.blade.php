<nav class="nav">
    @forelse ($news as $article)
    <a class="nav-link {{ $article['is_private']?'disabled':'' }}"
       href="{{route('news.oneArticle',$article['slug'])}}">
        {{$article['title']}}
    </a>
</nav>
<br>
@empty
    <h3 class="mt-3">Новости кончились</h3>
    <a href="{{route('home')}}">На главную</a>
@endforelse
