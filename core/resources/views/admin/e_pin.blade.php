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
                        @if(request()->path() == 'admin/manage-pin')
                            <h3>Available E-PIN  <button data-toggle="modal" data-target="#myModal" class="btn btn-primary bold pull-right"><i class="fa fa-plus"></i> Add New </button></h3>
                            <br>
                            @elseif(request()->path() == 'admin/used-pin')
                            <h3>Used E-PIN</h3>
                        @endif


                        <thead>
                        <tr>
                            @if(request()->path() == 'admin/used-pin')
                                <th>User</th>
                                <th>Amount</th>
                                <th>PIN</th>
                                <th>Used At</th>
                            @elseif(request()->path() == 'admin/manage-pin')
                                <th>Amount</th>
                                <th>PIN</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>

                        @if(request()->path() == 'admin/used-pin')
                            @foreach($trans as $p)
                                <tr>
                                    <td><a href="{{route('user.view', $p->pin_user->id)}}">{{$p->pin_user->name}}</a></td>
                                    <td>{{$general->currency_sym}} {{ $p->amount }}</td>
                                    <td>{{ $p->pin }}</td>
                                    <td>{{ $p->updated_at }}</td>
                                </tr>
                            @endforeach
                        @elseif(request()->path() == 'admin/manage-pin')
                            @foreach($trans as $p)
                                <tr>
                                    <td>{{$general->currency_sym}} {{ $p->amount }}</td>
                                    <td>{{ $p->pin }}</td>
                                </tr>

                            @endforeach
                        @endif



                        </tbody>
                    </table>
                </div>
                {{$trans->links()}}
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title bold uppercase" id="myModalLabel">Generate E-PIN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form class="form-horizontal" method="post" action="{{route('storePin')}}">
                    {{csrf_field()}}
                    <div class="modal-body">


                        <div class="form-group error">
                            <label for="inputName" class="col-sm-12  bold uppercase">Amount : </label>
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" name="amount">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                             {{$general->currency_sym}}
                                            </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group error">
                            <label for="inputName" class="col-sm-12 bold uppercase">Number (How Many Pins want to create): </label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control has-error bold" name="number" >
                                <code>PIN will generate automatically</code>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary bold uppercase"> Generate </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')

@stop
