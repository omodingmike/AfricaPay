
    <div class="we-build-area home-page-two pranto-build">
        <div class="container ">
            <div class="row ">
                <div class="col-md-12">
                    <div class="we-build-area-2-wrapper pranto-wrapper remove-padding">
                        <div class="row">
                            <div class="col-md-6 pranto-box">
                                <div class="single-how-we-build-3"><!-- single how we build -->
                                    <div class="icon">
                                        <i class="icofont icofont-money-bag"></i>
                                    </div>
                                    <div class="content">

                                        <h4 class="title">@lang('Balance'): {{__($general->currency_sym)}} {{round(Auth::user()->balance,4)}}</h4>
                                        <p>{{__($general->deposit_wallet_name) }} </p>
                                    </div>
                                </div><!-- //.single how we build -->
                            </div>
                            <div class="col-md-6 ">
                                <div class="single-how-we-build-3"><!-- single how we build -->
                                    <div class="icon">
                                        <i class="icofont icofont-money"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="title">@lang('Balance'): {{__($general->currency_sym)}} {{round(Auth::user()->interest_balance,4)}}</h4>
                                        <p>{{__($general->interest_wallet_name) }} </p>
                                    </div>
                                </div><!-- //.single how we build -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
