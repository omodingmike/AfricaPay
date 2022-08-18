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
                    <div class="table">

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
                                    <div class="col-md-4">
                                        <div class="tile">
                                            <div class="card text-center">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <ul class="list-group">
                                                                <li class="list-group-item" style="font-weight: bold">Name: {{$data->name}}</li>
                                                                <li class="list-group-item">Time:  {{$data->time}} Hours</li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <a href="#editModal{{$data->id}}" data-toggle="modal" class="btn btn-primary btn-block">Edit</a>
                                                        </div>

                                                        <div class="col-6">
                                                            <a href="#delModal{{$data->id}}" data-toggle="modal" class="btn btn-danger btn-block">Delete</a>
                                                        </div>

                                                    </div>
                                                </div>
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
                                            <form role="form" action="{{route('time.destroy', $data->id)}}" method="post">
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
                                            <form id="frmProducts" method="post" action="{{route('time.update', $data->id)}}" class="form-horizontal" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <strong>Time Name: </strong>
                                                        <input type="text" class="form-control" value="{{$data->name}}"  name="name"  required>
                                                    </div>

                                                    <div class="form-group">
                                                        <strong>Time in Hours</strong>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control"  name="time" value="{{$data->time}}"  required>
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">Hours</div>
                                                            </div>
                                                        </div>
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
                        <h4 class="modal-title" id="myModalLabel"> Add New Time</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form id="frmProducts" method="post" action="{{route('time.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <strong>Time Name: </strong>
                                <input type="text" class="form-control"  name="name"  required>
                            </div>

                            <div class="form-group">
                                <strong>Time in Hours</strong>
                                <div class="input-group">
                                    <input type="number" class="form-control"  name="time"  required>
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Hours</div>
                                    </div>
                                </div>
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
