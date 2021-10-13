@foreach ($blogs as $blog)
    <div class="blog">
        <div class="blog-header">
            <h5>{{ $blog->title }}</h3>
        </div>
        <div class="blog-body">
            <div class="blog-description">{{ $blog->description }}</div>
            <a href="{{ route('blog', ['slug' => $blog->slug]) }}">Devamı...</a>
        </div>
    </div>
@endforeach