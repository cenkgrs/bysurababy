@if (!empty($relatives))

    <h3 class="title-main text-center">{{ __('Birlikte Alabileceğiniz Ürünler') }}</h3>

    <div class="row mt2">
        @foreach ($relatives as $relative)
            <div class="col-lg-3 col-6">
                <div class="product" data-href="{{ route('product', $relative['id']) }}">
                    <div class="product-image">
                        <img src="{{ asset('/images/products/'.$relative['id'].'.jpg') }}" alt="{{ $relative['name'] }}">
                    </div>
                    <div class="product-title">
                        {{ $relative->name }}
                    </div>
                    <div class="product-attributes">
                        <div class="product-colors">
                            <div class="color-circle {{ $relative->color }}"></div>
                            @foreach ($relative->colors as $color)
                                <div class="color-circle {{ $color->color }}"></div>
                            @endforeach
                        </div>
                        <div class="product-age">
                            {{ $relative->age }}
                        </div>
                    </div>
                    <div class="product-summary">
                        <div class="product-price">
                            {{ Helper::formatPrice($relative['sale_price']) }} ₺
                        </div>
                        <div class="btn sale-button primary-button">
                            {{ __("Sepete Ekle") }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endif
