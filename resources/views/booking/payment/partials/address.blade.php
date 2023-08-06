<div class="col-lg-12">

    @if ($addresses)
        <div class="payment-address">
            <h5 class="mb1">{{ __("Teslimat Adresi") }}</h5>

            <select class="form-control" name="address_id" id="address" required>
                @foreach ($addresses as $address)
                    <option value="{{ $address->id }}">{{ __($address->address_name) }}</option>
                @endforeach
            </select>
        </div>
        

    @else

        <div class="payment-address">
            <h5 class="mb1">{{ __("Teslimat Adresi") }}</h5>

            <h6>{{ (__('Yeni Adres Ekle')) }}</h6>

            <div class="row">
                <div class="col-lg-12 mb-3">
                    <div class="form-group">
                        <label class="font-small" for="">{{ __('Adres Başlığı') }}</label>
                        <input type="text" name="address_name" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-small" for="">{{ __('Ad') }}</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="font-small" for="">{{ __('Soyad') }}</label>
                        <input type="text" name="surname" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="form-group">
                        <label class="font-small" for="">{{ __('Telefon') }}</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="form-group">
                        <label class="font-small" for="">{{ __('İl') }}</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="form-group">
                        <label class="font-small" for="">{{ __('İlçe') }}</label>
                        <input type="text" name="district" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 mt-3">
                    <div class="form-group">
                        <label class="font-small" for="">{{ __('Posta Kodu') }}</label>
                        <input type="text" name="zip_no" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <div class="form-group">
                        <label class="font-small" for="">{{ __('Adres') }}</label>
                        <textarea type="text" name="address" class="form-control" placeholder="{{ __('Lütfen açık adresinizi giriniz...') }}"></textarea>
                    </div>
                </div>
            </div>

        </div>

    @endif
</div>