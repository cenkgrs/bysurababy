<div class="order mt2">
    <div class="order-header">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="mt-2">{{ __('Ürünler') }}</h5>
            </div>
        </div>
    </div>
    <div class="order-body">
        <div class="cart-products">
            <div class="row">
                @foreach ($order['products'] as $id => $product)
                    <div class="col-lg-6">
                        <div class="cart-product">
                            <div class="row">
                                <div class="col-lg-4 col-4">
                                    <div class="cart-product-image">
                                        <img src="/images/products/{{ $product['id'] }}.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-8">
                                    <div class="cart-product-details">
                                        <div class="cart-product-title">
                                            <a href="/products/{{ $product['id'] }}">
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
                            
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
    </div>
</div>