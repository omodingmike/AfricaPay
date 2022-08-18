@extends('admin.layout.master')
@section('import-css')
    <link href="{{ asset('assets/admin/css/jquery.fileupload.css') }}" rel="stylesheet">
@stop
@section('body')
    <div class="row">
        <div class="col-md-12">
            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</strong>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            <div class="tile">
                <div class="tile-body">
                    <form role="form" method="POST" action="{{route('background.image.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">

                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('assets/images/footer.jpg')}}" alt="image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Newsletter Background Image(Template 1)  <br>& Statistics Background Image(Template 4)</h5>
                                        <input type="file" class="form-control" name="footer">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('assets/images/about.jpg')}}" alt="image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">About Background Image(Template 4)</h5>
                                        <input type="file" class="form-control" name="about">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-actions right col-md-12">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@stop

@section('import-script')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop
