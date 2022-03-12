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

<form action="{{ route('admin.products.addProduct') }}" method="post" enctype="multipart/form-data">

    @csrf

    @include('admin.products.add_product.partials.general')

    @include('admin.products.add_product.partials.price')

    <input type="submit" class="btn btn-primary" value="Kaydet">

</form>

@endsection