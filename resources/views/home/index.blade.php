@extends('index')

@section('content')

    @include('home.partials.category_stickers')

    @include('home.partials.last_products')

    @include('home.partials.popular')
    
    @include('home.partials.stickers')

    <a href="/partner">
        <div class="row mt2">
            <div class="col-lg-12">
                <div class="div">
                    <img style="height: auto; width: 100%" src="{{ asset('/images/banners/partner-banner.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </a>

    <!--@include('home.partials.banners')-->

    <!--@include('home.partials.blogs')-->

    @include('home.partials.instagram')

   

@endsection