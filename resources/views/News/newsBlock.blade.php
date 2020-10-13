@forelse ($news as $article)
    <a href="{{route('news.oneArticle',$article['slug'])}}">
        {{$article['title']}}
    </a>
    <br>
@empty
    <h3 class="mt-3">Новости кончились</h3>
    <a href="{{route('home')}}">На главную</a>
@endforelse
