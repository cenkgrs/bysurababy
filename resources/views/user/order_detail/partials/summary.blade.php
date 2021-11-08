<div class="order">
    <div class="order-header">
        <div class="row">
            <div class="col-lg-2">
                <h5 class="mt-2">{{ __('Sipariş Detayı') }}</h5>
            </div>
            <div class="col-lg-3 col-4">
                <h6>{{ __('Sipariş Tarihi') }}</h6>
                <small>{{ $order['created_at'] }}</small>
            </div>
            <div class="col-lg-3 col-4">
                <h6>{{ __('Sipariş Özeti') }}</h6>
                <small>{{ $order['product_count'] }} {{ __('Ürün') }}</small>
            </div>
            <div class="col-lg-3 col-4">
                <h6>{{ __('Alıcı') }}</h6>
                <small>{{ $order['owner'] }} </small>
            </div>
            <div class="col-lg-1 col-4">
                <h6>{{ __('Tutar') }}</h6>
                <small>{{ $order['total_price'] }} TL</small>
            </div>
        </div>
    </div>
</div>