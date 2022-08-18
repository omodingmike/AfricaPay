@extends(activeTemp().'layouts.master')

@section('content')

        <section class="tools-section  pranto-tool">
            <div class="thm-container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="tools-content pranto-bread">
                            <h3>{{__($pt)}}</h3>

                        </div><!-- /.tools-content -->
                    </div><!-- /.col-md-6 -->

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section>
        @include(activeTemp().'layouts.balance_show')


        <section class="pricing-section sec-pad">
            <div class="thm-container">
                <div class="sec-title text-center">
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                {{__($error)}}
                            </div>
                        @endforeach
                    @endif
                </div><!-- /.sec-title -->

                <div class="tab-content">
                    <div class="tab-pane fade in active" >
                        <div class="row">
                            @foreach($trans as $data)

                                <div class="col-md-4 col-sm-6 col-xs-12" style="margin-top: 20px;">
                                    <div class="single-pricing hvr-bounce-to-bottom">
                                        <div class="title">
                                            <h3>{{__($data->name)}}</h3>
                                        </div><!-- /.title -->

                                        <div class="info">
                                            <ul class="list-group">
                                                <li class="list-group-item ">
                                                    <img style="width: 150px" src="{{asset('assets/images/withdraw/'.$data->image)}}" alt="price icon">
                                                </li><br><br>
                                                <p>@lang('Minimum') {{__($data->min_amo)}} {{__($general->currency)}} - @lang('Maximum') {{__($data->max_amo)}} {{__($general->currency)}}</p>
                                                <p> @lang('Percentage Charge'): {{__($data->chargepc)}} %</p>
                                                <p>@lang('Charge for withdraw Amount'):  {{__($data->chargefx)}} {{__($general->currency)}}</p>
                                                <p> @lang('Withdrawal Accept From Your')<br>
                                                    {{__($general->interest_wallet_name)}}</p>
                                            </ul>
                                        </div><!-- /.info -->
                                        <div class="btn-box">
                                            <a data-toggle="modal" style="width:100%;" class="sign-up" href="#buyModal{{$data->id}}">  @lang('Withdraw By') {{__($data->name)}}</a>
                                        </div><!-- /.btn-box -->
                                    </div><!-- /.single-pricing -->
                                </div><!-- /.col-md-4 -->

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
                                                            <div class="input-group-addon">
                                                                <span class="input-group-text" id="basic-addon2">{{__($general->currency)}}</span>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">@lang('Close')</button>
                                                    <button type="submit" class="btn btn-primary">@lang('Preview')</button>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>

                            @endforeach
                        </div><!-- /.row -->
                    </div>

                </div><!-- /.tab-content -->
            </div><!-- /.thm-container -->
        </section><!-- /.pricing-section -->




@endsection
@section('script')

@stop
