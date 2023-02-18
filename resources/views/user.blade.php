@extends('layout.index')

@section('page_title', 'User Articles: ' . $user->username)

@section('content')

    <!-- Main -->
    <div id="main">

        @foreach($user->articles() as $article)
            <!-- Post -->
            <article class="post">
                <header>
                    <div class="title">
                        <h2><a href="#">{{ $article['title'] }}</a></h2>
                        <p>{{ $article['anons_title'] }}</p>
                    </div>
                    <div class="meta">
                        <time class="published"
                              datetime="2015-11-01">{{ $article['created_at']->format('d.M.Y') }}</time>
                        <a href="#" class="author"><span class="name">{{ $article->author()->username }}</span><img
                                src="{{ $article->author()->image_url }} alt=""/></a>
                    </div>
                </header>
                <a href="#" class="image featured"><img src="{{ $article->image_url }}" alt=""/></a>
                <p>{{ substr($article['content'], 0, 60) }}...</p>
                <footer>
                    <ul class="actions">
                        <li><a href="{{ route('single', $article['id']) }}" class="button big">Continue Reading</a></li>
                    </ul>
                    <ul class="stats">
                        @auth
                            @if($article->user_has_actions)
                                <li><a href="{{ route('article.update', $article) }}">Edit</a></li>
                                <li><a href="{{ route('article.delete', $article) }}">Delete</a></li>
                                <li><a href="{{ route('article.block', $article) }}">Blocked</a></li>
                            @endif
                        @endauth
                        <li><a href="#" class="icon fa-eye">{{ $article['view_count'] }}</a></li>
                        <li><a href="#" class="icon fa-comment">128</a></li>
                        <li><a href="#">{{ $article->category()->name }}</a></li>
                    </ul>
                </footer>
            </article>
        @endforeach

        <!-- Pagination -->
        <ul class="actions pagination">
            <li><a href="" class="disabled button big previous">Previous Page</a></li>
            <li><a href="#" class="button big next">Next Page</a></li>
        </ul>

    </div>

@endsection

