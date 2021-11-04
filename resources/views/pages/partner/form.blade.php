@extends('index')

@section('content')

<div class="account-container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <img src="{{ asset('/images/logo-background.png') }}" alt="">
        </div>
    </div>

    <div class="account-form">

        <div class="account-form-header">
            <h3 class="text-center">{{ __('Başvuru Formu') }}</h3>
            <div class="account-form-body">
                <form method="POST" action="{{ route('partner-application') }}">
                    @csrf

                    <div class="form-group mb-3">
                        <input type="text" placeholder="{{ __('Ad Soyad') }}" id="name" class="form-control" name="name" required autofocus>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" placeholder="{{ __('Telefon') }}" id="phone" class="form-control" name="phone" required autofocus>
                        @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" placeholder="{{ __('E-Posta') }}" id="email" class="form-control" name="email" required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn primary-button">{{ __('Gönder') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection