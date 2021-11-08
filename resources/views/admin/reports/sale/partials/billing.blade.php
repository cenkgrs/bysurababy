<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Fatura Bilgileri</div>
            <div class="panel-body">
                <table>
                    <thead>
                        <th>Fatura Tipi</th>
                        <th>İsim</th>
                        <th>Soyisim</th>
                        <th>Telefon</th>
                        <th>Şehir</th>
                        <th>İlçe</th>
                        <th>Adres</th>
                        <th>Firma</th>
                        <th>Posta Kodu</th>
                        <th>Vergi Dairesi</th>
                        <th>Vergi No</th>


                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $billing['type'] }}</td>
                            <td>{{ $billing['name'] }}</td>
                            <td>{{ $billing['surname'] }}</td>
                            <td>{{ $billing['phone'] }}</td>
                            <td>{{ $billing['city'] }}</td>
                            <td>{{ $billing['district'] }}</td>
                            <td>{{ $billing['address'] }}</td>
                            <td>{{ $billing['firm_name'] }}</td>
                            <td>{{ $billing['zip_no'] }}</td>
                            <td>{{ $billing['tax_authority'] }}</td>
                            <td>{{ $billing['tax_no'] }}</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>