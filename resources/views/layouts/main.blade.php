
<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        Сайт новостей
    </title>

    <meta name="description" content="A Blog Theme by Start Bootstrap">

    <script type="text/javascript" nonce="9bd58f46fc7c461783976d5619e" src="//local.adguard.org?ts=1617534926717&amp;type=content-script&amp;dmn=startbootstrap.github.io&amp;app=chrome.exe&amp;css=1&amp;js=1&amp;gcss=1&amp;rel=1&amp;rji=1&amp;sbe=0"></script>
    <script type="text/javascript" nonce="9bd58f46fc7c461783976d5619e" src="//local.adguard.org?ts=1617534926717&amp;name=AdGuard%20Popup%20Blocker&amp;name=AdGuard%20Assistant&amp;name=AdGuard%20Extra&amp;type=user-script"></script><link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/main.css') }}">

</head>


<body>

<!-- Navigation -->
<!-- Page Header -->

<x-site-header></x-site-header>

<div class="container">
    @yield('content')
</div>


<!-- Footer -->

<hr>

<x-site-footer></x-site-footer>


<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/startbootstrap-clean-blog/js/clean-blog.min.js') }}"></script>

<script src="{{ asset('assets/scripts.js') }}"></script>


@stack('js')
</body>

</html>
