@extends('admin.index')

@section('content')

@if(session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
@endif

@if(session()->has('error_message'))
    <div class="alert alert-danger">
        {{ session()->get('error_message') }}
    </div>
@endif

<form action="{{ route('admin.seo.addSeoText') }}" method="post">

    @csrf

    <div class="section">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Genel</strong>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-success">
                            <div class="row">

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Slug</label>
                                        <select name="slug" id="slug" class="form-control">
                                            <option value="contact">İletişim</option>
                                            <option value="sss">SSS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">İçerik</label>
                                        <textarea class="ckeditor form-control" name="text"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="submit" class="btn btn-primary" value="Kaydet">
    

</form>

<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

@endsection