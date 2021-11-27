@extends('admin.index')

@section('content')

@include('admin.products.partials.filter')

@include('admin.products.partials.list')

@endsection