@extends('index')

@section('content')

    @if (isset($text) && $text)
        {!! $text !!}
    @endif

@endsection