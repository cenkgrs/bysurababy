@if (isset($breadcrumbs) && $breadcrumbs)
<ul class="breadcrumbs">
    @foreach ($breadcrumbs as $key => $breadcrumb)
        <li>
            @if ($key !== 0)
                <i class="fa fa-chevron-right"></i>
            @endif
            <a href="{{ $breadcrumb['route'] }}">
                <span>{{ $breadcrumb['title'] }}</span>
            </a>
        </li>
    @endforeach
</ul>
@endif
