@extends('admin.index')

@section('content')

    @include('admin.partials.messages')

    @include('admin.categories.main.partials.addCategory')

    @include('admin.categories.main.partials.list')

    @include('admin.categories.main.partials.editCategory')

@endsection