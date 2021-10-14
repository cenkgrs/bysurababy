<div class="blog mt2">
    <div class="blog-header">
        <h5>{{ $blog->title }}</h3>
    </div>
    <div class="blog-body">
        <div class="blog-description">{{ $blog->description }}</div>
        <a class="color-primary" href="{{ route('blog', ['slug' => $blog->slug]) }}">{{ __('Devamı Oku') }}</a>
    </div>
</div>