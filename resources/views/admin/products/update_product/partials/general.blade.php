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
                                    <input type="text" name="code" class="form-control" value="{{ $product->code }}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Ürün Adı</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="category" id="category" class="form-control">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Alt Kategori</label>
                                    <select name="sub_category" id="sub_category" class="form-control">
                                        @foreach ($sub_categories as $category)
                                            <option value="{{ $category->id }}" {{ $product->sub_category->id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Cinsiyet</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male" {{ $product->gender == "male" ? 'selected' : '' }}>Erkek</option>
                                        <option value="female" {{ $product->gender == "female" ? 'selected' : '' }}>Kız</option>
                                        <option value="unisex" {{ $product->gender == "unisex" ? 'selected' : '' }}>Unisex</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Renk</label>
                                    <input type="text" name="color" class="form-control" placeholder="dark-blue | red (İngilizce - ayracıyla girelim)" value="{{ $product->color }}">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Yaş Grubu</label>
                                    <select name="age" id="age" class="form-control">
                                        <option value="0-6 Ay" {{ $product->gender == "0-6 Ay" ? 'selected' : '' }}>0-6 Ay</option>
                                        <option value="3-9 Ay" {{ $product->gender == "3-9 Ay" ? 'selected' : '' }}>3-9 Ay</option>
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