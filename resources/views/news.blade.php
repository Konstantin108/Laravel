@extends('layouts.site-main')
@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row">
            @forelse ($newsList as $key => $news)
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                        <a href='{{ route('news.show', ['id' => ++$key])}}'>
                            <h2 class="post-title">
                                {{$news}}
                            </h2>

                        </a>
                        <p class="post-meta">Опубликовал новость
                            <a href="#">Администратор</a>
                            {{ now() }}</p>
                    </div>
                    <hr>
                </div>
            @empty
                <h1>Нет новостей</h1>
            @endforelse
        </div>
    </div>
    <hr>
@endsection

