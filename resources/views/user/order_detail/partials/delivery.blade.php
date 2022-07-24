<div class="order mt2">
    <div class="order-header">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="mt-2">{{ __('Teslimat Bilgileri') }}</h5>
            </div>
        </div>
    </div>
    <div class="order-body">
        <div class="payment-details">
            <ul>
                <li>
                    {{ __('Adres İsmi') }}
                    <span>{{ $order['delivery']['address_name'] }}</span>
                </li>
                <li>
                    {{ __('İl') }}
                    <span>{{ $order['delivery']['city'] }}</span>
                </li>
                <li>
                    {{ __('İlçe') }}
                    <span>{{ $order['delivery']['district'] }}</span>
                </li>
            </ul>
        </div>

        <small class="d-block">{{ $order['delivery']['address'] }}</small>
    </div>
</div>