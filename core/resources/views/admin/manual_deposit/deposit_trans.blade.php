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
                        @if(request()->path() == 'admin/pending/deposit')
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gateway</th>
                                <th>Amount</th>
                                <th>Charge</th>
                                <th>Image</th>
                                <th>Detail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($trans as $data)
                            <tr>
                                <td><a href="{{route('user.view', $data->user->id)}}">{{$data->user->name}}</a></td>
                                <td>{{$data->gateway->name}}</td>
                                <td><b>{{$data->amount}} {{$general->currency}}</b></td>
                                <td><b>{{$data->charge}} {{$general->currency}}</b></td>
                                <td><img style="max-width: 80px" src="{{asset('assets/images/deposit_prove/'.$data->image)}}"></td>
                                <td> {{$data->detail}}</td>
                                <td>
                                    @if($data->status == 0)
                                        <span class="badge badge-warning">Pending</span>
                                        @elseif($data->status == 1)
                                        <span class="badge badge-success">Approved</span>
                                        @elseif($data->status == 2)
                                        <span class="badge badge-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{asset('assets/images/deposit_prove/'.$data->image)}}" download><i class="fa fa-download"></i>  Download Prove Image</a>
                                    <a class="btn btn-success" href="#apModal{{$data->id}}" data-toggle="modal"><i class="fa fa-check"></i> Approve</a>
                                    <a class="btn btn-danger" href="#rejModal{{$data->id}}" data-toggle="modal"><i class="fa fa-times"></i>  Reject</a>
                                </td>
                            </tr>

                            <div id="apModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Approve</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form role="form" action="{{route('action.pending.request', $data->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <div class="modal-body">
                                                <h2 style="color: red;">Are you sure?</h2>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Approve</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div id="rejModal{{$data->id}}" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Confirm Reject</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form role="form" action="{{route('action.pending.request', $data->id)}}" method="post">
                                            @csrf
                                           <input type="hidden" name="status" value="2">
                                            <div class="modal-body">
                                                <h2 style="color: red;">Are you sure?</h2>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Reject</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                            @else

                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gateway</th>
                                <th>Amount</th>
                                <th>Charge</th>
                                <th>Image</th>
                                <th>Detail</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trans as $data)
                                <tr>
                                    <td><a href="{{route('user.view', $data->user->id)}}">{{$data->user->name}}</a></td>
                                    <td>{{$data->gateway->name}}</td>
                                    <td><b>{{$data->amount}} {{$general->currency}}</b></td>
                                    <td><b>{{$data->charge}} {{$general->currency}}</b></td>
                                    <td><img style="max-width: 80px" src="{{asset('assets/images/deposit_prove/'.$data->image)}}"></td>
                                    <td> {{$data->detail}}</td>
                                    <td>
                                        @if($data->status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($data->status == 1)
                                            <span class="badge badge-success">Approved</span>
                                        @elseif($data->status == 2)
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{asset('assets/images/deposit_prove/'.$data->image)}}" download><i class="fa fa-download"></i>  Download Prove Image</a>
                                    </td>
                                </tr>



                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
                {{$trans->links()}}
            </div>
        </div>
    </div>
@endsection
@section('script')

@stop
