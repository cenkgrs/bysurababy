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

    @include('admin.users.panel-users.partials.insert')

    @include('admin.users.panel-users.partials.list')

@endsection