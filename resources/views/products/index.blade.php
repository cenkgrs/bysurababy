@extends('index')

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="{{ URL::asset('/js/product.js') }}"></script>

<div class="row mt2">
    <div class="col-lg-3">
        @include ('products.partials.filter')
    </div>
    <div class="col-lg-9">
        @include ('products.partials.list')
    </div>
</div>

@endsection
