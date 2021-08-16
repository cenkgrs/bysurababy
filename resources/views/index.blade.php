<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coming Soon</title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Saira Semi Condensed">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body>
    @include('partials.navbar')

    <div class="container mt1">

        <h3>{{ $title }}</h3>

        @include('partials.breadcrumbs')

        <!--@include('partials.soon')-->

        @yield('content')
    </div>



    @include('partials.footer')
</body>
</html>
