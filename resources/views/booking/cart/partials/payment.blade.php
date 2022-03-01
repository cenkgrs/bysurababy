<div class="cart-payment">
    <div class="cart-payment-header">
        <h5>{{ __('Ödenecek Tutar') }}</h5>
        <h4><span id="cart-total-payment">{{ number_format( (float) $total_price, 2, '.', '' ) }}</span> ₺</h4>
    </div>

    <div class="cart-payment-details">
        <ul>
            <li id="cart-cargo-price-line">
                {{ __("Kargo") }}
                @if ($free_cargo)
                    <span>{{ __("Bedava") }}</span>
                @else
                    <span>10 TL</span>
                @endif
            </li>
        </ul>
    </div>

    <div class="cart-payment-footer">
        <a class="btn primary-button" href="{{ route('booking') }}">{{ __("Ödemeye Geç") }}</a>
    </div>
</div>
