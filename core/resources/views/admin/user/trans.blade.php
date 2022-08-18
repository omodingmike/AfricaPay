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
                            <th scope="col">Date</th>
                            <th scope="col">Description</th>
                            <th scope="col">Amount</th>
                            <th scope="col">After Balance</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trans as $data)
                            <tr @if($data->amount < 0) style="background-color: #e4afaf" @endif>
                                <th scope="row">{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</th>
                                <td>{{$data->des}}</td>
                                <td>{{$general->currency_sym}} {{abs($data->amount)}}</td>
                                <td>{{$general->currency_sym}} {{$data->balance}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$trans->links()}}
            </div>
        </div>
    </div>
@endsection
@section('script')

@stop
