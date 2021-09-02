@extends('index')

@section('content')
    <form action="/booking" method="POST">
        <div class="row mt2">
            @include('booking.payment.partials.address')
            <div class="row">
                <div class="col-lg-6">
                    @include('booking.payment.partials.billing')
                </div>
                <div class="col-lg-6">
                    @include('booking.payment.partials.contact')
                </div>
            </div>
        </div>
    </form>
@endsection
