<div class="order mt2">
    <div class="order-header">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="mt-2">{{ __('Kargo Bilgileri') }}</h5>
            </div>
        </div>
    </div>
    <div class="order-body">
        
        <div class="row">

            @foreach ($order["cargo"] as $info)
                <div class="col-lg-3 col-2">
                    <div class="category-sticker m-auto mt-3" style="width: 4rem">
                        <i class="mdi text-center {{ $info['status'] == true ? 'color-primary mdi-thumb-up-outline' : 'mdi-loading' }}" style="display:block"></i>
                    </div>
                    <p class="text-center mt-3 {{ $info['status'] == true ? 'color-primary' : ''}}">{{ $info["text"] }}</span>
                </div>
            @endforeach
            
        </div>

    </div>
</div>