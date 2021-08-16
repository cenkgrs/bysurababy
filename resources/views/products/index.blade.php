@extends('index')

@section('content')


// Breadcrumbs

<div class="container">
    <div class="row">
        <div class="col-xs-3">
            @include ('products.partials.filter')
        </div>
        <div class="col-xs-9">
            @include ('products.partials.list')
        </div>
    </div>
</div>




@endsection
