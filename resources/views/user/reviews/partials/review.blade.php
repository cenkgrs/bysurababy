<div class="col-lg-6">
    <div class="review">
        <div class="row">

        @if ($operation == 'insert')
            <div class="col-lg-4">
                <div class="review-image">
                    <img src="{{ asset('/images/products/'.$product['photo'].'') }}" alt="{{ $product['name'] }}">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="review-title">
                    {{ $product['name'] }}
                </div>
                <div class="review-summary">
                    <a href="{{ route('addReviewGet', ['request_id' => $product['request_id'], 'product_id' => $product['id']) }}" class="btn review-button primary-button">{{ __("Ürünü Değerlendir") }}</a>
                </div>
            </div>
        @else
            <div class="col-lg-4">
                <div class="review-image">
                    <img src="{{ asset('/images/products/'.$review->product->id.'.jpg') }}" alt="{{ $review->product->name }}">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="review-title">
                    {{ $review->product->name }}
                </div>
                <div class="review-summary">
                  
                    <a href="{{ route('editReviewGet', ['id' => $review['id']]) }}" class="btn review-button primary-button">
                        {{ __("Düzenle") }}
                    </a>

                    <a href="{{ route('deleteReview', ['id' => $review['id']]) }}" class="btn review-button secondary-button">
                        {{ __("Sil") }}
                    </a>
                  
                </div>
            </div>
        @endif
            
        </div>
        
    </div>
</div>