
    <!-- referral begin-->
    <div class="referral" style="padding: 110px 0 0; !important;">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="left-side">
                        <div class="single-level pranto-level one">
                            <div class="part-parcent pranto-parcent">
                                <span class="level-no"></span>
                                <h4><i style="font-size: 50px;" class="fa fa-money"></i></h4>
                            </div>
                            <div class="part-text">
                                <h4 class="title">@lang('Balance'): {{__($general->currency_sym)}} {{round(Auth::user()->balance,4)}}</h4>
                                <p>{{__($general->deposit_wallet_name) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="right-side">
                        <div class="single-level pranto-level one">
                            <div class="part-parcent pranto-parcent">
                                <span class="level-no"></span>
                                <h4><i style="font-size: 50px;" class="fa fa-credit-card-alt"></i></h4>
                            </div>
                            <div class="part-text">
                                <h4 class="title">@lang('Balance'): {{__($general->currency_sym)}} {{round(Auth::user()->interest_balance,4)}}</h4>
                                <p>{{__($general->interest_wallet_name) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
