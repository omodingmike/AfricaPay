@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">Plan Section Title</h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="{{route('general.store')}}">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label><strong>Title</strong></label>
                                <input type="text" name="plan_title" class="form-control" value="{{$general->plan_title}}">
                            </div>

                            <div class="form-group">
                                <label><strong>Sub-Title</strong></label>
                                <input type="text" name="plan_subtitle" class="form-control" value="{{$general->plan_subtitle}}">
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
                            <a href="{{route('plan.create')}}" class="btn btn-primary bold"><i class="fa fa-plus"></i> Add New </a>
                        </div>

                        <br>
                        <br>


                        <div class="row">
                            @foreach($plan as $data)
                                    <div class="col-md-4">
                                        <div class="tile">
                                            <div class="card text-center">
                                                <div class="card-header">
                                                    <h3>{{$data->name}}</h3>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <ul class="list-group">
                                                                @if($data->fixed_amount == 0)
                                                                <li class="list-group-item">Invest Min-Max Amount: <br> {{$general->currency_sym}} {{$data->minimum}} - {{$general->currency_sym}} {{$data->maximum}}</li>
                                                                    @else
                                                                <li class="list-group-item">Fixed Invest Amount: <br> {{$general->currency_sym}} {{$data->maximum}}</li>
                                                                @endif

                                                                <li class="list-group-item">Interest : {{$data->interest}} @if($data->interest_status == 1) % @else {{$general->currency}} @endif</li>
                                                                <li class="list-group-item">Repeat will every {{$data->times}} Hours After  @if($data->lifetime_status == 0) {{$data->repeat_time}} Times @endif</li>

                                                                <li class="list-group-item">Capital Back: <br> @if($data->capital_back_status == 1) <span class="badge badge-success">Yes</span> @elseif($data->capital_back_status == 0) <span class="badge badge-danger">No</span>@endif </li>
                                                                <li class="list-group-item">Life Time Status: <br> @if($data->lifetime_status == 1) <span class="badge badge-success">Active</span> @elseif($data->lifetime_status == 0) <span class="badge badge-danger">Inactive</span>@endif </li>
                                                                <li class="list-group-item">Status: <br> @if($data->status == 1) <span class="badge badge-success">Active</span> @elseif($data->status == 0) <span class="badge badge-danger">Disable</span>@endif </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <br>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <a href="{{route('plan.edit',$data->id)}}" class="btn btn-primary btn-block">Edit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

@stop
