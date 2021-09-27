@extends('index')

@section('content')

    <script type="text/javascript" src="{{ URL::asset('/js/booking.js') }}"></script>

    <form action="{{ route('booking') }}" method="post">
        @csrf

        <div class="row mt2">
            <div class="col-lg-2">
                @include('user.partials.user_management')                
            </div>
            <div class="col-lg-10">
                <div class="orders">
                    @foreach ($orders as $order)
                        <div class="order">
                            <div class="order-header">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <h6>{{ __('Sipariş Tarihi') }}</h6>
                                        <small>{{ $order['created_at'] }}</small>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6>{{ __('Sipariş Özeti') }}</h6>
                                        <small>{{ $order['product_count'] }} {{ __('Ürün') }}</small>
                                    </div>
                                    <div class="col-lg-3">
                                        <h6>{{ __('Alıcı') }}</h6>
                                        <small>{{ $order['owner'] }} </small>
                                    </div>
                                    <div class="col-lg-1">
                                        <h6>{{ __('Tutar') }}</h6>
                                        <small>{{ $order['total_price'] }} TL</small>
                                    </div>

                                    <div class="col-lg-2">
                                        <button class="btn primary-button">{{ __('Sipariş Detayı') }}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="order-body">
                                @foreach($order['products'] as $product)
                                    <div class="order-product">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6>{{ $order['status'] }}</h6>
                                                <small>24 Eylül Tarihinde sipariş verilmiştir.</small>
                                            </div>
                                            <div class="col-lg-4">
                                                <span>{{ $product['name'] }}</span>
                                            </div>
                                            @if ($order['operation'] == "Cancel")
                                                <div class="col-lg-4">
                                                    <div class="btn secondary-button">{{ __('İptal Et') }}</div>
                                                </div>
                                            @elseif ($order['operation'] == 'Refund')
                                                <div class="col-lg-4">
                                                    <div class="btn secondary-button">{{ __('İade Et') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </form>

@endsection