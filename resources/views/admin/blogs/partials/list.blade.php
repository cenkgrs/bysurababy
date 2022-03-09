<div class="row">
    <div class="col-lg-12">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-cart-outline"></i></span>
                    Bloglar
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
                            <th>Başlık</th>
                            <th>Slug</th>
                            <th>Durum</th>
                            <th>Oluşturulma Tarihi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->slug }}</td>
                                <td>{{ $blog->status }}</td>
                                <td>{{ date('d-m-Y', strtotime($blog->created_at)) }}</td>
                                <td><a href="{{ route('admin.blogs.updateBlogGet', $blog->id) }}">Düzenle</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>