<div class="row mb1">
    <div class="col-lg-12">
        <h5 class="color-primary">{{ __('Hesabım') }}</h5>
    </div>
</div>

<div class="filter user-management-filter">
    <div class="row">

        <div class="col-lg-12">

            <div class="row mt1 mb1">
                <div class="col-lg-12 side-link">
                    <i class="mdi mdi-cart-outline mr1"></i>
                    <a href="{{ route('orders') }}">{{ __('Siparişlerim') }}</a>
                </div>
                <div class="col-lg-12 side-link mt1">
                    <i class="mdi mdi-map-marker-outline mr1"></i>
                    <a href="{{ route('addresses') }}">{{ __('Adreslerim') }}</a>
                </div>
            </div>

        </div>
    </div>
</div>
