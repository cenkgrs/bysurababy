@extends('admin.index')

@section('content')
    <section class="section main-section">
        <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">

            <div class="card">
                <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                    <h3>
                        Satış Sayısı
                    </h3>
                    <h1>
                        {{ $bookings['sale_count'] }}
                    </h1>
                    </div>
                    <span class="icon widget-icon text-red-500"><i class="mdi mdi-finance mdi-48px"></i></span>
                </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                    <h3>
                        Satış
                    </h3>
                    <h1>
                        {{ number_format($bookings['total_sale'], 2) }} TRY
                    </h1>
                    </div>
                    <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
                </div>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                <div class="flex items-center justify-between">
                    <div class="widget-label">
                    <h3>
                        Toplam Kazanç
                    </h3>
                    <h1>
                        {{ number_format($sales['earning'], 2) }} TRY
                    </h1>
                    </div>
                    <span class="icon widget-icon text-green-500"><i class="mdi mdi-currency-try mdi-48px"></i></span>
                </div>
                </div>
            </div>
        </div>

        <div class="notification blue">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
                <div>
                <span class="icon"><i class="mdi mdi-buffer"></i></span>
                <b>Responsive table</b>
                </div>
                <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
            </div>
        </div>

       
    </section>
@endsection
