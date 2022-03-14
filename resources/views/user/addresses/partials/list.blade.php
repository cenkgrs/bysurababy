<div class="row">
    @foreach($addresses as $address)
        <div class="col-lg-6">
            <div class="panel-custom">
                <div class="panel-custom-header">
                    <h6>{{ $address->address_name }}</h6>
                </div>

                <div class="panel-custom-body">
                    <small class="d-block font-weight-500">{{ $address->name }} {{ $address->surname }}</small>
                    <small class="d-block mt-2">{{ $address->address }}</small>
                    <small class="d-block mt-2">{{ $address->city }} / {{ $address->district }}</small>
                    <small class="d-block mt-2">{{ $address->phone }}</small>

                    <a href="{{ route('deleteAddress', $address->id) }}" class="btn mt-3 p-0"><i class="mdi mdi-trash-can-outline color-primary mr-5"></i>Sil</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
