@extends('index')

@section('content')

    @if (isset($seo_text) && $seo_text)
        {!! $seo_text !!}
    @endif

@endsection