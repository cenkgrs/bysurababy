<div class="row">
    <div class="col-lg-12">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-cart-outline"></i></span>
                    Seo Metinleri
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
                            <th>Slug</th>
                            <th>Oluşturulma Tarihi <br> Düzenlenme Tarihi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($seo_pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->slug }}</td>
                                <td>{{ date('d.m.Y H:i:s', strtotime($page->created_at)) }} <br> {{ date('d.m.Y H:i:s', strtotime($page->updated_at)) }}</td>
                                <td>
                                    <a class="btn btn-primary" target="_blank" style="font-weight: 500" href="{{ route('admin.seo.updateSeoText', $page->id)}}">Düzenle</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" target="_blank" style="font-weight: 500" href="{{ route('admin.seo.deleteSeoText', $page->id)}}">Sil</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>