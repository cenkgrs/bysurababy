<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Ürünler</div>
            <div class="panel-body">
                <table>
                    <thead>
                        <th>Code</th>
                        <th>Ürün İsmi</th>
                        <th>Ürün Adedi</th>
                        <th>Toplam Fiyat</th>
                        <th>Toplam Kazanç</th>
                    </thead>
                    <tbody>
                        @foreach($booking_items as $item)
                            <tr>
                                <td>{{ $item['code'] }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ number_format($item['total_price'], 2) }} ₺</td>
                                <td>{{ number_format($item['total_earning'], 2) }} ₺</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>