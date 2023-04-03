@extends('admin.index')

@section('content')

    @include('admin.partials.messages')

    @include('admin.categories.sub.partials.addCategory')

    @include('admin.categories.sub.partials.list')

    @include('admin.categories.sub.partials.editCategory')

@endsection