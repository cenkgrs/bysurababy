<div class="nav-bar">
    <div class="container mt1 mb2">
        <div class="row">
            <div class="col-lg-12">
                <div class="upper-navbar">
                    <ul>
                        <li><a href="/products"><span>{{ __("Ürünler") }}</span></a></li>
                        <li><a href="/categories"><span>{{ __("Kategoriler") }}</span></a></li>
                        <li><a href="/contact"><span>{{ __("Blog") }}</span></a></li>
                        <li><a href="/contact"><span>{{ __("Vizyon") }}</span></a></li>
                        <li><a href="/contact"><span>{{ __("İletişim") }}</span></a></li>
                        <li><a href="/contact"><span>{{ __("Siparişlerim") }}</span></a></li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="row nav">
            <div class="col-lg-12 fixed-container">
                <div class="row">
                    <div class="col-lg-2 col-6">
                        <img src="{{ asset('/images/logo-background.png') }}" alt="">
                    </div>
                    <div class="col-lg-6 col-0" id="search-column">
                        <div class="nav-bar-search">
                            <i class="fa fa-search"></i>
                            <input class="form-control" type="text" name="search" placeholder="{{ __("Aramak istediğiniz ürünün ismini veya kategorisini giriniz") }}...">
                            <button class="btn search-button primary-button">{{ __("Ara") }}</button>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="row">
                            <div class="col-lg-8 col-8">
                                <div class="auth">
                                    @auth
                                        <button class="btn primary-button"><i class="fa fa-user"></i>
                                            <span>{{ __("Hesabım") }}</span>
                                        </button>
                                    @endauth
                                    @guest
                                        <button class="btn primary-button"><i class="fa fa-user"></i>
                                            <span>{{ __("Giriş Yap / Üye Ol") }}</span>
                                        </button>
                                    @endguest
                                </div>
                            </div>
                            <div class="col-lg-4 col-4">
                                <div class="shopping-cart">
                                    <button class="btn primary-button"><i class="fa fa-cart-plus"></i>
                                        <span>{{ __("Sepetim") }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
