<div class="section">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>Filtrele</strong>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <form action="{{ route('admin.products') }}" method="get">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Code</label>
                                        <input type="text" name="code" class="form-control" value="{{ Request::input('code') }}">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Kategori</label>
                                        <select name="category" id="category" class="form-control">
                                            <option value="">Tümü</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ Request::input('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Alt Kategori</label>
                                        <select name="sub_category" id="sub_category" class="form-control">
                                            <option value="">Tümü</option>
                                            @foreach ($sub_categories as $category)
                                                <option value="{{ $category->id }}" {{ Request::input('sub_category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="">Cinsiyet</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="">Tümü</option>
                                            <option value="male" {{ Request::input('gender') == 'male' ? 'selected' : '' }}>Erkek</option>
                                            <option value="female" {{ Request::input('gender') == 'female' ? 'selected' : '' }}>Kız</option>
                                            <option value="unisex" {{ Request::input('gender') == 'unisex' ? 'selected' : '' }}>Unisex</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary float-right">Uygula</button>
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