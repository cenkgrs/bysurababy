@extends('admin.index')

@section('content')

@include('admin.reports.sales.partials.filter')

@include('admin.reports.sales.partials.list')

@endsection