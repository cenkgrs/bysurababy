<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ isset($title) ? $title : __('Bebeğiniz İçin En İyisi Burada') }}</title>
    
    <link rel="icon" href="/images/favicon-32x32.png" type="image/x-icon">
    
    <meta property="og:site_name" content="bySurababy">
    <meta property="og:title" content="Bebeğiniz İçin En İyisi Burada" />
    <meta property="og:description" content="bySurababy" />
    <meta property="og:image" itemprop="image" content="/images/logo.jpg">
    <meta property="og:type" content="website" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Saira Semi Condensed">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5ea815c1d0.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ URL::asset('/js/common.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Google tag (gtag.js) -->
    <!--
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T1B8GYFL5J"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-T1B8GYFL5J');
    </script>
    -->

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3602909305932991"
     crossorigin="anonymous"></script>

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

                @include('partials.messages')

                @yield('content')
            </div>

        </div>

</body>
@include('partials.footer')

</html>
