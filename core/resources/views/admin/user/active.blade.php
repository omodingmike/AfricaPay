@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                <div class="row">

                    <div class="col-md-6">
                        <form class="form-inline" method="get" action="{{route('user.search.email')}}" >
                            <div class="form-group  mb-2" >
                                <label class="sr-only">Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Email Address">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>

                    </div>


                    <div class="col-md-6">
                        <form class="form-inline" method="get" action="{{route('user.search.username')}}" >
                            <div class="form-group mb-2">
                                <label  class="sr-only">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                        </form>
                    </div>


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
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Sl</th>
                            <th> Name </th>
                            <th> Username </th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th> {{$general->deposit_wallet_name}} </th>
                            <th> {{$general->interest_wallet_name}} </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $key => $data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->username}}</td>
                                <td><b>{{$data->email}}</b></td>
                                <td>{{ $data->mobile}}</td>
                                <td> {{$data->balance}} {{$general->currency}}</td>
                                <td> {{$data->interest_balance}} {{$general->currency}}</td>
                                <td>
                                    @php
                                        switch (true){
                                        case($data->status == 1 and $data->smsv == 1 and $data->emailv == 1):
                                        echo '<span class="badge badge-success">Active</span>';
                                        break;
                                        case($data->status == 0):
                                        echo '<span class="badge badge-danger">Banned</span>';
                                        break;
                                        case($data->smsv == 0):
                                        echo '<span class="badge badge-warning">Sms Unverified</span>';
                                        break;
                                        case($data->emailv == 0):
                                        echo '<span class="badge badge-warning">Email Unverified</span>';
                                        break;
                                        }
                                    @endphp
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('user.view', $data->id)}}"><i class="fa fa-desktop"></i>  View Detail</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$user->links()}}
            </div>
        </div>
    </div>
@endsection
@section('script')

@stop
