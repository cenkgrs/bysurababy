@extends('index')

@section('content')

    <div class="row mt2">
        <div class="col-lg-2">
            @include('user.partials.user_management')                
        </div>
        
        <div class="col-lg-10">

            <div class="panel-custom">
                <div class="panel-custom-header">
                    <h6>{{ __('Değerlendirmelerim') }}</h6>
                </div>
                <div class="panel-custom-body">
                    <div class="row user-reviews">
                        @foreach ($reviews['verified'] as $review)
                            <div class="col-lg-6">
                                <div class="review">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="review-image">
                                                <img src="{{ asset('/images/products/'.$review->product->id.'.jpg') }}" alt="{{ $review->product->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="review-title">
                                                {{ $review->product->name }}
                                            </div>
                                            <div class="review-summary">
                                               
                                                <div class="btn review-button primary-button">
                                                    {{ __("Ürünü Değerlendir") }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  
                                   
                                </div>
                            </div>
                        @endforeach
                    </div>
                
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
