<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">İletişim</div>
            <div class="panel-body">
                <table>
                    <thead>
                        <th>Üye ID</th>
                        <th>İsim</th>
                        <th>Soyisim</th>
                        <th>Email</th>
                        <th>Telefon</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $contact['user_id'] }}</td>
                            <td>{{ $contact['name'] }}</td>
                            <td>{{ $contact['surname'] }}</td>
                            <td>{{ $contact['email'] }}</td>
                            <td>{{ $contact['phone'] }}</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>