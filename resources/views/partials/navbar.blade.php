<div class="nav-bar">
    <div class="container mt2 mb2">
        <div class="row">
            <div class="col-lg-8"></div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-6">
                <img src="{{ asset('/images/logo-background.png') }}" alt="">
            </div>
            <div class="col-lg-6 col-0" id="search-column">
                <div class="nav-bar-search">
                    <i class="fa fa-search"></i>
                    <input class="form-control" type="text" name="search" placeholder="Aramak istediğiniz ürünün ismini veya kategorisini giriniz...">
                    <button class="btn search-button">Ara</button>
                </div>
            </div>
            <div class="col-lg-2 col-4">
                <div class="auth">
                @auth
                    <button class="btn primary-button"><i class="fa fa-user"></i>Hesabım</button>
                @endauth
                @guest
                    <button class="btn primary-button"><i class="fa fa-user"></i>
                        <span>Giriş Yap / Üye Ol</span>
                    </button>
                @endguest
                </div>

            </div>
            <div class="col-lg-2 col-2">
                <div class="shopping-cart">
                    <button class="btn primary-button"><i class="fa fa-cart-plus"></i>
                        <span>Sepetim</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
