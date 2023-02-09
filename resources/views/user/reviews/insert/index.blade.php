@extends('index')

@section('content')

    <div class="row mt2">
        <div class="col-lg-2">
            @include('user.partials.user_management')                
        </div>
        
        <div class="col-lg-10">

            <div class="row">
                <div class="col-lg-12 col-12">
                    <h5> {{ __("Ürünü Değerlendir") }}</h5>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-2 col-3">
                    <img class="width-auto h-10" src="{{ asset('/images/products/'.$product['photo'].'') }}" alt="{{ $product['name'] }}">
                </div>

                <div class="col-lg-10 col-9">
                    {{ $product['name'] }}
                </div>
            </div>

            {{ Form::open(array('route' => 'addReviewPost')) }}

                {{ Form::token(); }}

                {{ Form::hidden('request_id'), $booking_item->request_id }}

                <div class="form-panel">
                    
                    <div class="row mt2">

                        <div class="col-lg-12">
                            <label for="">{{ __('Puanınız') }}</label>
                        </div>
                        <div class="col-lg-12 col-12">
                            
                            <div class="star-wrapper">
                                <a href="#" class="fas fa-star s1 rating-star" data-rating="1"></a>
                                <a href="#" class="fas fa-star s2 rating-star" data-rating="2"></a>
                                <a href="#" class="fas fa-star s3 rating-star" data-rating="3"></a>
                                <a href="#" class="fas fa-star s4 rating-star" data-rating="4"></a>
                                <a href="#" class="fas fa-star s5 rating-star" data-rating="5"></a>
                            </div>

                            {{ Form::hidden('rating'), '' }}
                        
                        </div>

                        <div class="col-lg-12 col-12 form-group">
                            <label for=""> {{ __('Yorumunuz') }}
                                {{ Form::textarea('comment', ['class' => 'form-control']) }}
                            </label>
                        </div>

                        <div class="col-lg-12">
                            {{ Form::submit(__('Gönder', ['class' => 'btn btn-primary'])) }}
                        </div>

                    </div>

                </div>

            {{ Form::close() }}

        </div>
    </div>

@endsection
