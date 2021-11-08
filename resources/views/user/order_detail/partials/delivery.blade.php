<div class="order mt2">
    <div class="order-header">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="mt-2">{{ __('Teslimat Bilgileri') }}</h5>
            </div>
        </div>
    </div>
    <div class="order-body">
        <small>{{ $order['delivery']['name'] }}</small>
        <small>{{ $order['delivery']['address'] }}</small>
        <small class="d-block">{{ $order['delivery']['city'] }} / {{ $order['delivery']['district'] }}</small>
    </div>
</div>