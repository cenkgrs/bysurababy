@extends('index')

@section('content')

    <div class="row mt2">
        <div class="col-lg-2">
            @include('user.partials.user_management')                
        </div>
        
        <div class="col-lg-10">

            <div class="form-panel">
                <div class="row">
                    <div class="col-lg-4">
                        <h6>{{ __('Adres Bilgilerim') }}</h6>
                    </div>
                    <div class="col-lg-8">
                        <a class="btn pull-right p-0" data-toggle="modal" data-target="#addAddressModal">
                            <i class="mdi mdi-plus color-primary mr1"></i>
                            {{ __('Yeni Adres Ekle') }}
                        </a>
                    </div>
                </div>
            </div>

            @include('user.addresses.partials.add')

            @include('user.addresses.partials.list')                
        </div>
    </div>

@endsection
