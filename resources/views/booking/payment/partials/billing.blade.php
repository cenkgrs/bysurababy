<div class="col-lg-12 mt2 mb2">

    <div class="row">
        <div class="col-lg-6 col-12">
            <h5> {{ __("Fatura Bilgileri") }}</h5>
        </div>
        <div class="col-lg-3 col-3 form-group">
            <label for="" style="float:right"> {{ __('Bireysel') }}
                <input type="radio" name="is_company" id="indiviual_checkbox" value="individual" checked="checked">
            </label>
        </div>
        <div class="col-lg-3 col-4 form-group">
            <label for="" style="float:right"> {{ __('Kurumsal') }}
                <input type="radio" name="is_company" id="firm_checkbox" value="firm">
            </label>
        </div>

        <small class="text-muted">{{ __("Fatura için seçilen adres sadece bilgi amaçlıdır. Ürünleriniz “Teslimat adresi” bölümünde seçtiğiniz adrese teslim edilir.") }}</small>

    </div>

    <div class="form-panel">

        <div class="row">
            <div class="col-lg-4 col-6 form-group">
                <label for=""> {{ __('İsim') }}
                    <input class="form-control" type="text" name="billing[name]" required>
                </label>
            </div>

            <div class="col-lg-4 col-6 form-group">
                <label for=""> {{ __('Soyisim') }}
                    <input class="form-control" type="text" name="billing[surname]" required>
                </label>
            </div>

            <div class="col-lg-4 col-6 form-group">
                <label for=""> {{ __('Şehir') }}
                    <input class="form-control" type="text" name="billing[city]" required>
                </label>
            </div>

        </div>

        <div class="row mt2">

            <div class="col-lg-4 col-6 form-group">
                <label for=""> {{ __('İlçe') }}
                    <input class="form-control" type="text" name="billing[district]" required>
                </label>
            </div>

            <div class="col-lg-4 col-6 form-group">
                <label for=""> {{ __('Fatura Adresi') }}
                    <input class="form-control" type="text" name="billing[address]" required>
                </label>
            </div>

            <div class="col-lg-4 col-6 form-group">
                <label for=""> {{ __('Posta Kodu') }}
                    <input class="form-control" type="text" name="billing[zip_no]" required>
                </label>
            </div>
        </div>

        <div class="row mt2 firm-informations d-none">
            <div class="col-lg-4 col-6 form-group">
                <label for=""> {{ __('Firma İsmi') }}
                    <input class="form-control" type="text" name="billing[firm_name]">
                </label>
            </div>
            <div class="col-lg-4 col-6 form-group">
                <label for=""> {{ __('Vergi Dairesi') }}
                    <input class="form-control" type="text" name="billing[tax_authority]">
                </label>
            </div>
            <div class="col-lg-4 col-6 form-group">
                <label for=""> {{ __('Vergi No') }}
                    <input class="form-control" type="text" name="billing[tax_no]">
                </label>
            </div>
        </div>
    </div>

</div>