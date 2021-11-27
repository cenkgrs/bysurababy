<div class="section">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Filtrele</strong>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <input type="text" name="code" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Tümü</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Alt Kategori</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Tümü</option>
                                        @foreach ($sub_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Code</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="male">Erkek</option>
                                        <option value="female">Kız</option>
                                        <option value="unisex">Unisex</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="text" class="btn btn-primary float-right">Uygula</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>