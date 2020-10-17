{{--@dump($news)--}}
<nav class="nav flex-sm-column">
    @forelse ($news as $article)
    <a class="nav-link {{ $article['is_private']?'disabled':'' }}"
       href="{{route('news.oneArticle',$article['slug'])}}">
        {{ $article['title'] }}
        <br>
        <img src="{{ $article['image'] ?? url('storage/default_article.jpg') }}" alt="Preview image" class="img-preview" >
    </a>
@empty
    <h3 class="mt-3">Новости кончились</h3>
    <a href="{{route('home')}}">На главную</a>
@endforelse
</nav>
