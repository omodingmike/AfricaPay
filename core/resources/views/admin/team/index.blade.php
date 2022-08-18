@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">Team Section Title</h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="{{route('general.store')}}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label><strong>Title</strong></label>
                                <input type="text" name="team_title" class="form-control" value="{{$general->team_title}}">
                            </div>

                            <div class="form-group">
                                <label><strong>Sub-Title</strong></label>
                                <input type="text" name="team_sub_title" class="form-control" value="{{$general->team_sub_title}}">
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

                                    <div class="card">
                                        <img class="card-img-top mx-auto" src="{{asset('assets/images/team/'. $data->image)}}" style="width: 250px">
                                        <div class="card-body text-center">
                                            <h5 class="card-title">{{$data->name}}</h5>
                                            <p class="card-text">Designation: {{$data->designation}}</p>

                                            <ul class="list-inline">
                                                <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="{{$data->fb_link}}">Facebook</a></li>
                                                <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="{{$data->tw_link}}">Twitter</a></li>
                                                <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="{{$data->ln_link}}">Linkedin</a></li>
                                            </ul>

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

                                <div id="delModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form role="form" action="{{route('team.destroy', $data->id)}}" method="post">
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
                                                <h4 class="modal-title" id="myModalLabel"> Edit Team Member</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <form id="frmProducts" method="post" action="{{route('team.update', $data->id)}}" class="form-horizontal" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <strong>Team Member Image:</strong>
                                                        <div class="col-md-9 offset-1">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">

                                                            @if($data->image != null)
                                                                <div class="fileinput-new thumbnail" style="width: 215px; height: 215px;" data-trigger="fileinput">
                                                                    <img style="width: 215px" src="{{asset('assets/images/team/'. $data->image)}}/" alt="...">
                                                                </div>
                                                            @endif

                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 215px; max-height: 215px"></div>
                                                                <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="image" accept="image/*">
                                                </span>
                                                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <strong>Team Member Name:</strong>
                                                        <input type="text" class="form-control"  name="name" value="{{$data->name}}" placeholder="Name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <strong>Team Member Designation:</strong>
                                                        <input type="text" class="form-control"  name="designation" value="{{$data->designation}}" placeholder="Designation" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <strong>Facebook Url:</strong>
                                                        <input type="text" class="form-control"  name="fb_link" value="{{$data->fb_link}}" placeholder="Facebook Profile Url">
                                                    </div>

                                                    <div class="form-group">
                                                        <strong>Linkedin Url:</strong>
                                                        <input type="text" class="form-control"  name="ln_link" value="{{$data->ln_link}}" placeholder="Linkedin Profile Url">
                                                    </div>

                                                    <div class="form-group">
                                                        <strong>Twitter Url:</strong>
                                                        <input type="text" class="form-control"  name="tw_link" value="{{$data->tw_link}}" placeholder="Twitter Profile Url">
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
                        <h4 class="modal-title" id="myModalLabel"> Add New Team Member</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form id="frmProducts" method="post" action="{{route('team.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <strong>Team Member Image:</strong>
                                <div class="col-md-9 offset-1">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">

                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 215px; max-height: 215px"></div>
                                        <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="image" accept="image/*">
                                                </span>
                                            <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <strong>Team Member Name:</strong>
                                <input type="text" class="form-control"  name="name" placeholder="Name" required>
                            </div>

                            <div class="form-group">
                                <strong>Team Member Designation:</strong>
                                <input type="text" class="form-control"  name="designation" placeholder="Designation" required>
                            </div>

                            <div class="form-group">
                                <strong>Facebook Url:</strong>
                                <input type="text" class="form-control"  name="fb_link" placeholder="Facebook Profile Url">
                            </div>

                            <div class="form-group">
                                <strong>Linkedin Url:</strong>
                                <input type="text" class="form-control"  name="ln_link" placeholder="Linkedin Profile Url">
                            </div>

                            <div class="form-group">
                                <strong>Twitter Url:</strong>
                                <input type="text" class="form-control"  name="tw_link" placeholder="Twitter Profile Url">
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
