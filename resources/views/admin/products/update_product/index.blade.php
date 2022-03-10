@extends('admin.index')

@section('content')

@if(session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
@endif

@if(session()->has('error_message'))
    <div class="alert alert-danger">
        {{ session()->get('error_message') }}
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