<div class="cart-products">
    @foreach ($products as $id => $product)
        <div class="cart-product">
            <div class="row">
                <div class="col-lg-2 col-4">
                    <div class="cart-product-image">
                        <img src="/images/products/{{ $id }}.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-8">
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
                <div class="col-lg-2 col-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-product-count">
                                <div class="counter">
                                    <span class="minus-circle">-</span>
                                    <input id="product_count" type="text" value="1"/>
                                    <span class="plus-circle">+</span>
                                </div>

                                <button class="btn btn-sm color-primary p-0 mt-3">Ürün Kaldır</button>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    @endforeach
</div>
