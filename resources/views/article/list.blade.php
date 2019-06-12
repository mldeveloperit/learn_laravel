<html>
    <body>
        <div>
            <h3>Article with ID</h3>
            <ul>
                @foreach($articles as $article)
                    <li>
                        <a href="{{ route('article.show', ['id' => $article->id]) }}">{{ $article->id }} : {{ $article->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div>
            <h3>Article with Slug</h3>
            <ul>
                @foreach($articles as $article)
                    <li>
                        <a href="{{ route('article.showSlug', ['articleSlug' => $article->slug]) }}">{{ $article->id }} : {{ $article->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </body>
</html>