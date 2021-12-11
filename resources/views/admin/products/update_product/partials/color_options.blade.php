<div class="section">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Renk Seçenekleri</strong>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        @foreach ($sub_products as $product)
                            <form action="{{ route('admin.products.updateProductPost') }}" method="post">
                                <input type="hidden" name="sub_product_id" value={{ $product->id }}>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <label for="">Renk</label>
                                            <input type="text" name="color" class="form-control" placeholder="42.30" value="{{ $product->color }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <input type="text" name="updateColor" class="btn btn-primary" style="margin-top: 32px" value="Güncelle">
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <input type="text" name="updateColor" class="btn btn-danger" style="margin-top: 32px" value="Sil">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach

                        <form action="{{ route('admin.products.updateProductPost') }}" method="post">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Renk</label>
                                        <input type="text" name="color" class="form-control" placeholder="red">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <input type="text" name="updateColor" class="btn btn-success" style="margin-top: 32px" value="Yeni Renk Ekle">
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