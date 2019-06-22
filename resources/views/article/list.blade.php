@extends('layouts.layout')

@section('content')
       <div class="hide">
           <h3>Article with ID</h3>
            <ul>
                @foreach($articles as $article)
                    <li>
{{--                        <a href="{{ route('article.show', ['id' => $article->id]) }}">{{ $article->id }} : {{ $article->title }}</a>--}}
                        <a href="{{ route('article.show', ['slug' => $article->slug]) }}">{{ $article->id }} : {{ $article->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="hide">
            <h3>Article with Slug</h3>
            <ul>
                @foreach($articles as $article)
                    <li>
                        <a href="{{ route('article.showSlug', ['articleSlug' => $article->slug]) }}">{{ $article->id }} : {{ $article->title }}</a>
                    </li>
                @endforeach
            </ul>
        </div>




       <h1 class="page-header">
           مقالات سایت
       </h1>

       @foreach($articles as $article)
           <div>
               <h2>
                   <a href="{{ route('article.show', ['slug' => $article->slug]) }}">{{ $article->title }}</a>
               </h2>
               <p class="lead">
                   ارسال شده توسط <a href="index.php">{{ $article->user->name }}</a>
               </p>
               <p><span class="glyphicon glyphicon-time"></span>ارسال شده در تاریخ  {{ jdate($article->created_at)->format('%B %d، %Y') }}</p>
               <hr>
               <img class="img-responsive" src="/images/900x300.png" alt="">
               <hr>
               <p>{{ $article->body }}</p>
               <a class="btn btn-primary" href="#">ادامه  مطلب <span class="glyphicon glyphicon-chevron-left"></span></a>
           </div>

           @if(!$loop->last)
               <hr>
           @endif
       @endforeach




       <hr>

       {!! $articles->render() !!}





@endsection