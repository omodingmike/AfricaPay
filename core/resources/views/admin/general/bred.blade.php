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

                    <div class="row">
                        <div class="caption font-dark pull-left">
                            <i class="icon-settings font-dark"></i>
                            <a class="btn btn-primary bold" target="_blank" href="https://fontawesome.com/v4.7.0/icons/">View Font Icons</a>
                        </div>
                    </div>
                    <br>
                    <br>


                    <form role="form" method="POST" action="{{route('general.store')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">

                            <div class="col-md-4 card">
                                <div class="card-header text-center">

                                    <h4>Static Content 1</h4>

                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        <input type="text" class="form-control" name="static_title_1" value="{{$general->static_title_1}}">
                                    </div>

                                    <div class="form-group">
                                        <strong>Number:</strong>
                                        <input class="form-control" type="text" value="{{$general->static_number_1}}" name="static_number_1">
                                    </div>

                                    <div class="form-group">
                                        <strong>Icon:</strong>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="static_icon_1" value="{{$general->static_icon_1}}">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-{{$general->static_icon_1}}"></i></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="col-md-4 card">
                                <div class="card-header text-center">

                                    <h4>Static Content 2</h4>

                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        <input type="text" class="form-control" name="static_title_2" value="{{$general->static_title_2}}">
                                    </div>

                                    <div class="form-group">
                                        <strong>Number:</strong>
                                        <input class="form-control" type="text" value="{{$general->static_number_2}}" name="static_number_2">
                                    </div>

                                    <div class="form-group">
                                        <strong>Icon:</strong>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="static_icon_2" value="{{$general->static_icon_2}}">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-{{$general->static_icon_2}}"></i></div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="col-md-4 card">
                                <div class="card-header text-center">

                                    <h4>Static Content 3</h4>

                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <strong>Title:</strong>
                                        <input class="form-control" type="text" name="static_title_3" value="{{$general->static_title_3}}">
                                    </div>

                                    <div class="form-group">
                                        <strong>Number:</strong>
                                        <input class="form-control" type="text" value="{{$general->static_number_3}}" name="static_number_3">
                                    </div>

                                    <div class="form-group">
                                        <strong>Icon:</strong>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="static_icon_3" value="{{$general->static_icon_3}}">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fa fa-{{$general->static_icon_3}}"></i></div>
                                            </div>
                                        </div>

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

