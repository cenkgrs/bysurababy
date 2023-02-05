<div class="panel-custom">
    <div class="panel-custom-header">
        <h6>{{ __('Onay Bekleyen Değerlendirmelerim') }}</h6>
    </div>
    <div class="panel-custom-body">
        <div class="row user-reviews">
            @foreach ($reviews['waiting'] as $review)
                @include('user.reviews.partials.review', ['operation' => 'edit'])
            @endforeach
        </div>
    
    </div>
</div>