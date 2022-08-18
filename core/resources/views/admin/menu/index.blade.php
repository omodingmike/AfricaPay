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
                            <a href="{{route('terms.create')}}" class="btn btn-primary bold"><i class="fa fa-plus"></i> Add New </a>
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>


                        <div class="row">

                            @foreach($blog as $data)
                                <div class="col-md-3">

                                    <div class="card">

                                        <div class="card-body text-center">
                                            <h2 class="card-title">{{$data->name}}</h2>
                                            <h5 class="card-title">{{$data->title}}</h5>
                                            <p class="card-text"> {!! short_text($data->text, 50) !!}</p>

                                            <div class="row">

                                                <div class="col-6">
                                                    <a href="{{route('terms.edit', $data->id)}}" class="btn btn-primary btn-block">View/Edit</a>
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
                                            <form role="form" action="{{route('terms.destroy', $data->id)}}" method="post">
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



                            @endforeach

                        </div>

                        {{$blog->links()}}

                    </div>
                </div>
            </div>
        </div>

    </div>

@stop
