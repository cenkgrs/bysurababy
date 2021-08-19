<div class="navbar-categories">
    <div class="container">
        <ul>
            @foreach ($categories as $cat)
                <li>
                    <a href="/products?{{ $cat->id }}">{{ $cat->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>

</div>
