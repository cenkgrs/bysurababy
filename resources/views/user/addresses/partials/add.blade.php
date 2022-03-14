<!-- Modal -->
<div class="modal fade" id="addAddressModal" tabindex="-1" role="dialog" aria-labelledby="addAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">{{ __('Adres Ekle') }}</h5>
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                </button>
            </div>
            <form action="{{ route('addAddress') }}" method="post">
                <div class="modal-body">

                        @csrf
                        
                        <div class="row">
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
                                    <label class="font-small" for="">{{ __('Adres Başlığı') }}</label>
                                    <input type="text" name="address_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <div class="form-group">
                                    <label class="font-small" for="">{{ __('Adres') }}</label>
                                    <textarea type="text" name="address" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn background-primary color-white">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>