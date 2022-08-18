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
                            <thead>
                            <tr>
                                <th scope="col">Trans Id</th>
                                <th scope="col">User</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Charge</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Status</th>
                                <th scope="col">Requested At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trans as $data)
                            <tr>
                                <td>{{$data->trx}}</td>
                                <td><a href="{{route('user.view', $data->user->id)}}">{{$data->user->name}}</a></td>
                                <td>{{$general->currency_sym}} {{$data->amount}}</td>
                                <td>{{$general->currency_sym}} {{$data->charge}}</td>
                                <td>
                                    @if($data->gateway->id <= 513)
                                    <span class="btn btn-success"><i class="fa fa-credit-card"></i> {{$data->gateway->name}}</span>
                                        @else
                                        <span class="btn btn-primary"><i class="fa fa-bank"></i> {{$data->gateway->name}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->status == 2)
                                        <label class="badge badge-danger">Reject</label>
                                    @elseif($data->status == 0 && $data->image != '' && $data->detail != '')
                                        <label class="badge badge-warning">Pending</label>
                                    @elseif($data->status == 1)
                                        <label class="badge badge-success">Complete</label>
                                    @endif
                                </td>
                                <td>{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>
                        {{$trans->links()}}
                    </div>
                </div>
        </div>
    </div>

@stop
@section('script')

@stop
