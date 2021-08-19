<div class="row">
@foreach ($products as $product)
    <div class="col-lg-4">
        <a href="{{ route('product', [$product->id]) }}">
            <div class="product">
                <div class="product-image">
                    <img src="{{ asset('/images/products/'.$product->id.'.jpg') }}" alt="">
                </div>
                <div class="product-title">
                    {{ $product->name }}
                </div>
                <div class="product-summary">
                    <div class="product-price">
                        {{ number_format((float)$product->price->sale_price, 2, '.', '') }} ₺
                    </div>
                    <div class="btn sale-button">
                        Sepete Ekle
                    </div>
                </div>
            </div>
        </a>
    </div>
@endforeach
</div>
