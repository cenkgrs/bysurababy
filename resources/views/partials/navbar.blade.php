<div class="nav-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-8"></div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <img src="{{ asset('/images/logo-background.png') }}" alt="">
            </div>
            <div class="col-lg-5">
                <div class="nav-bar-search">
                    <input class="form-control" type="text" name="search" placeholder="Aramak istediğiniz ürünün ismini veya kategorisini giriniz...">
                    <button class="btn search-button">Ara</button>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="auth">
                @auth
                    <button class="btn"><i class="fa fa-user"></i>Hesabım</button>
                @endauth
                @guest
                    <button class="btn"><i class="fa fa-user"></i>Giriş Yap / Üye Ol</button>
                @endguest
                </div>
                <div class="shopping-cart">
                    <button class="btn"><i class="fas fa-shopping-basket"></i>Sepetim</button>
                </div>
            </div>
        </div>
    </div>

</div>