@if ($products->isEmpty())
    <div class="row">
        <div class="col-lg-12 text-center">
            <h4 class="color-primary">{{ __("Aradığınız kriterlerde ürün bulunamadı") }}</h4>
        </div>
    </div>
@endif

<div class="row">
    @foreach ($products as $product)
        <div class="col-lg-4">
            <div class="product" data-href="{{ route('product', $product->id) }}">
                <div class="product-image">
                    <img src="{{ asset('/images/products/'.$product->id.'.jpg') }}" alt="{{ $product->name }}">
                </div>
                <div class="product-title">
                    {{ $product->name }}
                </div>
                <div class="row">
                    <div class="col-lg-6 col-6">
                        <div class="product-colors">
                            <div class="color-circle {{ $product->color }}"></div>
                            @foreach ($product->colors as $color)
                                <div class="color-circle {{ $color->color }}"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6 col-6">
                        <div class="product-age">
                            {{ $product->age }}
                        </div>
                    </div>
                </div>
                <div class="product-summary">
                    <div class="product-price">
                        {{ number_format((float)$product->price->sale_price, 2, '.', '') }} ₺
                    </div>
                    <div class="btn sale-button primary-button">
                        {{ __("Sepete Ekle") }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
