@extends('index')

@section('content')

    <script type="text/javascript" src="{{ URL::asset('/js/booking.js') }}"></script>

    <form action="{{ route('booking') }}" method="post">
        @csrf

        <div class="row mt2">
            <div class="col-lg-8">

                @include('booking.payment.partials.address')

                @include('booking.payment.partials.contact')

                @include('booking.payment.partials.billing')

            </div>
            <div class="col-lg-4">
                @include('booking.payment.partials.payment')
            </div>
        </div>

    </form>

@endsection
