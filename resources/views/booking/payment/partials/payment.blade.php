<div class="cart-payment cart-payment-sticky">
    <div class="cart-payment-header">
        <h5>{{ __('Ödenecek Tutar') }}</h5>
        <h4>{{ number_format((float)$total_price, 2, '.', '') }} ₺</h4>
    </div>


    <div class="cart-payment-details">
        <ul>

            @foreach($products as $product)
            <li>{{ $product["name"] }}
                <span>{{ $product["price"] }} ₺ X {{ $product["quantity"] }}</span>
            </li>

            @endforeach

            <li class="mt2">{{ __("Kargo") }}
                @if ($free_cargo)
                    <span>{{ __("Bedava") }}</span>
                @else
                    <span>10 TL</span>
                @endif
            </li>
        </ul>
    </div>

    <div class="cart-payment-footer">
        <button type="submit" class="btn primary-button w-100">{{ __("Siparişi Tamamla") }}</button>
    </div>
</div>
