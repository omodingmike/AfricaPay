@extends(activeTemp().'layouts.master')

@section('content')
    <!-- page title begin-->
    <div class="page-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <h2 class="extra-margin">{{__($pt)}}</h2>

                </div>
            </div>
        </div>
    </div>
    @include(activeTemp().'layouts.balance_show')
    <!-- page title end -->
    <!-- price begin-->
    <div class="price">
        <div class="container">

            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p>{{__($error)}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="row">

                <div class="col-xl-12 col-lg-12 wow zoomIn">

                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                            <div class="row">
                                @foreach($trans as $data)
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single-price special">
                                            <div class="part-top">
                                                <h3>{{__($data->name)}}</h3>
                                            </div>
                                            <div class="part-bottom">
                                                <ul>
                                                    <li class="list-group-item section-bg-2">
                                                        <img style="width: 150px" src="{{asset('assets/images/withdraw/'.$data->image)}}"
                                                             alt="price icon">
                                                    </li>

                                                    <li class="list-group-item section-bg-2" style="font-weight: bold;">
                                                        @lang('Minimum') {{__($data->min_amo)}} {{__($general->currency)}}
                                                        - @lang('Maximum') {{__($data->max_amo)}} {{__($general->currency)}}
                                                    </li>
                                                    <li class="list-group-item section-bg-2" style="color: red">
                                                        @lang('Percentage Charge'): {{__($data->chargepc)}} %
                                                    </li>
                                                    <li class="list-group-item section-bg-2" style="color: green;font-weight: bold;">
                                                        @lang('Charge for withdraw Amount')
                                                        : {{__($data->chargefx)}} {{__($general->currency)}}
                                                    </li>
                                                    <li class="list-group-item section-bg-2" style="color: #344880;font-weight: bold;">
                                                        @lang('Withdrawal Accept From Your')<br>
                                                        {{__($general->interest_wallet_name)}}
                                                    </li>

                                                </ul>
                                                <a data-toggle="modal" href="#buyModal{{$data->id}}">@lang('Withdraw By ') {{__
                                                ($data->name)}}</a>

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
                                                            <p style="color: red">@lang('Charge for withdraw Amount')
                                                                : {{__($data->chargefx)}} {{__($general->currency)}}</p>
                                                            <p>@lang('Percentage Charge'): {{__($data->chargepc)}} %</p>
                                                            <p style="color: green">@lang('Processing Days (At last)')
                                                                : {{__($data->processing_day)}} @lang('Days')</p>
                                                        </div>
                                                        <input type="hidden" name="gateway" value="{{$data->id}}">
                                                        <h5 class="text-center font-weight-bold text-danger">@lang('Your') {{__($general->interest_wallet_name) }} @lang('Balance')
                                                            : {{__($general->currency_sym)}} {{round(Auth::user()->interest_balance,4)}}</h5>
                                                        <div class="form-group">
                                                            <div class="input-group">
                                                                <input type="text" name="amount" class="form-control" id="amount"
                                                                       placeholder="@lang('AMOUNT YOU WANT TO WITHDRAW')" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"
                                                                          id="basic-addon2">{{__($general->currency)}}</span>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left"
                                                                data-dismiss="modal">@lang('Close')</button>
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
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')

@stop
