<div class="col-lg-12">

    @if ($addresses)
        <div class="payment-address">
            <h5 class="mb1">{{ __("Teslimat Adresi") }}</h5>

            <select class="form-control" name="address" id="address" required>
                @foreach ($addresses as $address)
                    <option value="{{ $address->id }}">{{ __($address->address_name) }}</option>
                @endforeach
            </select>
        </div>
        

    @else

        <div class="payment-address">
            <h5 class="mb1">{{ __("Teslimat Adresi") }}</h5>

            <textarea required class="form-control" placeholder="{{ __('Lütfen açık adresinizi giriniz...') }}"></textarea>

        </div>

    @endif
</div>