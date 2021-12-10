<div class="section">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Genel Bilgiler</strong>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Ürün Kodu</label>
                                    <input type="text" name="code" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Ürün Adı</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="category" id="category" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Alt Kategori</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        @foreach ($sub_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Cinsiyet</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male">Erkek</option>
                                        <option value="female">Kız</option>
                                        <option value="unisex">Unisex</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Renk</label>
                                    <input type="text" name="color" class="form-control" placeholder="dark-blue | red (İngilizce - ayracıyla girelim)">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Yaş Grubu</label>
                                    <select name="age" id="age" class="form-control">
                                        <option value="0-6 Ay">0-6 Ay</option>
                                        <option value="3-9 Ay">3-9 Ay</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>