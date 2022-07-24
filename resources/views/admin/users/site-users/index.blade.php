@extends('admin.index')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card has-table">
                <header class="card-header">
                    <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-account"></i></span>
                        Üyeler
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
                                <th>Tel No</th>
                                <th>Üyelik Tarihi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-gray-500">{{ $user->id }}</td>
                                    <td class="text-gray-500">{{ $user->name }}</td>
                                    <td class="text-gray-500">{{ $user->email }}</td>
                                    <td class="text-gray-500">{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
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

@endsection