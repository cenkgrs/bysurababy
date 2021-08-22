@extends('index')

@section('content')

<ul class="categories">
    @foreach ($categories as $category)
        <li class="category" <!--style="background-image: url(../images/categories/{{ $category->slug }}.jpg);"-->
            <span>{{ $category->name }}</span>
        </li>
    @endforeach
</ul


@endsection
