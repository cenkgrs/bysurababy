@extends('index')

@section('content')

    <form action="{{ route('booking') }}" method="post">
        @csrf

        <div class="row mt2">
            <div class="col-lg-2">
                @include('user.partials.user_management')                
            </div>
            <div class="col-lg-10">
                @include('user.orders.partials.list')
            </div>
        </div>

    </form>

@endsection
