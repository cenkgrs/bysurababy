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

            <div class="form-panel">
                
                <div class="row">
                    <div class="col-lg-12">
                    <label for="">{{ __('Puanınız') }}</label>

                    </div>
                    <div class="col-lg-12 col-12">
                        
                        <div class="star-wrapper">
                            <a href="#" class="fas fa-star s1"></a>
                            <a href="#" class="fas fa-star s2"></a>
                            <a href="#" class="fas fa-star s3"></a>
                            <a href="#" class="fas fa-star s4"></a>
                            <a href="#" class="fas fa-star s5"></a>
                        </div>
                        
                      
                    </div>
                </div>


                <div class="row mt2">

                    <div class="col-lg-12 col-12 form-group">
                        <label for=""> {{ __('Yorumunuz') }}
                            <textarea type="text" name="comment" class="form-control"></textarea>
                        </label>
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
