<div class="cart-products">
    @foreach ($products as $id => $product)
        <div class="cart-product">
            <div class="cart-product-image">
                <img src="/images/products/{{ $id }}.jpg" alt="">
            </div>
            <div class="cart-product-details">
                <div class="card-product-title">
                    {{ $product["name"] }}
                </div>
                <div class="cart-product-category">
                    {{ $product["category"] }}
                </div>
                <div class="card-product-price">
                    {{ number_format((float)$product["price"], 2, '.', '') }} ₺
                </div>

            </div>

        </div>
    @endforeach
</div>
