<div class="panel-custom">
    <div class="panel-custom-header">
        <h6>{{ __('Favorilerim') }}</h6>
    </div>
    <div class="panel-custom-body">

        <div class="row products">
            @foreach ($favorites as $favorite)
                <div class="col-lg-4 col-6">
                    <div class="product" data-href="{{ route('product', $favorite->product->id) }}">
                        <div class="product-image">
                            <img src="{{ asset('/images/products/' . $favorite->product->id . ' .jpg') }}" alt="{{ $favorite->product->name }}">
                        </div>
                        <div class="product-title">
                            {{ $favorite->product->name }}
                        </div>
                        <div class="product-attributes">
                            <div class="product-colors">
                                <div class="color-circle {{ $favorite->product->color }}"></div>
                                @foreach ($favorite->product->colors as $color)
                                    <div class="color-circle {{ $color->color }}"></div>
                                @endforeach
                            </div>
                            <div class="product-age">
                                {{ $favorite->product->age }}
                            </div>
                        </div>
                        <div class="product-summary">
                            <div class="product-price">
                                {{ formatPrice($favorite->product->price->sale_price) }} ₺
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="btn secondary-button remove-favorite" data-id="{{ $favorite->id }}">
                                        {{ __("Kaldır") }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="btn sale-button primary-button">
                                        {{ __("Sepete Ekle") }}
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