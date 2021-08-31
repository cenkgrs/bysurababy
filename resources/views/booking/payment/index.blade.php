@extends('index')

@section('content')
    <form action="/booking" method="POST">
        <div class="row mt2">
            @include('booking.payment.partials.address')

            @include('booking.payment.partials.billing')
        </div>
    </form>
@endsection
