@extends('layouts.site-main')
@section('content')

    <div class="container" style="margin-top: 100px ">
        <h1>Сообщение успешно отправлено</h1>
        <br>
        <h2>Наша служба поддержки в скором времени свяжется с вами</h2>
        <br>
        <div style="display: flex; justify-content: center">
            <img src="{{ asset('/assets/img/cat.jpg') }}" alt="cat.jpg" style="margin-bottom: 30px">
        </div>
    </div>

@endsection
