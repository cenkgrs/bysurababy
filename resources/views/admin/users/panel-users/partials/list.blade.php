<div class="row">
    <div class="col-lg-12">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-account"></i></span>
                    Panel Kullanıcıları
                </p>
                <a href="#" class="card-header-icon">
                <span class="icon"><i class="mdi mdi-reload"></i></span>
                </a>
            </header>
            <div class="card-content">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>İsim Soyisim</th>
                            <th>Email</th>
                            <th>Üyelik Tarihi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($panel_users as $user)
                            <tr>
                                <td class="text-gray-500">{{ $user->id }}</td>
                                <td class="text-gray-500">{{ $user->name }}</td>
                                <td class="text-gray-500">{{ $user->email }}</td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($user->created_at)) }}</td>
                                <td>
                                    <a class="btn btn-danger" href="{{ route('admin.panelUsers.delete', $user->id) }}">Sil</a>
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