<div class="nav-bar">
    <div class="container mt1 mb2">
        <div class="row">
            <div class="col-lg-12">
                <div class="upper-navbar">
                    <ul>
                        <li><a href="/products"><span>{{ __("Ürünler") }}</span></a></li>
                        <li><a href="/categories"><span>{{ __("Kategoriler") }}</span></a></li>
                        @if (!Auth::check())
                            <li><a href="{{ route('register') }}"><span>{{ __("Üye Ol") }}</span></a></li>
                            <li><a href="{{ route('login') }}"><span>{{ __("Üye Girişi") }}</span></a></li>
                        @endif
                        <li><a href="/siparislerim"><span>{{ __("Siparişlerim") }}</span></a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="row nav">
            <div class="col-lg-12 fixed-container">
                <div class="row">
                    <div class="col-lg-2 col-6">
                        <a href="{{ route('index') }}">
                            <img src="{{ asset('/images/logo-background.png') }}" alt="">
                        </a>
                    </div>
                    <div class="col-lg-6 col-0" id="search-column">
                        <div class="nav-bar-search">
                            <input class="form-control" type="text" name="search" placeholder="{{ __("Aramak istediğiniz ürünün ismini veya kategorisini giriniz") }}...">
                            <button class="btn search-button">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="row">
                            <div class="col-lg-8 col-8">
                                <div class="auth">
                                    @auth
                                        <div class="dropdown">
                                            <button class="btn primary-button">
                                                <i class="fa fa-user"></i>
                                                <span>{{ __("Hesabım") }}</span>
                                            </button>

                                            <div class="dropdown-content">
                                                <a href="{{ route('orders') }}">{{ __("Siparişlerim") }}</a>
                                                <a href="{{ route('addresses') }}">{{ __("Adreslerim") }}</a>
                                                <a href="{{ route('reviews') }}">{{ __("Değerlendirmelerim") }}</a>
                                                <a href="{{ route('favorites') }}">{{ __("Favorilerim") }}</a>
                                                <a href="#">{{ __("Ayarlarım") }}</a>
                                                <a href="{{ route('logout') }}">{{ __("Çıkış Yap") }}</a>
                                            </div>
                                        </div>
                                    @endauth
                                    @guest
                                        <a href="{{ route('login') }}" class="btn primary-button"><i class="fa fa-user"></i>
                                            <span>{{ __("Giriş Yap / Üye Ol") }}</span>
                                        </a>
                                    @endguest
                                </div>
                            </div>
                            <div class="col-lg-4 col-4">
                                <div class="auth">
                                    <a href="{{ route('cart') }}" class="btn primary-button"><i class="fa fa-cart-plus"></i>
                                        <span>{{ __("Sepetim") }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
