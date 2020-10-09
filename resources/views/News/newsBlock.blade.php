@forelse ($news as $article)
    <a href="{{route('news.oneArticle',$article['slug'])}}">
        {{$article['title']}}
    </a>
    <br>
@empty
    <h2>Новости кончились</h2>
    <a href="{{route('home')}}">На главную</a>
@endforelse
