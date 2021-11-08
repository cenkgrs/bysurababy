@extends('index')

@section('content')

    <form action="{{ route('booking') }}" method="post">
        @csrf

          
            <div class="row mt2">
                <div class="col-lg-2">
                    @include('user.partials.user_management')                
                </div>
                @if (!$orders)
                    <div class="col-lg-10 col-10">
                        <h4 class="color-primary">{{ __('Herhangi bir siparişiniz bulunmamaktadır') }}</h4>
                    </div>
                @else
                    <div class="col-lg-10">
                        @include('user.orders.partials.list')
                    </div>
                @endif
            </div>


    </form>

@endsection
