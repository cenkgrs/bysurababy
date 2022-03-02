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
                    <h3 class="text-center">{{ __('Üye Ol') }}</h3>

                    @if(session()->has('error_message'))
                        <div class="alert alert-danger">
                            {{ session()->get('error_message') }}
                        </div>
                    @endif


                    <div class="account-form-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="{{ __('İsim Soyisim') }}" id="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="{{ __('E-Posta') }}" id="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <input type="password" placeholder="{{ __('Şifre') }}" id="password" class="form-control" name="password" required>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn primary-button">{{ __('Üye Ol') }}</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
@endsection
