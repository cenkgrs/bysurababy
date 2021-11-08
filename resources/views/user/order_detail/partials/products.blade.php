<div class="order mt2">
    <div class="order-header">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="mt-2">{{ __('Ürünler') }}</h5>
            </div>
        </div>
    </div>
    <div class="order-body">
        @foreach ($order['products'] as $product)
        @endforeach
    </div>
</div>