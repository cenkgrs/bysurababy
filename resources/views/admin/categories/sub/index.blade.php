@extends('admin.index')

@section('content')

    @include('admin.partials.messages')

    @include('admin.categories.sub.partials.addCategory')

    @include('admin.categories.sub.partials.editCategory')

    @include('admin.categories.sub.partials.list')

@endsection