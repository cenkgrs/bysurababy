@extends('index')

@section('content')

<div class="row">
    @foreach ($categories as $category)
        <div>{{ $category->name }}</div>
    @endforeach
</div>

@endsection
