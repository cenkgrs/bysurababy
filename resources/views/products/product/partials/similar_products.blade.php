@if (isset($similar_products) && !$similar_products->isEmpty())

    <h3 class="title-main text-center">{{ __('Benzer Ürünler') }}</h3>

    <div class="row mt2">
        @foreach ($similar_products as $product)
            <div class="col-lg-3 col-6">
                <div class="product" data-href="{{ route('product', $product->id) }}">
                    <div class="product-image">
                        <img src="{{ asset('/images/products/'.$product->id.'.jpg') }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-title">
                        {{ $product->name }}
                    </div>
                    <div class="product-attributes">
                        <div class="product-colors">
                            <div class="color-circle {{ $product->color }}"></div>
                            @foreach ($product->colors as $color)
                                <div class="color-circle {{ $color->color }}"></div>
                            @endforeach
                        </div>
                        <div class="product-age">
                            {{ $product->age }}
                        </div>
                    </div>
                    <div class="product-summary">
                        <div class="product-price">
                            {{ Helper::formatPrice($product->price->sale_price) }} ₺
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
