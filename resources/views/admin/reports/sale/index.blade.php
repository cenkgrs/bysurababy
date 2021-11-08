@extends('admin.index')

@section('content')

    @include('admin.reports.sale.partials.booking')

    @include('admin.reports.sale.partials.products')

    @include('admin.reports.sale.partials.contact')

    @include('admin.reports.sale.partials.billing')

@endsection