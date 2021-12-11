@extends('admin.index')

@section('content')

@if(@isset($success_message) && $success_message)
    <div class="alert alert-success">
        {{ $success_message }}
    </div>
@endif

<form action="{{ route('admin.products.updateProductPost') }}" method="post">

    @csrf

    <input type="hidden" name="product_id" value="{{ $product->id }}">

    @include('admin.products.update_product.partials.general')

    @include('admin.products.update_product.partials.price')

    <input type="submit" class="btn btn-primary mb-3" value="Kaydet">

</form>

@include('admin.products.update_product.partials.color_options')

@endsection