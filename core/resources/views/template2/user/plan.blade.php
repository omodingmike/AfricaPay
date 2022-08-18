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
        </section><!-- /.tools-section -->
        @include(activeTemp().'layouts.balance_show')

        <section class="pricing-section sec-pad" id="plan">
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
                            @foreach($gates as $data)
                                @php $time_name = \App\TimeSetting::where('time', $data->times)->first(); @endphp
                                <div class="col-md-4 col-sm-6 col-xs-12" style="margin-top: 20px;">
                                    <div class="single-pricing hvr-bounce-to-bottom">
                                        <div class="title">
                                            <h3>{{__($data->name)}}</h3>
                                        </div><!-- /.title -->
                                        <div class="percent">
                                            <span>{{__($data->interest)}} @if($data->interest_status == 1) % @else {{__($general->currency)}} @endif</span>
                                            <p>{{__($time_name->name)}} /  @if($data->lifetime_status == 0) {{__($data->repeat_time)}} @lang('Times') @else @lang('Lifetime') @endif</p>
                                        </div><!-- /.percent -->
                                        <div class="info">
                                            @if($data->fixed_amount == 0)
                                                <p>@lang('Invest Min-Max Amount'): <br> {{__($general->currency_sym)}} {{__($data->minimum)}} - {{__($general->currency_sym)}} {{__($data->maximum)}}</p>
                                            @else
                                                <p>@lang('Fixed Invest Amount'): <br> {{__($general->currency_sym)}} {{__($data->maximum)}}</p>
                                            @endif
                                            @if($data->capital_back_status == 1)
                                                <p> <span class="badge badge-success" style="background: #65d186">@lang('Capital Will Return Back')</span></p>
                                            @elseif($data->capital_back_status == 0)
                                                <p> <span class="badge badge-warning" style="background: #fa9689">@lang('Capital Will Store')</span></p>
                                            @endif
                                            <p>@lang('24/7Support')</p>
                                        </div><!-- /.info -->
                                        <div class="btn-box">
                                            <a href="javascript:void(0)" 
                                                    data-name="{{ $data->name }}"
                                                    data-minimum="{{ $data->minimum }}"
                                                    data-maximum="{{ $data->maximum }}"
                                                    data-fixed="{{ $data->fixed_amount }}"
                                                    data-interest="{{ $data->interest}}"
                                                    data-interest_type=" @if($data->interest_status == 1) % @else {{__($general->currency)}} @endif"
                                                    data-time_name="{{ $time_name->name }}"
                                                    data-time="@if($data->lifetime_status == 0) {{__($data->repeat_time)}} @lang('Times') @else @lang('Lifetime') @endif"
                                                    data-plan_id="{{ $data->id }}"
                                                 class="investBtn">@lang('Invest Now')</a>
                                        </div><!-- /.btn-box -->
                                    </div><!-- /.single-pricing -->
                                </div><!-- /.col-md-4 -->
                            @endforeach
                        </div><!-- /.row -->
                    </div>

                </div><!-- /.tab-content -->
            </div><!-- /.thm-container -->
        </section><!-- /.pricing-section -->


        <div class="modal fade" id="investModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">@lang('Confirm to invest on') <span class="plan-name"></span></h5>
                    </div>
                    <form action="{{route('user.buy.plan')}}" method="post">
                    @csrf
                    <input type="hidden" name="plan_id">
                        <div class="modal-body">
                            <div class="form-group">
                                <h2 style="color: #453491">@lang('Invest'): <span class="limit"></span></h2>

                                <p style="color: #389105">@lang('Interest'):  <span class="interest"></span>
                                    <span class="time_name"></span> / <span class="time"></span> 
                                </p>

                                <div class="form-group">
                                    <strong>@lang('Select Wallet')</strong>
                                    <select class="form-control" name="wallet_type">
                                        <option value="1">{{__($general->deposit_wallet_name)}} ({{round(Auth::user()->balance,4)}} {{__($general->currency)}})</option>
                                        <option value="2">{{__($general->interest_wallet_name)}} ({{round(Auth::user()->interest_balance,4)}} {{__($general->currency)}})</option>
                                    </select>

                                </div>

                                <span class="text-danger ins_bal"></span>

                                <div class="input-group" style="margin-top: 10px;">
                                    <input type="text" name="amount" id="amount" placeholder="Amount To Invest" class="form-control"/>
                                    <span class="input-group-addon">{{__($general->currency_sym)}}</span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('No')</button>
                            <button type="submit" class="btn btn-primary yesBtn" style="padding: 6px 0; margin-top: 0; width: 10%;">@lang('Yes')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




@endsection
@section('style')
<style type="text/css">
    .d-none{
        display: none;
    }
</style>
@stop
@section('script')


<script>
     $('.investBtn').click(function() {
        modal = $('#investModal');
        modal.find('.plan-name').text($(this).data('name'));
        if ($(this).data('fixed') == 0) {
            modal.find('.limit').text($(this).data('minimum')+' {{ $general->currency }} - '+$(this).data('maximum')+' {{ $general->currency }}');
            modal.find('input[name=amount]').removeAttr('readonly');
            modal.find('input[name=amount]').val('');
        }else{
            modal.find('.limit').text($(this).data('maximum')+' {{ $general->currency }}');
            modal.find('input[name=amount]').attr('readonly','');
            modal.find('input[name=amount]').val($(this).data('maximum'));
        }
        modal.find('.interest').text($(this).data('interest')+''+$(this).data('interest_type'));
        modal.find('.time_name').text($(this).data('time_name'));
        modal.find('.time').text($(this).data('time'));
        modal.find('input[name=plan_id]').val($(this).data('plan_id'));
        modal.modal('show');
        $('select[name=wallet_type]').change();
        $('input[name=amount]').on('input');
    });

    $('select[name=wallet_type]').change(function () {
        if ($(this).val() == 1) {
            var bal = {{ auth()->user()->balance }};
        }else{
            var bal = {{ auth()->user()->interest_balance }};
        }
        var amount = $('input[name=amount]').val();
        if (bal < amount) {
            $('.ins_bal').text('Opps! You have no sufficient balance');
            $('.yesBtn').addClass('d-none');
        }else{
            $('.ins_bal').text('');
            $('.yesBtn').removeClass('d-none');
        }
    });
    $('input[name=amount]').on('input',function () {
        $('select[name=wallet_type]').change();
    })
</script>

@endsection



