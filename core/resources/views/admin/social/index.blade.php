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




                                    <div class="col-md-3">
                                        <div class="tile">
                                            <div class="card text-center">
                                                <div class="card-body">
                                                    <blockquote class="card-blockquote">
                                                        <p><i class="fa fa-{{$data->icon}} fa-5x"></i></p>
                                                        <footer>URL: {{$data->link}}
                                                            <cite title="Source Title"></cite>
                                                        </footer>
                                                    </blockquote>
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
                                            <form role="form" action="{{route('social.destroy', $data->id)}}" method="post">
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
                                            <form id="frmProducts" method="post" action="{{route('social.update', $data->id)}}" class="form-horizontal" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <strong>Icon Name: (Ex:facebook)</strong>
                                                        <input type="text" class="form-control" value="{{$data->icon}}"  name="icon" placeholder="facebook" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <strong>Link:</strong>
                                                        <input type="text" class="form-control" value="{{$data->link}}" name="link" placeholder="Social Link" required>
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
                        <h4 class="modal-title" id="myModalLabel"> Add New Social</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form id="frmProducts" method="post" action="{{route('social.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <strong>Icon Name: (Ex:facebook)</strong>
                                <input type="text" class="form-control"  name="icon" placeholder="facebook" required>
                            </div>

                            <div class="form-group">
                                <strong>Link:</strong>
                                <input type="text" class="form-control"  name="link" placeholder="Social Link" required>
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
