<div class="panel-custom">
    <div class="panel-custom-header">
        <h6>{{ __('Değerlendirmelerim') }}</h6>
    </div>
    <div class="panel-custom-body">
        <div class="row user-reviews">
            @foreach ($reviews['verified'] as $review)
                @include('user.reviews.partials.review', [data-operation = 'edit'])
            @endforeach
        </div>
    
    </div>
</div>