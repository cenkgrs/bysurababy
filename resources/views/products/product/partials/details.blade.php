<small class="color-muted bolded">{{ $product->sub_category->name }}</small>
<h4 class="product-title">{{ $product->name }}</h4>

<div class="product-price">{{ number_format((float)$product->price->sale_price, 2, '.', '') }} TL</div>

<div class="row mt2">
    <div class="col-lg-4 col-6">
        <h5>{{ __('Ürün Kodu') }}</h5>
        <p>{{ $product->code }}</p>
    </div>
    <div class="col-lg-4 col-6">
        <h5>{{ __('Yaş Grubu') }}</h5>
        <p>{{ $product->age }}</p>
    </div>
    <div class="col-lg-4 col-6">
        <h5>{{ __('Cinsiyet') }}</h5>
        <p>{{ ucfirst($product->gender) }}</p>
    </div>
</div>

<div class="row mt2">
    <div class="col-lg-6 col-12">
        <h5>{{ __('Renk Seçenekleri') }}</h5>
        <div class="product-colors">
            <div class="color-circle {{ $product->color }}"></div>
            @foreach ($product->colors as $color)
                <div class="color-circle {{ $color->color }}"></div>
            @endforeach()
        </div>
    </div>
    <div class="col-lg-6 col-12 pl0" style="display: contents">
        <div class="counter">
            <span class="minus">-</span>
            <input id="product_count" type="text" value="1"/>
            <span class="plus">+</span>
        </div>
        <div class="product-add">
            <button class="btn primary-button add-product-button" data-id="{{ $product->id }}">
                <i class="fa fa-cart-plus mr1"></i>
                {{ __('Sepete Ekle') }}
            </button>
        </div>
    </div>
</div>



