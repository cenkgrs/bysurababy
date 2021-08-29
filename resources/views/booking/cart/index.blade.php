@extends('index')

@section('content')
    <div class="row mt2">
        <div class="col-lg-9">
            @include('booking.cart.partials.products')
        </div>
        <div class="col-lg-3">
            @include('booking.cart.partials.payment')
        </div>
    </div>
@endsection
