@extends('index')

@section('content')
    <div class="row mt2" id="cart-section">

        <script type="text/javascript" src="{{ URL::asset('/js/cart.js') }}"></script>

        @if (!$products)
            <div class="col-lg-12 col-12">
                <h4 class="color-primary">{{ __('Sepetinizde herhangi bir ürün bulunmamaktadır') }}</h4>
            </div>
        @else
            <div class="col-lg-9">
                @include('booking.cart.partials.products')
            </div>
            <div class="col-lg-3">
                @include('booking.cart.partials.payment')
            </div>
        @endif

    </div>
@endsection
