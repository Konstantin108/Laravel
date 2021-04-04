@extends('layouts.site-main')
@section('content')
    <div class="container" style="margin-top: 100px">
        <div class="row">
            @forelse ($categoryList as $category)
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    <a href='{{route('category.show', ['name' => $category])}}'>
                        <h2 class="post-title">
                            {{$category}}
                        </h2>
                    </a>
                </div>
                <hr>
                <!-- Pager -->
                <div class="clearfix">
                    <a class="btn btn-primary float-right" href='{{route('category.show', ['name' => $category])}}'>Перейти к новостям &rarr;</a>
                </div>
            </div>
            @empty
                <h1>Категории отсутствуют</h1>
            @endforelse
        </div>
    </div>
    <hr>
@endsection

