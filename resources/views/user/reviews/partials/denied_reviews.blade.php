<div class="panel-custom">
    <div class="panel-custom-header">
        <h6>{{ __('Reddedilen Değerlendirmelerim') }}</h6>
    </div>
    <div class="panel-custom-body">
        <div class="row user-reviews">
            @foreach ($reviews['denied'] as $review)
                @include('user.reviews.partials.review', ['operation' => 'edit', 'review' => $review])
            @endforeach
        </div>
    
    </div>
</div>