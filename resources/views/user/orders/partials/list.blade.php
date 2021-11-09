<div class="orders">
    @foreach ($orders as $order)
        <div class="order">
            <div class="order-header">
                <div class="row">
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
                    <div class="col-lg-2 col-8">
                        <a class="btn primary-button" href="{{ route('order', $order['request_id']) }}"><span>{{ __('Sipariş Detayı') }}</span></a>
                    </div>
                </div>
            </div>
            <div class="order-body">
                @foreach ($order['products'] as $product)
                    <div class="order-product">
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <h6>{{ $order['order_status'] }}</h6>

                                @if ($order['status_code'] == 1)
                                    <small>{{ $order['humanized_date'] }} Tarihinde sipariş verilmiştir.</small>
                                @elseif ($order['status_code'] == 2)
                                    <small>{{ $order['humanized_date'] }} Tarihinde sipariş verilmiştir.</small>
                                @elseif ($order['status_code'] == 3)
                                    <small>{{ $order['cargo']['created_at'] }} Tarihinde kargoya verilmiştir.</small>
                                @elseif ($order['status_code'] == 4)
                                    <small>{{ $order['cargo']['delivery_date'] }} Tarihinde teslim edilmiştir.</small>
                                @elseif ($order['status_code'] == 5)
                                    <small>{{ $order['cancel_date'] }} Tarihinde iptal edilmiştir.</small>
                                @endif

                            </div>
                            <div class="col-lg-4 col-12">
                                <span>{{ $product['name'] }}</span>
                            </div>
                            <div class="col-lg-4 col-12">
                                <form method="POST" action="{{ route('orders') }}">
                                    @csrf
                                    <input type="hidden" name="operation" value="1">
                                    <input type="hidden" name="request_id" value="{{ $order['request_id'] }}">
                                    @if ($order['operation'] == "Cancel")
                                        <button type="submit" name="cancel" value="1" class="btn secondary-button">{{ __('İptal Et') }}</button>
                                    @elseif ($order['operation'] == 'Refund')
                                        <button type="submit" name="refund" value="1" class="btn secondary-button">{{ __('İade Et') }}</button>
                                    @elseif ($order['status_code'] == '5')
                                        <span class="float-end color-primary">
                                            {{ $order['order_status'] }}
                                        </span>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>