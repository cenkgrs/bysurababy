@extends('index')

@section('content')
    <div class="row mt2">
        <div class="col-lg-12">
            @include('booking.payment.partials.address')
        </div>
        <div class="col-lg-12">
            @include('booking.payment.partials.billing')
        </div>
    </div>
@endsection
