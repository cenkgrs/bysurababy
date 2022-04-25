<div class="row">
    <div class="col-lg-12">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-cart-outline"></i></span>
                    Ürünler
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
                            <th>Code</th>
                            <th>İsim</th>
                            <th>Kategori <br> Alt Kategori</th>
                            <th>Renk Seçeneği</th>
                            <th>Alım Fiyatı</th>
                            <th>Satış Fiyatı</th>
                            <th>Kazanç</th>
                            <th>Cinsiyet</th>
                            <th>Yaş</th>
                            <th>Stok Adedi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }} <br> {{ $product->sub_category->name }}</td>
                                <td>
                                    <?php
                                        $color_quantity = 1;
                                        foreach ($product->colors as $color) {
                                            $color_quantity++;   
                                        }
                                    ?>
                                    {{ $color_quantity }}
                                </td>
                                <td>{{ $product->price->purchase_price }} ₺</td>
                                <td>{{ $product->price->sale_price }} ₺</td>
                                <td>{{ $product->price->sale_price - $product->price->purchase_price }} ₺</td>
                                <td>{{ $product->gender == "unisex" ? "Unisex" : ($product->gender == "male" ? "Erkek" : "Kız") }}</td>
                                <td>{{ $product->age }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    @if($product->status)
                                        <div class="badge badge-success">Aktif</div>
                                    @else
                                        <div class="badge badge-danger">Pasif</div>
                                    @endif
                                </td>
                                <td>
                                    <a target="_blank" style="font-weight: 500" href="{{ route('admin.products.updateProductGet', $product->id)}}">Düzenle</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


                <div class="table-pagination">
                    <div class="flex items-center justify-between">
                        <div class="buttons">
                        {{$products->links("pagination::bootstrap-4")}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>