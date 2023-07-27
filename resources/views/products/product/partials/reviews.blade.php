<h3 class="title-main text-center">{{ __('Değerlendirmeler') }}</h3>

<div class="panel panel-default">
    @if (isset($reviews) && $reviews)
        <div class="row">
            <div class="col-lg-12">
                @foreach ($reviews as $review)
                    <div class="review">
                        <div class="review-person">
                            {{ $review->person }}
                        </div>
                        <div class="review-content">
                            {{ $review->comment }}
                        </div>
                        <div class="review-star">
                            {{ $review->rating }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12 text-center">
                {{ __('Henüz değerlendirme bulunmuyor') }}
            </div>
        </div>
    @endif
</div>
