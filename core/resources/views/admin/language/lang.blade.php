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
                <div class="table-responsive">
                    <table class="table">

                            <h3>Language Manager <button data-toggle="modal" data-target="#myModal" class="btn btn-primary bold pull-right"><i class="fa fa-plus"></i> Add New Language</button></h3>
                            <br>
                        <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($social as $product)
                            <tr>
                                <td><img src="{{asset('assets/images/'.$product->icon)}}"></td>
                                <td>{{$product->name}}</td>
                                <td style="font-size: 22px;">{!! $product->code !!}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('language-key', $product->id)}}"><i class="fa fa-code"></i> Keyword Edit</a>
                                    <a class="btn btn-primary" href="#editModal{{$product->id}}" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
                                    <button type="button" class="btn btn-danger bold uppercase delete_button" data-toggle="modal" data-target="#DelModal{{$product->id}}"> <i class='fa fa-trash'></i> DELETE</button>
                                </td>
                            </tr>

                            <div class="modal fade" id="editModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-square"></i>Edit Language</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <form method="post" action="{{route('language-manage-update', $product->id)}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="modal-body">

                                                <div class="form-group error">
                                                    <div class="col-sm-12 mx-auto">
                                                        <img class="mx-auto" width="100px" src="{{asset('assets/images/'.$product->icon)}}">
                                                    </div>

                                                    <label for="inputName" class="col-sm-12 ">Flag Icon (PNG must) : </label>
                                                    <div class="col-sm-12">
                                                        <input type="file" class="form-control has-error bold " name="icon" >
                                                    </div>
                                                </div>
                                                <div class="form-group error">
                                                    <label for="inputName" class="col-sm-12 ">Language Name : </label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control has-error bold " id="code" name="name"  value="{{$product->name}}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary bold uppercase" id="btn-save" value="add"><i class="fa fa-send"></i> Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="DelModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>

                                        <div class="modal-body">
                                            <strong>Are you sure you want to Delete ?</strong>
                                        </div>

                                        <div class="modal-footer">
                                            <form method="post" action="{{route('language-manage-del', $product->id)}}" class="form-inline">
                                                {{csrf_field()}}
                                                {{method_field('delete')}}
                                                <input type="hidden" name="delete_id" id="delete_id" class="delete_id" value="0">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                <button type="submit" class="btn btn-danger deleteButton"><i class="fa fa-trash"></i> DELETE</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-square"></i> Add New Language</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('language-manage-store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <div class="form-group error">

                            <label for="inputName" class="col-sm-12 ">Flag Icon (PNG must) : </label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control has-error bold " name="icon">
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-12 ">Language Name : </label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="code" name="name" value="">
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-12">Language Code : </label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control has-error bold " id="link" name="code" value="">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary bold uppercase" id="btn-save" value="add"><i class="fa fa-send"></i> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')

@stop
