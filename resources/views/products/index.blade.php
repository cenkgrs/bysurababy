@extends('index')

@section('content')

<div class="row mt2">
    <div class="col-lg-3">
        @include ('products.partials.filter')
    </div>
    <div class="col-lg-9">
        @include ('products.partials.list')
    </div>
</div>

@endsection
