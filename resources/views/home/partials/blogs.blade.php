<h5 class="text-center mt2 mb2">{{ __('Blog Yazıları') }}</h5>

@foreach ($blogs as $blog)
    <div class="blog mt2">
        <div class="blog-header">
            <h5>{{ $blog->title }}</h3>
        </div>
        <div class="blog-body">
            <div class="blog-description">{{ $blog->description }}</div>
            <a class="color-primary" href="{{ route('blog', $blog->slug) }}">{{ __('Devamını Oku') }}</a>
        </div>
    </div>
@endforeach