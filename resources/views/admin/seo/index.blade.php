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

    <div class="row">
        <div class="col-lg-12 mb-3">
            <a class="btn btn-success" target="_blank" style="font-weight: 500" href="{{ route('admin.seo.addSeoText')}}">Metin Ekle</a>
        </div>
    </div>

    @include('admin.seo.partials.list')

@endsection