@extends('index')

@section('content')

    <div class="row mt2">
        <div class="col-lg-12">
            <p>
                Siparişiniz Tamamlanmıştır. Siparişinizi <a class="color-primary" href="{{ route('order', $booking['request_id']) }}"><b>buraya</b></a> tıklayarak takip edebilirsiniz.
            </p>
            <p>
                Sipariş Numaranız: <b class="color-primary">{{ $booking['order_no'] }}</b>
            </p>
        </div>
    </div>

    <div class="row mt2">
        <div class="col-lg-12">
            <h5 class="color-primary">{{ __('Fatura Bilgileriniz') }}</h5>
            
            <div class="form-panel">
                <table class="table table-borderless">
                    <thead>
                        <th>{{ __('Ad') }}</th>
                        <th>{{ __('Soyad') }}</th>
                        <th>{{ __('Telefon') }}</th>
                        <th>{{ __('Şehir') }}</th>
                        <th>{{ __('İlçe') }}</th>
                        <th>{{ __('Posta Kodu') }}</th>
                        @if ($booking['billing']["type"] == "company")
                            <th>{{ __('Firma İsmi') }}</th>
                            <th>{{ __('Vergi Dairesi') }}</th>
                            <th>{{ __('Vergi No') }}</th>
                        @endif
                        <th>{{ __('Adres') }}</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $booking['billing']['name'] }}</td>
                            <td>{{ $booking['billing']['surname'] }}</td>
                            <td>{{ $booking['billing']['phone'] }}</td>
                            <td>{{ $booking['billing']['city'] }}</td>
                            <td>{{ $booking['billing']['district'] }}</td>
                            <td>{{ $booking['billing']['zip_no'] }}</td>
                            @if ($booking['billing']["type"] == "company")
                                <td>{{ $booking['billing']['firm_name'] }}</td>
                                <td>{{ $booking['billing']['tax_authority'] }}</td>
                                <td>{{ $booking['billing']['tax_no'] }}</td>
                            @endif
                            <td>{{ $booking['billing']['address'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt2">
        <div class="col-lg-12">
            <h5 class="color-primary">{{ __('Ürünleriniz') }}</h5>
            <div class="cart-products">
                @foreach ($booking['items'] as $id => $product)
                    <div class="cart-product">
                        <div class="row">
                            <div class="col-lg-2 col-3">
                                <div class="cart-product-image">
                                    <img src="/images/products/{{ $id }}.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-lg-4 col-9">
                                <div class="cart-product-details">
                                    <div class="cart-product-title">
                                        <a href="/products/{{ $id }}">
                                            {{ $product["name"] }}
                                        </a>
                                    </div>
                                    <div class="cart-product-category">
                                        {{ $product["category"] }}
                                    </div>
                                    <div class="cart-product-price">
                                        <h5>{{ number_format((float)$product["price"], 2, '.', '') }} ₺</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-12">
                                <div class="cart-product-count">
                                    <div class="counter">
                                        {{ $product["quantity"] }} {{ __('Adet') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
