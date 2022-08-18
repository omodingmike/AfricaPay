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
                    @foreach ($errors->all() as $error)
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p>{{__($error)}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="row">

                <div class="col-xl-12 col-lg-12">

                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                            <div class="row">
                                @foreach($gates as $data)
                                    @php $time_name = \App\TimeSetting::where('time', $data->times)->first(); @endphp
                                    <div class="col-xl-4 col-lg-4 col-md-6 mb-5 wow fadeInLeft">
                                        <div class="single-price">
                                            <div class="part-top">
                                                <h3>{{__($data->name)}}</h3>
                                                <h4>{{__($data->interest)}} @if($data->interest_status == 1)
                                                        %
                                                    @else
                                                        {{__($general->currency)}}
                                                    @endif<br/><span> {{__($time_name->name)}} / @if($data->lifetime_status == 0)
                                                            {{__($data->repeat_time)}} @lang('Times')
                                                        @else
                                                            @lang('Lifetime')
                                                        @endif</span></h4>
                                            </div>


                                            <div class="part-bottom">
                                                <ul>

                                                    <li>@lang('Features')</li>
                                                    @if($data->fixed_amount == 0)
                                                        <li>@lang('Invest Min-Max Amount'):
                                                            <br> {{__($general->currency_sym)}} {{__($data->minimum)}}
                                                            - {{__($general->currency_sym)}} {{__($data->maximum)}}</li>
                                                    @else
                                                        <li>@lang('Fixed Invest Amount'):
                                                            <br> {{__($general->currency_sym)}} {{__($data->maximum)}}</li>
                                                    @endif
                                                    @if($data->capital_back_status == 1)

                                                        <li><span class="badge badge-success">@lang('Capital Will Return Back')</span></li>
                                                    @elseif($data->capital_back_status == 0)
                                                        <li><span class="badge badge-warning">@lang('Capital Will Store')</span></li>
                                                    @endif
                                                    <li>@lang('24/7Support')</li>
                                                </ul>
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
    <!-- price end -->
    <!-- Modal -->
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

                            <p style="color: #389105">@lang('Interest'): <span class="interest"></span>
                                <span class="time_name"></span> / <span class="time"></span>
                            </p>

                            <div class="form-group">
                                <strong>@lang('Select Wallet')</strong>
                                <select class="form-control mb-2" name="wallet_type">
                                    <option value="1">{{__($general->deposit_wallet_name)}}
                                        ({{round(Auth::user()->balance,4)}} {{__($general->currency)}})
                                    </option>
                                    <option value="2">{{__($general->interest_wallet_name)}}
                                        ({{round(Auth::user()->interest_balance,4)}} {{__($general->currency)}})
                                    </option>
                                </select>
                                <span class="text-danger ins_bal"></span>
                            </div>
                            <div class="input-group">
                                <input type="text" name="amount" id="amount" placeholder="Amount To Invest" class="form-control"/>
                                <div class="input-group-append">
                                    <span class="input-group-text">{{__($general->currency_sym)}}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('No')</button>
                        <button type="submit" class="btn btn-primary yesBtn"
                                style="padding: 6px 0; margin-top: 0; width: 10%;">@lang('Yes')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>

        $('.investBtn').click(function () {
            modal = $('#investModal');
            modal.find('.plan-name').text($(this).data('name'));
            if ($(this).data('fixed') == 0) {
                modal.find('.limit').text($(this).data('minimum') + ' {{ $general->currency }} - ' + $(this).data('maximum') + ' {{ $general->currency }}');
                modal.find('input[name=amount]').removeAttr('readonly');
                modal.find('input[name=amount]').val('');
            } else {
                modal.find('.limit').text($(this).data('maximum') + ' {{ $general->currency }}');
                modal.find('input[name=amount]').attr('readonly', '');
                modal.find('input[name=amount]').val($(this).data('maximum'));
            }
            modal.find('.interest').text($(this).data('interest') + '' + $(this).data('interest_type'));
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
            } else {
                var bal = {{ auth()->user()->interest_balance }};
            }
            var amount = $('input[name=amount]').val();
            if (bal < amount) {
                $('.ins_bal').text('Opps! You have no sufficient balance');
                $('.yesBtn').addClass('d-none');
            } else {
                $('.ins_bal').text('');
                $('.yesBtn').removeClass('d-none');
            }
        });
        $('input[name=amount]').on('input', function () {
            $('select[name=wallet_type]').change();
        })
    </script>

@endsection
