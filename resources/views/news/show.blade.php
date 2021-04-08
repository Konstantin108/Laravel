@extends('layouts.site-main')
@section('content')

    <div>
        <h3>{{ $news  }}</h3>
        <div class="container" style="margin-top: 100px">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-preview">

                        <h2 class="post-title">
                            {{$news}}
                        </h2>

                        </a>
                        <p class="post-meta">Раздел находится на модерации

                    </div>
                    <hr>
                    <!-- Pager -->
                </div>

            </div>
        </div>
    </div>

@endsection
