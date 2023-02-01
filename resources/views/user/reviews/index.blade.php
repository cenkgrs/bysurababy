@extends('index')

@section('content')

    <div class="row mt2">
        <div class="col-lg-2">
            @include('user.partials.user_management')                
        </div>
        
        <div class="col-lg-10">

            <div class="form-panel">
                <div class="row">
                    <h6>{{ __('Değerlendirmelerim') }}</h6>
                </div>
            </div>

            <div class="form-panel">
                <div class="row">
                    <h6>{{ __('Değerlendirmelerimeyi Bekleyen Siparişlerim') }}</h6>
                </div>
            </div>
                
        </div>
    </div>

@endsection
