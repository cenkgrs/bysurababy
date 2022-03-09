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

<form action="{{ route('admin.blogs.updateBlogPost') }}" method="post">

    @csrf

    <input type="hidden" name="blog_id" value="{{ $blog->id }}">

    @include('admin.blogs.update.partials.general')

    <input type="submit" class="btn btn-primary mb-3" value="Kaydet">

</form>

@endsection