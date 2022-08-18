@extends(activeTemp().'layouts.master')

@section('content')

        <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="breadcrump-title text-center">
                            <h2 class="add-space">{{__($pt)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="plan">
            <div class="container">
                <div style="margin:20px 0px;">
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                {{__($error)}}
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="row">

                    @foreach($trans as $data)
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-plan active">
                                <h3>{{__($data->name)}}</h3>
                                <div class="part-parcent">
                                    <img src="{{asset('assets/images/withdraw/'.$data->image)}}" style="width:100%;"/>
                                </div>
                                <div class="part-feature">
                                    <div class="single-plan-feature">
                                        <span class="large-text">  @lang('Minimum') {{__($data->min_amo)}} {{__($general->currency)}} - @lang('Maximum') {{__($data->max_amo)}} {{__($general->currency)}}</span>
                                    </div>
                                    <div class="single-plan-feature">
                                        <span class="large-text"> @lang('Percentage Charge'): {{__($data->chargepc)}} %</span>
                                    </div>
                                    <div class="single-plan-feature">
                                        <span class="large-text">@lang('Charge for withdraw Amount'):  {{__($data->chargefx)}} {{__($general->currency)}}</span>
                                    </div>
                                    <div class="single-plan-feature">
                                        <span class="large-text">@lang('Withdrawal Accept From Your')<br>
                                            {{__($general->interest_wallet_name)}}</span>
                                    </div>
                                </div>
                                <div class="part-button">
                                    <a   data-toggle="modal" href="#buyModal{{$data->id}}">@lang('Withdraw By') {{__($data->name)}}</a>
                                </div>
                            </div>
                        </div>


                        <div id="buyModal{{$data->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">@lang('Withdraw via') <strong>{{__($data->name)}}</strong></h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <form method="POST" action="{{route('withdraw.preview.user')}}">
                                        <div class="modal-body">
                                            {{csrf_field()}}
                                            <div class="text-center">
                                                <p style="color: red">@lang('Charge for withdraw Amount'): {{__($data->chargefx)}} {{__($general->currency)}}</p>
                                                <p>@lang('Percentage Charge'): {{__($data->chargepc)}} %</p>
                                                <p style="color: green">@lang('Processing Days (At last)') : {{__($data->processing_day)}} @lang('Days')</p>
                                            </div>
                                            <input type="hidden" name="gateway" value="{{$data->id}}">
                                            <h5 class="text-center font-weight-bold text-danger">@lang('Your') {{__($general->interest_wallet_name) }} @lang('Balance'):  {{__($general->currency_sym)}} {{round(Auth::user()->interest_balance,4)}}</h5>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="text" name="amount" class="form-control" id="amount" placeholder="@lang('AMOUNT YOU WANT TO WITHDRAW')" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2">{{__($general->currency)}}</span>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">@lang('Close')</button>
                                            <button type="submit" class="btn btn-success">@lang('Preview')</button>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>

@endsection
