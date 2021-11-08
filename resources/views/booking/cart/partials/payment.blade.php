<div class="cart-payment">
    <div class="cart-payment-header">
        <h5>{{ __('Ödenecek Tutar') }}</h5>
        <h4>{{ number_format((float)$total_price, 2, '.', '') }} ₺</h4>
    </div>

    <div class="cart-payment-details">
        <ul>
            <li>{{ __("Kargo") }}
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
