<form action="{{ route('admin.panelUsers.add') }}" method="post">

    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="section">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Kullanıcı Ekle</strong>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">İsim Soyisim</label>
                                        <input type="text" name="name" class="form-control" placeholder="İsim Soyisim">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Şifre</label>
                                        <input type="password" name="password" class="form-control" placeholder="Şifre">
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