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

<form action="{{ route('admin.seo.updateSeoText', $page->id) }}" method="post">

    @csrf

    <input type="hidden" name="seo_id" value="{{ $page->id }}">

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

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="">İçerik</label>
                                        <textarea class="ckeditor form-control" name="text">{{ $page->text }}</textarea>
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

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>

@endsection