@extends(activeTemp().'layouts.master')
@section('style')

@stop
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

        <section class="get-in-touch" id="app">

            <div class="thm-container">
                <div class="row">
                    <div class="col-md=12">
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    {{__($error)}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-12">
                        <div class="form-content">
                            <div class="inner">
                               <!-- /.title -->
                                <form  id="balanceTransfer" method="POST" action="{{route('user.balance.transfer.post')}}" class="contact-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="alert alert-danger" role="alert">
                                                <strong>@lang('Balance Transfer Charge') {{__($general->bal_trans_fixed_charge)}} {{__($general->currency)}} @lang('Fixed and')  {{__($general->bal_trans_per_charge)}} % @lang('of your total amount to transfer balance.')</strong>

                                                <p><span class="total_amo"></span> {{__($general->currency)}} @lang('will subtract from your') <span class="wallet_name"></span> </p>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="InputFirstname">@lang('Select Your Wallet')<span class="requred">*</span></label>
                                                <select class="form-control" name="wallet_id">
                                                    <option value="1">{{__($general->deposit_wallet_name)}} ({{round(Auth::user()->balance,4)}} {{__($general->currency)}})</option>
                                                    <option value="2">{{__($general->interest_wallet_name)}} ({{round(Auth::user()->interest_balance,4)}} {{__($general->currency)}})</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="InputMail">@lang('Username / Email To Send Amount') <span class="requred">*</span></label>
                                                <input type="text" class="form-control" id="InputMailUser" name="username" placeholder="@lang('Username/Email')" required autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="InputMail">@lang('Transfer from') <span class="wallet_name"> </span> <span class="requred">*</span></label>
                                                <input type="text" class="form-control" id="InputMail" name="amount" placeholder="@lang('Amount') {{__($general->currency)}}" required>
                                                <small class="d-none balance_message" style="color: red">@lang('Insufficient Balance!')</small>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="frm-grp" id="bal">
                                        @if(Auth::user()->tauth == 1)
                                            <button type="button" style="width: 100%;" data-toggle="modal" data-target="#openmodal" class="login-button btn-contact"> @lang('Transfer Balance')</button>
                                        @else
                                            <button type="submit" style="width: 100%;" class="login-button btn-contact"> @lang('Transfer Balance')</button>
                                        @endif
                                    </div><!-- /.frm-grp -->


                                    <div class="form-result"></div><!-- /.form-result -->

                                </form>
                            </div><!-- /.inner -->
                        </div><!-- /.form-content -->
                    </div><!-- /.col-md-5 -->

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
                                        <button type="submit" class="btn btn-success">@lang('Verify')</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section>





@endsection
@section('style')

@stop
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
