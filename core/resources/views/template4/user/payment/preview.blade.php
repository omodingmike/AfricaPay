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

                <div class="row justify-content-center text-center ">



                        <div class="col-md-6">
                            <form  action="{{ route('deposit.confirm') }}" method="post">
                                @csrf
                                <input type="hidden" name="gateway" value="{{$data->gateway_id}}"/>
                            @if (count($errors) > 0)
                                <div class="row">
                                @foreach ($errors->all() as $error)
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                &times;
                                            </button>
                                            <p>{{ __($error) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            @endif

                            <div class="single-plan active">
                                <h3>@lang('Deposit Via '. $data->gateway->name)</h3>
                                <div class="part-parcent">
                                    <img src="{{asset('assets/images/gateway')}}/{{$data->gateway_id}}.jpg" style="max-width:250px;"/>
                                </div>
                                <div class="part-feature">
                                    <div class="single-plan-feature">
                                        <span class="large-text"> @lang('Amount'): <strong>{{__($data->amount)}} {{__($general->currency_sym)}}</strong></span>
                                    </div>
                                    <div class="single-plan-feature">
                                        <span class="large-text"> @lang('Charge'): <strong>{{__($data->charge)}} {{__($general->currency_sym)}}</strong></span>
                                    </div>
                                    <div class="single-plan-feature">
                                        <span class="large-text"> @lang('Payable'): <strong>{{$data->charge + $data->amount}} {{__($general->currency_sym)}}</strong></span>
                                    </div>
                                    <div class="single-plan-feature">
                                        <span class="large-text">@lang('In USD'): <strong>${{__($data->usd_amo)}}</strong></span>
                                    </div>
                                </div>
                                <div class="part-button">
                                    <button id="btn-confirm" type="submit" class="login-button btn-contact"> @lang('Pay Now')</button>
                                </div>
                            </div>
                            </form>
                        </div>




                </div>
            </div>
        </div>



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
