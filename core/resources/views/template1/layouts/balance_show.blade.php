<div class="counter">
    <div class="container">
        <div class="row d-flex">
            <div class="col-xl-6 col-lg-6 col-md-12 d-flex align-items-center wow bounce">
                <div class="single-counter">
                    <div class="part-icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="part-text">
                        <h3>@lang('Balance'): {{__($general->currency_sym)}} {{round(Auth::user()->balance,4)}}</h3>
                        <h4>{{__($general->deposit_wallet_name) }}</h4>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 wow bounce">
                <div class="single-counter">
                    <div class="part-icon">
                        <i class="flaticon-donation"></i>
                    </div>
                    <div class="part-text">
                        <h3>@lang('Balance'): {{__($general->currency_sym)}} {{round(Auth::user()->interest_balance,4)}}</h3>
                        <h4>{{__($general->interest_wallet_name) }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
