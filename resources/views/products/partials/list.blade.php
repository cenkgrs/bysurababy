<div class="row">
@foreach ($products as $product)
    <div class="col-lg-4">
        <div class="product" data-href="{{ route('product', $product->id)}}">
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
                <div class="btn sale-button primary-button">
                    Sepete Ekle
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
