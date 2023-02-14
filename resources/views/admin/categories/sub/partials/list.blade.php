<div class="row">
    <div class="col-lg-12">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-cart-outline"></i></span>
                    Kategoriler
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
                            <th>Alt Kategori</th>
                            <th>Ana Kategori</th>
                            <th>Sıralama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub_categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->category->name }}</td>
                                <td>{{ $category->rating }}</td>
                                <td>
                                    <a href="{{ route('admin.removeCategory', ['type' => 'category', 'id' => $category->id]) }}">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                        Kaldır
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>