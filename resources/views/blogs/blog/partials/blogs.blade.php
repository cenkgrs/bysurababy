<div class="row">

    @foreach ($blogs as $blog)

        <div class="col-lg-4">
            <div class="blog">
                <div class="blog-header">
                    <h5>{{ $blog->title }}</h3>
                </div>
                <div class="blog-body">
                    <div class="blog-description">{{ $blog->description }}</div>
                    <a class="color-primary" href="{{ route('blog', ['slug' => $blog->slug]) }}">{{ __('Oku') }}</a>
                </div>
            </div>
        </div>

    @endforeach

</div>