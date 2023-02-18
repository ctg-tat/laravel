@extends('layout.index')

@section('page_title', 'Update' . $article->title)
@section('single', 'single')

@section('content')

    <!-- Main -->
    <div id="main">
        <!-- Post -->
        <form class="post" method="post" enctype="multipart/form-data" action="{{ route('article.updatePost', $article) }}">

            <h1>Update Post</h1>
            @csrf
            <input value="{{ $article->title }}" name="title" type="text" name="name" placeholder="Post name"><br>
            <input value="{{ $article->anons_title }}" name="anons_title" type="text" name="subtitle" placeholder="Anons title"><br>
            <textarea name="content" placeholder="Post content">{{ $article->content }}</textarea><br>

            <img width="100%" height="480px" style="object-fit: contain" src="{{ $article->image_url }}" alt="">

            <input type="file" name="file"><br><br>

            <select name="category_id" id="category_id">
                @foreach($categories as $category)
                    <option

                        @if($article->category_id === $category->id)
                            selected
                        @endif

                        value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </select>
            <br/>
            <input type="submit" class="button big fit" value="Update this Post">
        </form>
    </div>

    <!-- Footer -->
    <section id="footer">
        <p class="copyright">&copy; Blog. Design: <a href="http://html5up.net">HTML5 UP</a>.</p>
    </section>

@endsection
