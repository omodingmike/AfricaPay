@extends('admin.layout.master')

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
                    <form role="form" method="POST" action="{{route('terms.store')}}">
                        @csrf

                        <div class="form-group">
                            <strong>Name</strong>
                            <input type="text" class="form-control" name="name" >
                        </div>
                        <div class="form-group">
                            <strong>Title</strong>
                            <input type="text" class="form-control" name="title" >
                        </div>

                        <div class="form-group">
                            <strong>Details</strong>
                            <textarea class="form-control" name="text" rows="15"></textarea>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
@section('script')
    <script>
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>
@stop
