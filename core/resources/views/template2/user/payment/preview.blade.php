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
        <section class="team-section sec-pad">
            <div class="thm-container">
                <div class="row">

                    <div class="col-md-6 col-md-offset-3">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">
                                <h3>@lang('Deposit Via '. $data->gateway->name)</h3>
                            </div>
                            <form class="contact-form" action="{{ route('deposit.confirm') }}" method="post">
                                @csrf
                            <div class="panel-body">

                                    <input type="hidden" name="gateway" value="{{$data->gateway_id}}"/>
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                {{__($error)}}
                                            </div>
                                        @endforeach
                                    @endif

                                <div class="col-xs-12">
                                    <ul class="list-group text-center">
                                        <li class="list-group-item section-bg-1"><img src="{{asset('assets/images/gateway')}}/{{$data->gateway_id}}.jpg" style="max-width:100px; max-height:100px; margin:0 auto;"/></li>
                                        <li class="list-group-item section-bg-1">@lang('Amount'): <strong>{{__($data->amount)}} {{__($general->currency_sym)}}</strong></li>
                                        <li class="list-group-item section-bg-1">@lang('Charge'): <strong>{{__($data->charge)}} {{__($general->currency_sym)}}</strong></li>
                                        <li class="list-group-item section-bg-1">@lang('Payable'): <strong>{{$data->charge + $data->amount}} {{__($general->currency_sym)}}</strong></li>
                                        <li class="list-group-item section-bg-1">@lang('In USD'): <strong>${{__($data->usd_amo)}}</strong></li>
                                    </ul>
                                </div><!-- /.col-md-6 -->


                            </div>
                            <div class="panel-footer">
                                <button id="btn-confirm" type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Pay Now')</button>
                            </div>
                            </form>
                        </div>
                    </div>


                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section>



@endsection
@section('script')
@if($data->gateway_id == 107)
<form action="{{ route('ipn.paystack') }}" method="POST">
    @csrf
    <script
    src="//js.paystack.co/v1/inline.js"
    data-key="{{ $data->gateway->val1 }}"
    data-email="{{ $data->user->email }}"
    data-amount="{{ round($data->usd_amo/$data->gateway->val7, 2)*100 }}"
    data-currency="NGN"
    data-ref="{{ $data->trx }}"
    data-custom-button="btn-confirm"
    >
</script>
</form>
@elseif($data->gateway_id == 108)
<script src="//voguepay.com/js/voguepay.js"></script>
<script>
    closedFunction = function() {
        
    }
    successFunction = function(transaction_id) {
        window.location.href = '{{ url('home/vogue') }}/' + transaction_id + '/success';
    }
    failedFunction=function(transaction_id) {
        window.location.href = '{{ url('home/vogue') }}/' + transaction_id + '/error';
    }

    function pay(item, price) {
        //Initiate voguepay inline payment
        Voguepay.init({
            v_merchant_id: "{{ $data->gateway->val1 }}",
            total: price,
            notify_url: "{{ route('ipn.voguepay') }}",
            cur: 'USD',
            merchant_ref: "{{ $data->trx }}",
            memo:'Buy ICO',
            recurrent: true,
            frequency: 10,
            developer_code: '5af93ca2913fd',
            store_id:"{{ $data->user_id }}",
            custom: "{{ $data->trx }}",
            
            closed:closedFunction,
            success:successFunction,
            failed:failedFunction
        });
    }
    
    $(document).ready(function () {
        $(document).on('click', '#btn-confirm', function (e) {
            e.preventDefault();
            pay('Buy', {{ $data->usd_amo }});
        });
    })
</script>

@endif
@endsection
