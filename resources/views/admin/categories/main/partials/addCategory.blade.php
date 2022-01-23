@if(Session::has('success_message'))
  <div class="alert alert-success">
      {{ Session::get('success_message') }}
  </div>
@endif

<form action="{{ route('admin.subCategories') }}" method="post">

    @csrf

    <div class="section">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Kategori Ekle</strong>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Kategori İsmi</label>
                                        <input type="text" name="name" class="form-control" placeholder="Kategori">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Sıralama</label>
                                        <input type="text" name="rating" class="form-control" placeholder="5">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group mt-4">
                                        <label for="submit"></label>
                                        <input type="submit" class="btn btn-primary mt-2" id="submit" value="Ekle">
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</form>