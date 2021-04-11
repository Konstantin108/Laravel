@extends('layouts.site-main')
@section('content')

    <div class="container" style="margin-top: 100px">
        <div>
            <h3>{{ $news->title  }}</h3>
            <div class="container" style="margin-top: 100px">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-preview">

                            <h2>
                                {{$news->text}}
                            </h2>
                            <h4 style="text-align: end; color: #2ca02c">{{ \App\Enums\NewsStatusEnum::PUBLISHED }}</h4>
                        </div>
                        <hr>
                        <!-- Pager -->
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
