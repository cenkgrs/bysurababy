@if (isset($categories) && $categories)
    <div class="navbar-categories">
        <div class="container">
            <ul>
                @foreach ($categories as $key => $category)
                    <li>
                        <a href="/products?category={{ $category->id }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
@endif
