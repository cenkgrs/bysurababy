@extends('index')

@section('content')

    <script type="text/javascript" src="{{ URL::asset('/js/product.js') }}"></script>

    <div class="row mt2">
        <div class="col-lg-3 col-12">
            @include ('products.partials.filter')
        </div>
        <div class="col-lg-9 col-12">
            @include ('products.partials.list')
        </div>
    </div>

@endsection
