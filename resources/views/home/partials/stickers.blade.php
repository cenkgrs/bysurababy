<div class="row mb-2 mt-5">
    @foreach ($stickers as $sticker)
        <div class="col-lg-4 mb-3">
            <div class="sticker background-{{ $sticker['background'] }}">
                <div class="row">
                    <div class="col-lg-2 col-2">
                        <i class="{{ $sticker['icon'] }} sticker-icon color-{{ $sticker['background'] }}"></i>
                    </div>
                    <div class="col-lg-10 col-10">
                        <div class="sticker-text {{ $sticker['color'] }}">
                            {{ $sticker['text'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>