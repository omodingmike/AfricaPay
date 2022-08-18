@extends(activeTemp().'layouts.master')

@section('content')

        <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover; ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="breadcrump-title text-center">
                            <h2 class="add-space" style="font-size: 50px;">{{__($pt)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login">
            <div class="container">
                @if (count($errors) > 0)
                    <div class="row">
                        @foreach ($errors->all() as $error)
                            <div class="col-md-12">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <p>{{ __($error) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="row justify-content-center">


                    <div class="col-xl-12">
                        <div class="part-form">

                            <form id="balanceTransfer" action="{{route('user.balance.transfer.post')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="alert alert-danger" role="alert">
                                            <strong>@lang('Balance Transfer Charge') {{__($general->bal_trans_fixed_charge)}} {{__($general->currency)}} @lang('Fixed and')  {{__($general->bal_trans_per_charge)}} % @lang('of your total amount to transfer balance.')</strong>

                                                <p><span class="total_amo"></span> {{__($general->currency)}} @lang('will subtract from your') <span class="wallet_name"></span> </p>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-12 ">
                                        <div class="form-group">
                                            <label for="InputFirstname">@lang('Select Your Wallet')<span class="requred">*</span></label>
                                            <select class="pranto-select" style="padding:0px 8px;" name="wallet_id">
                                                <option value="1">{{__($general->deposit_wallet_name)}} ({{round(Auth::user()->balance,4)}} {{__($general->currency)}})</option>
                                                <option value="2">{{__($general->interest_wallet_name)}} ({{round(Auth::user()->interest_balance,4)}} {{__($general->currency)}})</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-12">
                                        <div class="form-group">
                                            <label for="InputMail">@lang('Username / Email To Send Amount') <span class="requred">*</span></label>
                                            <input type="text" id="InputMailUser" name="username" placeholder="@lang('Username/Email')" required autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-12">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="InputMail">@lang('Transfer from') <span class="wallet_name"> </span> <span class="requred">*</span></label>
                                                <input type="text" class="form-control" id="InputMail" name="amount" placeholder="@lang('Amount') {{__($general->currency)}}" required>
                                                <small class="d-none balance_message" style="color: red">@lang('Insufficient Balance!')</small>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xl-12 col-lg-12" id="bal" v-if="parseInt(balance) >= parseInt(newdata.amount) + amount && hasmsg.success == true">
                                        <div class="row d-flex">
                                            <div class="col-md-6 offset-md-3">
                                                @if(Auth::user()->tauth == 1)
                                                    <button type="button" style="width: 100%;" data-toggle="modal" data-target="#openmodal" class="login-button btn-contact"> @lang('Transfer Balance')</button>
                                                @else
                                                    <button type="submit" style="width: 100%;" class="login-button btn-contact"> @lang('Transfer Balance')</button>
                                                @endif
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="openmodal" class="modal fade tauthSubmit" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('Google Authenticator Code Verify')</h4>
                    </div>
                    <form action="#" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" name="code" placeholder="@lang('Enter Google Authenticator Code')">
                                <small style="color: red; text-align: center" class="errors"></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn-success">@lang('Verify')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection

@section('style')
<style>
            .d-none{
                display: none;
            }
        </style>
@endsection

@section('script')
    <script>



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('select[name=wallet_id]').change(function(){
            if ($(this).val() == 1) {
                var balance = {{ Auth::user()->balance  }};
                $('.wallet_name').text('{{__($general->deposit_wallet_name) }}');
            }else {
                var balance = {{ Auth::user()->interest_balance }};
                $('.wallet_name').text('{{ __($general->interest_wallet_name) }}');
            }
            var amount = parseFloat($('input[name=amount]').val());
            if (!amount) {
                amount = 0;
            }
            var total_amo = ({{intval($general->bal_trans_fixed_charge)}}+(parseInt(amount) * parseInt({{ intval($general->bal_trans_per_charge) }}))/100) + amount;
            if (balance < total_amo) {
                $('.balance_message').removeClass('d-none');
            }else{
                $('.balance_message').addClass('d-none');
            }
            $('.total_amo').text(total_amo);
        }).change();

        $('input[name=amount]').on('input',function(){
            $('select[name=wallet_id]').change();
        });

        $('.tauthSubmit').on('submit',function(e){
            e.preventDefault();
            var code = $('input[name=code]').val();
            $.post('{{route('check_two_facetor')}}', {code:code}, function(response) {
                if(response.errors){
                    $('.errors').text(response.errors.code[0]);
                }
                if (response.success == true){
                    $("#balanceTransfer").submit();
                }else if(response.message) {
                    swal(response.message,"", "warning");
                }
            })
        })
    </script>
@stop