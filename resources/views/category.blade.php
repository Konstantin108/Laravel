@extends('layouts.site-main')
@section('content')

    <div class="container" style="margin-top: 100px">
        <div class="row">
            @forelse ($categories as $category)
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">
                        <a href='{{route('indexByCategoryId',  ['id' => $category->id])}}'>
                            <h2 class="post-title">
                                {!!  $category->title
!!}
                            </h2>
                            <h3 class="post-title">
                                {!!  $category->description !!}
                            </h3>
                        </a>
                    </div>
                    <hr>
                </div>
            @empty
                <h1>Категории отсутствуют</h1>
            @endforelse
        </div>
    </div>
    <hr>

@endsection

