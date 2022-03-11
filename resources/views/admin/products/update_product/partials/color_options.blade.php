<div class="section">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Renk Seçenekleri</strong>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        @foreach ($sub_products as $sub_product)
                            <form action="{{ route('admin.products.updateProductPost') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="sub_product_id" value={{ $sub_product->id }}>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">Renk</label>
                                            <input type="text" name="color" class="form-control" placeholder="red" value="{{ $sub_product->color }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">Resim</label>
                                            <input type="file" name="image" class="form-control" accept="image/*">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <input type="submit" name="updateColor" class="btn btn-primary" style="margin-top: 32px" value="Güncelle">
                                        </div>
                                    </div>
                                    <div class="col-lg-1">
                                        <div class="form-group">
                                            <input type="submit" name="deleteColor" class="btn btn-danger" style="margin-top: 32px" value="Sil">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach

                        <form action="{{ route('admin.products.updateProductPost') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Renk</label>
                                        <input type="text" name="color" class="form-control" placeholder="red">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Resim</label>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <input type="submit" name="addColor" class="btn btn-success" style="margin-top: 32px" value="Yeni Renk Ekle">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>