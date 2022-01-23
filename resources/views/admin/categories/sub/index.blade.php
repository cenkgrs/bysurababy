@extends('admin.index')

@section('content')

    @include('admin.categories.main.partials.addCategory')

    @include('admin.categories.main.partials.list')

@endsection