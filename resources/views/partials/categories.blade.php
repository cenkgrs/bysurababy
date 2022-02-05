    <div class="navbar-categories">
        <div class="container">
            <ul>
                @foreach ($category_stickers as $key => $category)
                    @if (isset($sticker_products[$key]) && $sticker_products[$key])

                        <li>
                            <a href="/products?category={{ $category->id }}">{{ $sticker_products[$key]->name }}</a>
                        </li>
                        
                    @endif
                @endforeach
            </ul>
        </div>

    </div>
