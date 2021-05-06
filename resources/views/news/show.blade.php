@extends('layouts.site-main')
@section('content')

    <div class="container" style="margin-top: 100px">
        <div>
            <h3>{{ $news->title  }}</h3>
            <div class="container" style="margin-top: 20px">
                <div class="row">
                    <div class="col-lg-8 col-md-10 mx-auto">
                        <div class="post-preview">
                            @if($news->image)
                                <div style="display: flex; justify-content: center">
                                    <img src="{{\Storage::disk('public')->url($news->image)}}"
                                         alt="image"
                                         style="max-width: 350px; float: left; margin-bottom: 20px;"
                                    >
                                </div>
                            @endif
                            <div>
                                {!!  $news->text  !!}
                            </div>
                        </div>
                        <h4 style="text-align: end; color: #2ca02c">{{ \App\Enums\NewsStatusEnum::PUBLISHED }}</h4>
                        <hr>
                        <!-- Pager -->
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
