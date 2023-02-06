
<div class="tabs">
    <input type="radio" name="tab" id="tab1" checked="checked">
    <label for="tab1">{{ __('Ürün Değerlendir') }}</label>

    <input type="radio" name="tab" id="tab2">
    <label for="tab2">{{ __('Onaylanan') }}</label>

    <input type="radio" name="tab" id="tab3">
    <label for="tab3">{{ __('Beklemede') }}</label>

    <input type="radio" name="tab" id="tab4">
    <label for="tab4">{{ __('Reddedilen') }}</label>
  
    <div class="tab-content-wrapper">
        <div id="tab-content-1" class="tab-content">
            @include('user.reviews.partials.products')                
        </div>
        
        <div id="tab-content-2" class="tab-content">
            @include('user.reviews.partials.verified_reviews')                
        </div>
        
        <div id="tab-content-3" class="tab-content">
            @include('user.reviews.partials.waiting_reviews')                
        </div>
        
        <div id="tab-content-4" class="tab-content">
            @include('user.reviews.partials.denied_reviews')                
        </div>
    </div>
</div>