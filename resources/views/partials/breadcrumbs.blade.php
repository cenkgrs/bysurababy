@if (isset($breadcrumbs) && $breadcrumbs)
<ul class="breadcrumbs">
    @foreach ($breadcrumbs as $breadcrumb)
        <li>
            <a href="{{ $breadcrumb['route'] }}">
                <span>{{ $breadcrumb['title'] }}</span>
                <i class="fa fa-flag-checkered"></i>
            </a>
        </li>
    @endforeach
</ul>
@endif
