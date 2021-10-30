@extends('index')

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="{{ URL::asset('/js/product.js') }}"></script>

    <div class="product-index mt5 mt0-m">
        <div class="row mt2">
            <div class="col-lg-5 mt2">
                @include('products.product.partials.photo')
            </div>
            <div class="col-lg-7">
                @include('products.product.partials.details')
            </div>
        </div>

        <div class="row mtw2">
            <div class="col-lg-12">
                @include('products.product.partials.description')
            </div>
        </div>

        <div class="row mt2">
            <div class="col-lg-12">
                @include('products.product.partials.similar_products')
            </div>
        </div>

        <div class="row mt2">
            <div class="col-lg-12">
                @include('products.product.partials.comments')
            </div>
        </div>
    </div>



@endsection
