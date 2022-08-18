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
                                <th scope="col">Withdraw Id</th>
                                <th scope="col">User</th>
                                <th scope="col">Requested At</th>
                                <th scope="col">Payment Detail</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Charge</th>
                                <th scope="col">Payable Amount</th>
                                <th scope="col">Processing Time</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($withdraw as $data)
                            <tr>
                                <td>{{$data->withdraw_id}}</td>
                                <td><a href="{{route('user.view', $data->user->id)}}">{{$data->user->name}}</a></td>
                                <td>{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
                                <td>{{$data->detail}}</td>
                                <td>{{$general->currency_sym}} {{$data->amount}}</td>
                                <td>{{$general->currency_sym}} {{$data->charge}}</td>
                                <td>{{$data->method_cur_amount}} {{$data->withdraw_method->currency}} - Via {{$data->withdraw_method->name}}</td>
                                <td>{{$data->processing_time}}</td>
                                <td>
                                    <a href="#appModal" data-toggle="modal" id="approve" data-id="{{$data->id}}" data-detail="{{$data->detail}}" data-amount="{{$data->method_cur_amount}}" data-cur="{{$data->withdraw_method->currency}}" class="btn btn-primary">Approve</a>
                                    <a href="#rejetModal" data-toggle="modal" id="reject" data-id="{{$data->id}}" data-amount="{{$data->amount}}" class="btn btn-danger">Reject</a>
                                </td>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $withdraw->links() }}
                </div>
        </div>
    </div>

    <div class="modal fade" id="appModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> Confirm Approve Withdraw</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form id="frmProducts" method="post" action="{{route('withdraw.approve')}}" class="form-horizontal">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="withdrawid">

                        <h3 style="color: red;text-align: center">
                            Payment Detail:<br>
                            <span id="text"></span>
                        </h3>

                        <h3 style="color:green;text-align: center;">
                            Payment Amount In Method Currency:
                            <br>
                            <span id="amount"></span> <span id="meth_cur"></span>
                        </h3>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-primary bold uppercase"><i class="fa fa-send"></i> Payment Complete</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="modal fade" id="rejetModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel"> Confirm Reject Withdraw</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form id="frmProducts" method="post" action="{{route('withdraw.reject')}}" class="form-horizontal">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="withdruawid">


                        <h3 style="color:#ff3643;text-align: center;">
                            Withdraw Amount:
                            <br>
                            <span id="amountu"></span> {{$general->currency}} will back to This User.
                        </h3>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="submit" class="btn btn-danger bold uppercase"><i class="fa fa-send"></i> Confirm Reject</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@stop
@section('script')
<script>
    $(document).on('click', '#approve',function () {

        $('#withdrawid').val($(this).data('id'));
        $('#text').text($(this).data('detail'));
        $('#amount').text($(this).data('amount'));
        $('#meth_cur').text($(this).data('cur'));

    });

    $(document).on('click', '#reject',function () {
        $('#withdruawid').val($(this).data('id'));
        $('#amountu').text($(this).data('amount'));
    });
</script>
@stop
