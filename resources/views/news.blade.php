@extends('layouts.site-main')
@section('content')

    <div class="container" style="margin-top: 100px">
        <div class="row">
            @forelse ($news as $newsItem)
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                        <a href='{{ route('news.show', ['id' => $newsItem->id])}}'>
                            <h2 class="post-title">
                                {{$newsItem->title}}
                            </h2>

                        </a>
                        <p class="post-meta">Опубликовал новость
                            <a href="#">Администратор</a>
                            {{ $newsItem->created_at ?? now() }}</p>
                    </div>
                    <h3>{{ $newsItem->categories_title }}</h3>
                    <hr>
                </div>
            @empty
                <h1>Нет новостей</h1>
            @endforelse
        </div>
    </div>
    <hr>

@endsection

