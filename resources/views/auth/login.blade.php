@extends('auth.index')

@section('content')

        <div class="account-container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="{{ asset('/images/logo-background.png') }}" alt="">
                </div>
            </div>

            <div class="account-form">

                <div class="account-form-header">
                    <h3 class="text-center">{{ __('Giriş Yap') }}</h3>
                    <div class="account-form-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="{{ __('E-Posta') }}" id="email" class="form-control" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="{{ __('Şifre') }}" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn primary-button">{{ __('Giriş yap') }}</button>
                            </div>

                            <div class="form-group mt2 mb-3">
                                <div class="checkbox">
                                    <label>
                                        <a> {{ __('Şifremi Unuttum') }}</a>
                                    </label>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
@endsection
