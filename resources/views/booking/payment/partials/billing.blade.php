<div class="col-lg-12 mt5">

    <div class="row mb2">

        <div class="col-lg-6 col-6">
            <h6> {{ __("Fatura Bilgileri") }}</h6>
        </div>
        <div class="col-lg-3 col-3">
            <label for=""> {{ __('Bireysel') }}
                <input type="radio" name="is_company" id="is_company" value="1" checked="checked">
            </label>
        </div>
        <div class="col-lg-3 col-3">
            <label for=""> {{ __('Kurumsal') }}
                <input type="radio" name="is_company" id="is_company" value="0">
            </label>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-6">
            <label for=""> {{ __('İsim Soyisim') }}
                <input class="form-control" type="text" name="name">
            </label>
        </div>

        <div class="col-lg-6 col-6">
            <label for=""> {{ __('Şehir') }}
                <input class="form-control" type="text" name="city">
            </label>
        </div>

        <div class="col-lg-6 col-6">
            <label for=""> {{ __('İlçe') }}
                <input class="form-control" type="text" name="district">
            </label>
        </div>

        <div class="col-lg-6 col-6">
            <label for=""> {{ __('Fatura Adresi') }}
                <input class="form-control" type="text" name="address">
            </label>
        </div>

        <div class="firm-informations display-none">
            <div class="col-lg-6 col-6">
                <label for=""> {{ __('Vergi Dairesi') }}
                    <input class="form-control" type="text" name="tax_authority">
                </label>
            </div>
            <div class="col-lg-6 col-6">
                <label for=""> {{ __('Vergi No') }}
                    <input class="form-control" type="text" name="tax_no">
                </label>
            </div>
        </div>
      
    </div>
</div>
