<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Panel</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Saira Semi Condensed">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="account-container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <img src="{{ asset('/images/logo-background.png') }}" alt="">
            </div>
        </div>

        <div class="account-form">
        
            <div class="account-form-header">
                <h3 class="text-center">{{ __('Admin Girişi') }}</h3>

                @if(@isset($error_message) && $error_message)
                    <div class="color-primary">
                        {{ $error_message }}
                    </div>
                @endif

                <div class="account-form-body">
                    <form method="POST" action="{{ route('admin.login') }}">
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
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
