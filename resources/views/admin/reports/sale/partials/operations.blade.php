<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">İşlemler</div>
            <div class="panel-body">
                <table>
                    <thead>
                        <th>Sipariş Hazırlanıyor</th>
                        <th>Kargoya Verildi</th>
                        <th>Sipariş Alındı</th>
                        <th>İptal Et</th>
                        <th>Teslim Edildi</th>
                    </thead>
                    <tbody>
                        <tr>
                            <form method="POST" action="{{ route('admin.reports.sale', $booking['request_id']) }}">
                                @csrf
                                <td>
                                    <button class="badge badge-dark" type="submit" name="sale" value="1">Sipariş Alındı</button>
                                </td>
                                <td>
                                    <button class="badge badge-primary" type="submit" name="prepare" value="1">Sipariş Hazırlanıyor</button>
                                </td>
                                <td>
                                    <button class="badge badge-info" type="submit" name="cargo" value="1">Kargoya Verildi</button>
                                </td>
                                
                                <td>
                                    <button class="badge badge-danger" type="submit" name="cancel" value="1">İptal Et</button>
                                </td>
                                <td>
                                    <button class="badge badge-success" type="submit" name="delivered" value="1">Teslim Edildi</button>
                                </td>
                            </form>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>