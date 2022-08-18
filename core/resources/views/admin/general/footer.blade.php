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
                    <h3 class="tile-title ">Footer Section</h3>
                    <div class="tile-body">
                        <form role="form" method="POST" action="{{route('general.store')}}">
                            {{ csrf_field() }}
                            <div class="form-body">
                                <div class="form-group">
                                    <label><strong>Footer</strong></label>
                                    <input type="text" name="footer" class="form-control" value="{{$general->footer}}">
                                </div>

                                <div class="form-group">
                                    <label><strong>Footer Text</strong></label>
                                    <input type="text" name="footer_text" class="form-control" value="{{$general->footer_text}}">
                                </div>

                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
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
