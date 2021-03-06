<div class="col-lg-12 mt2">

    <div class="row">
        <div class="col-lg-12 col-12">
            <h5> {{ __("İletişim Bilgileri") }}</h5>
            <small class="text-muted">{{ __("Siparişiniz ile ilgili güncellemeler bu iletişim adreslerine iletilecektir.") }}</small>
        </div>

    </div>

    <div class="form-panel">

        <div class="row">
            <div class="col-lg-6 col-6 form-group">
                <label for=""> {{ __('İsim') }}
                    <input class="form-control" type="text" name="contact[name]" required>
                </label>
            </div>

            <div class="col-lg-6 col-6 form-group">
                <label for=""> {{ __('Soyisim') }}
                    <input class="form-control" type="text" name="contact[surname]" required>
                </label>
            </div>

        </div>

        <div class="row mt2">

            <div class="col-lg-6 col-6 form-group">
                <label for=""> {{ __('E-Posta') }}
                    <input class="form-control" type="text" name="contact[email]" required>
                </label>
            </div>

            <div class="col-lg-6 col-6 form-group">
                <label for=""> {{ __('Telefon') }}
                    <input class="form-control" type="text" name="contact[phone]" required>
                </label>
            </div>

        </div>

    </div>


</div>
