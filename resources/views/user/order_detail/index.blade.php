@extends('index')

@section('content')

<div class="row mt2">
    <div class="col-lg-2">
        @include('user.partials.user_management')                
    </div>
    <div class="col-lg-10">
        <div class="orders">

            @include('user.order_detail.partials.summary')

            <div class="row">
                <div class="col-lg-6">
                    @include('user.order_detail.partials.delivery')
                </div>
                <div class="col-lg-6">
                    @include('user.order_detail.partials.payment')
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @include('user.order_detail.partials.cargo')
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    @include('user.order_detail.partials.products')
                </div>
            </div>

        </div>
    </div>
</div>




@endsection
