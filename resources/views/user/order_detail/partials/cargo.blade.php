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
                        <img src="" alt="">
                    </div>
                    <p class="text-center">{{ $info["text"] }}</span>
                </div>
            @endforeach
            
        </div>

    </div>
</div>