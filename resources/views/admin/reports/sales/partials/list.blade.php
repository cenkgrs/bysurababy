<div class="row">
    <div class="col-lg-12">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-cart-outline"></i></span>
                    Satışlar
                </p>
                <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
                </a>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                        <tr>
                            <th>Request ID</th>
                            <th>İsim Soyisim</th>
                            <th>Email <br> Telefon</th>
                            <th>Ürün Adedi</th>
                            <th>Toplam Fiyat <br> Kazanç</th>
                            <th>Durum</th>
                            <th>Satış Tarihi <br> Güncelleme Tarihi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $booking)
                            <tr>
                                <td><a target="_blank" style="font-weight: 500" href="{{ route('admin.reports.sale', $booking->request_id)}}">{{ $booking->request_id }}</a></td>
                                <td class="text-gray-500">{{ $booking->contact->name }} {{ $booking->contact->surname }}</td>
                                <td class="text-gray-500">{{ $booking->contact->email }} <br> {{ $booking->contact->phone }}</td>
                                <td class="text-gray-500">{{ $booking->quantity }}</td>
                                <td class="text-gray-500">{{ number_format($booking->total_price, 2) }} TRY <br> {{ number_format($booking->total_earning, 2) }} TRY</td>
                                <td>
                                    <button>
                                        @if ($booking->status == 1)
                                            <div class="badge badge-dark">
                                                {{ Helper::getBookingStatus($booking->status) }}
                                            </div>
                                        @elseif ($booking->status == 2)
                                            <div class="badge badge-primary">
                                                {{ Helper::getBookingStatus($booking->status) }}
                                            </div>
                                        @elseif ($booking->status == 3)
                                            <div class="badge badge-info">
                                                {{ Helper::getBookingStatus($booking->status) }}
                                            </div>
                                        @elseif ($booking->status == 4)
                                            <div class="badge badge-success">
                                                {{ Helper::getBookingStatus($booking->status) }}
                                            </div>
                                        @elseif ($booking->status == 5)
                                            <div class="badge badge-danger">
                                                {{ Helper::getBookingStatus($booking->status) }}
                                            </div>
                                        @endif
                                    </button>
                                </td>
                                <td>{{ $booking->created_at }} <br> {{ $booking->updated_at }}</td>
                                <td>
                                    <a target="_blank" style="font-weight: 500" href="{{ route('admin.reports.sale', $booking->request_id)}}">Satış Detayı</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="table-pagination">
                    <div class="flex items-center justify-between">
                        <div class="buttons">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>