<h3 class="title-main text-center">{{ __('Değerlendirmeler') }}</h3>

<div class="panel panel-default">
    @if (isset($reviews) && $reviews)
        {{ __('Henüz değerlendirme bulunmuyor') }}        
    @endif
</div>
