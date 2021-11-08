<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Sipariş Özeti</div>
            <div class="panel-body">
                <table>
                    <thead>
                        <th>Request ID</th>
                        <th>Ürün Adedi</th>
                        <th>Toplam Fiyat</th>
                        <th>Toplam Kazanç</th>
                        <th>Satış Tarihi</th>
                        <th>Durum</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $booking['request_id'] }}</td>
                            <td>{{ $booking['product_count'] }}</td>
                            <td>{{ $booking['total_price'] }}</td>
                            <td>{{ $booking['total_earning'] }}</td>
                            <td>{{ $booking['booking_date'] }}</td>
                            <td>
                                <span>
                                    @if ($booking['status'] == 'Sipariş Alındı')
                                        <div class="badge badge-dark">
                                            {{ $booking['status'] }}
                                        </div>
                                    @elseif ($booking['status'] == 'Siparişiniz Hazırlanıyor')
                                        <div class="badge badge-primary">
                                            {{ $booking['status'] }}
                                        </div>
                                    @elseif ($booking['status'] == 'Kargoya Verildi')
                                        <div class="badge badge-info">
                                            {{ $booking['status'] }}
                                        </div>
                                    @elseif ($booking['status'] == 'Teslim Edildi')
                                        <div class="badge badge-success">
                                            {{ $booking['status'] }}
                                        </div>
                                    @elseif ($booking['status'] == 'İptal Edildi')
                                        <div class="badge badge-danger">
                                            {{ $booking['status'] }}
                                        </div>
                                    @endif
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>