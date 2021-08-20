@extends('index')

@section('content')

<div class="row">
    @foreach ($categories as $category)
        <div class="col-lg-3">
            <div class="category">
                <span>{{ $category->name }}</span>
            </div>
        </div>
    @endforeach
</div>

@endsection
