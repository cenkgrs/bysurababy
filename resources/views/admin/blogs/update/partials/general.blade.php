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
                                    <label for="">Başlık</label>
                                    <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" class="form-control" value="{{ $blog->slug }}">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="">Durum</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ $blog->status == 1 ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $blog->status == 0 ? 'selected' : '' }}>Pasif</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Açıklama</label>
                                    <input type="text" name="description" class="form-control" value="{{ $blog->description }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">İçerik</label>
                                    <textarea class="ckeditor form-control" name="text">{{ $blog->text }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>