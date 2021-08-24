@extends('index')

@section('content')

<ul class="categories">
    @foreach ($categories as $category)
        <li class="category"> <!--style="background-image: url(../images/categories/{{ $category->slug }}.jpg);"-->
            <a href="products?category={{ $category->id }}">
                <span>{{ $category->name }}</span>
            </a>
        </li>
    @endforeach
</ul

@endsection
