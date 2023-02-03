<div class="panel-custom">
    <div class="panel-custom-header">
        <h6>{{ __('Değerlendirmelerimeyi Bekleyen Siparişlerim') }}</h6>
    </div>
    <div class="panel-custom-body">
        <div class="row user-reviews">
            @foreach ($reviews['products'] as $review)
                @include('user.reviews.partials.review', [data-operation = 'insert'])
            @endforeach
        </div>
    
    </div>
</div>