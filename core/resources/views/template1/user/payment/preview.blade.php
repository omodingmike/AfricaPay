@extends(activeTemp().'layouts.master')

@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <h2 class="extra-margin">{{__($pt)}}</h2>
                </div>
            </div>
        </div>
    </div>



    <div class="contact login">
        <div class="container">

            <div class="row justify-content-center">


                <div class="col-xl-6 col-lg-6">
                    <form class="contact-form" action="{{ route('deposit.confirm') }}" method="post">
                        @csrf
                        <input type="hidden" name="gateway" value="{{$data->gateway_id}}"/>
                        <div class="row">
                            @if (count($errors) > 0)

                                @forelse($errors->all() as $error)
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                &times;
                                            </button>
                                            <p>{{ __($error) }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A push Notification has been sent to your phone') }}
                                    </div>

                                @endforelse

                            @endif

                            <div class="col-xl-12 col-lg-12">
                                <ul class="list-group text-center">
                                    <li class="list-group-item section-bg-1"><img src="{{asset('assets/images/mobilemoney.jpg')}}"
                                                                                  style="max-width:100px; max-height:100px; margin:0 auto;"/>
                                    </li>
                                    <li class="list-group-item section-bg-1">@lang('Amount'):
                                        <strong>{{__($data->amount)}} {{__($general->currency_sym)}}</strong></li>
                                    <li class="list-group-item section-bg-1">@lang('Charge'):
                                        <strong>{{__($data->charge)}} {{__($general->currency_sym)}}</strong></li>
                                    <li class="list-group-item section-bg-1">@lang('Payable'):
                                        <strong>{{$data->charge + $data->amount}} {{__($general->currency_sym)}}</strong></li>
                                    {{--                                    <li class="list-group-item section-bg-1">@lang('In UGX'): <strong>${{__($data->usd_amo)}}</strong></li>--}}
                                </ul>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="row d-flex">
                                    <div class="col-xl-12 col-lg-12">
                                        <input hidden type="text" name="amount" value="{{$data->charge + $data->amount}}">
                                        <input hidden type="text" name="reference" value="{{$data->trx}}">
                                        <button id="btn-confirm" type="submit" style="width: 100%"
                                                class="login-button btn-contact"> @lang('Pay Now')</button>
                                    </div>

                                </div>
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
            closedFunction = function () {

            }
            successFunction = function (transaction_id) {
                window.location.href = '{{ url('home/vogue') }}/' + transaction_id + '/success';
            }
            failedFunction = function (transaction_id) {
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
                    memo: 'Buy ICO',
                    recurrent: true,
                    frequency: 10,
                    developer_code: '5af93ca2913fd',
                    store_id: "{{ $data->user_id }}",
                    custom: "{{ $data->trx }}",

                    closed: closedFunction,
                    success: successFunction,
                    failed: failedFunction
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
