<div class="category-stickers">
    <div class="row">
        @foreach ($category_stickers as $key => $category)
            <div class="col-lg-1 col-2">
                <a href="/products?category={{ $category->id }}">
                    <div class="category-sticker">
                        <img src="{{ asset('/images/products/'.$sticker_products[$key]->id.'.jpg') }}" alt="{{ $sticker_products[$key]->name }}">
                    </div>
                </a>
                <span>{{ $category->name }}</span>
            </div>
        @endforeach
    </div>
</div>