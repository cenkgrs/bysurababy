<div class="order mt2">
    <div class="order-header">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="mt-2">{{ __('Ödeme Bilgileri') }}</h5>
            </div>
        </div>
    </div>
    <div class="order-body">
        <div class="payment-details">
            <ul>
                <li>
                    {{ __('Ürün Toplamı') }}
                    <span>{{ $order['payment']['total_price'] }} TL</span>
                </li>
                <li>
                    {{ __('Kargo Tutarı') }}
                    <span>{{ $order['payment']['cargo_price'] }} TL</span>
                </li>
                @if ($order['payment']['free_cargo'])
                    <li>
                        {{ $order['payment']['free_cargo'] }}
                        <span>- {{ $order['payment']['cargo_price'] }} TL</span>
                    </li>
                @endif
            </ul>
        </div>
        <div class="payment-result">
            <span>{{ __('Toplam') }}</span>
            <span>{{ $order['payment']['total_price'] }} TL</span>
        </div>
    </div>
</div>