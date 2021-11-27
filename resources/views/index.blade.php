<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Bebeğiniz İçin En İyisi Burada</title>
    
    <link rel="icon" href="/favicon-32x32.png" type="image/x-icon">
    
    <meta property="og:site_name" content="bySurababy">
    <meta property="og:title" content="Bebeğiniz İçin En İyisi Burada" />
    <meta property="og:description" content="bySurababy" />
    <meta property="og:image" itemprop="image" content="/images/logo.jpg">
    <meta property="og:type" content="website" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Saira Semi Condensed">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/common.js') }}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FG9728SGCV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-FG9728SGCV');
    </script>

</head>
<body>
        @include('partials.navbar')

        <div class="alert-bar">
            <i class="fa fa-bell-o"></i>
            <span></span>
        </div>

        <div class="content">

            @include('partials.categories')

            <div class="container mt2">

                @if (isset($title) && $title)
                    <h3 class="title-main">{{ $title }}</h3>
                @endif

                @include('partials.breadcrumbs')

                @yield('content')
            </div>

        </div>

</body>
@include('partials.footer')

</html>
