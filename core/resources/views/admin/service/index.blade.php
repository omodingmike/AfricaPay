@extends('admin.layout.master')
@section('css')

@stop
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">Service Section Title</h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="{{route('general.store')}}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label><strong>Title</strong></label>
                                <input type="text" name="service_title" class="form-control" value="{{$general->service_title}}">
                            </div>

                            <div class="form-group">
                                <label><strong>Sub-Title</strong></label>
                                <input type="text" name="service_sub_title" class="form-control" value="{{$general->service_sub_title}}">
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
                    <div class="table">

                        <div class="caption font-dark pull-left">
                            <i class="icon-settings font-dark"></i>
                            <a class="btn btn-primary bold" target="_blank" href="https://fontawesome.com/v4.7.0/icons/">View Font Icons</a>
                        </div>

                        <div class="caption font-dark pull-right">
                            <i class="icon-settings font-dark"></i>
                            <button id="btn_add" data-toggle="modal" data-target="#myModal" class="btn btn-primary bold"><i class="fa fa-plus"></i> Add New </button>
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>

                        <div class="row">
                            @foreach($team as $data)

                                <div class="col-md-6">
                                    <div class="tile">
                                        <h3 class="title text-center">Icon:  <i class="fa fa-{{$data->icon}}"></i></h3>
                                        <h3 class="tile-title text-center">Name: {{$data->title}}</h3>
                                        <div class="tile-body text-center"> Description:  {{$data->detail}}</div>
                                        <div class="tile-footer">
                                            <a class="btn btn-primary" data-toggle="modal" href="#editModal{{$data->id}}">Edit</a>
                                            <a class="btn btn-danger pull-right" data-toggle="modal" href="#delModal{{$data->id}}">Delete</a>
                                        </div>
                                    </div>
                                </div>


                                <div id="delModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form role="form" action="{{route('service.destroy', $data->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <div class="modal-body">
                                                    <h2 style="color: red;">Are you sure?</h2>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"> Edit Testimonial</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <form id="frmProducts" method="post" action="{{route('service.update', $data->id)}}" class="form-horizontal" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <strong>Service Icon:</strong>
                                                        <input type="text" class="form-control" value="{{$data->icon}}" name="icon" placeholder="Ex: user" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <strong>Service Name:</strong>
                                                        <input type="text" class="form-control" value="{{$data->title}}" name="title" placeholder="Name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <strong>Service Description:</strong>
                                                        <textarea class="form-control" name="detail" rows="3">{{$data->detail}}</textarea>

                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                    <button type="submit" class="btn btn-primary bold uppercase"><i class="fa fa-send"></i> Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"> Add New Service</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form id="frmProducts" method="post" action="{{route('service.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <strong>Service Icon:</strong>
                                <input type="text" class="form-control"  name="icon" placeholder="Ex: user" required>
                            </div>

                            <div class="form-group">
                                <strong>Service Name:</strong>
                                <input type="text" class="form-control"  name="title" placeholder="Name" required>
                            </div>

                            <div class="form-group">
                                <strong>Service Description:</strong>
                                <textarea class="form-control" name="detail" rows="3"></textarea>

                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            <button type="submit" class="btn btn-primary bold uppercase"><i class="fa fa-send"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>

@stop
@section('script')

@stop
