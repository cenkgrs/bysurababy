<div class="col-lg-12">

    @if ($addresses)

        

    @else

        <div class="payment-address">
            <h5 class="mb1">{{ __("Teslimat Adresi") }}</h5>

            <textarea required clas="form-control" placeholder="{{ __("Lütfen açık adresinizi giriniz...") }}"></textarea>

        </div>

    @endif
</div>
