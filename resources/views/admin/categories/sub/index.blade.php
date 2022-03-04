@extends('admin.index')

@section('content')

    @include('admin.categories.sub.partials.addCategory')

    @include('admin.categories.sub.partials.list')

@endsection