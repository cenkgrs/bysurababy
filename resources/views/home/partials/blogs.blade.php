@foreach ($blogs as $blog)
    <div class="blog">
        <div class="blog-header">
            <h3>{{ $blog->title }}</h3>
        </div>
        <div class="blog-body">
            <div class="blog-description"></div>
            <a href="{{ route('blog', ['slug' => $blog->slug]) }}"></a>
        </div>
    </div>
@endforeach