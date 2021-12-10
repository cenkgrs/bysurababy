@extends('admin.index')

@section('content')

@if(@isset($success_message) && $success_message)
    <div class="alert alert-success">
        {{ $success_message }}
    </div>
@endif

<form action="{{ route('admin.products.addProduct') }}" method="post">

    @csrf

    @include('admin.products.add_product.partials.general')

    @include('admin.products.add_product.partials.price')

    <input type="submit" class="btn btn-primary" value="Kaydet">

</form>

@endsection