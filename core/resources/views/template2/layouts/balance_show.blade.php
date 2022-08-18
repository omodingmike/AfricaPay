
    <section class="tools-satisfaction">
        <div class="thm-container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="single-tool-satisfaction">
                        <div class="icon-box">
                            <div class="inner"><i class="icofont icofont-money-bag"></i></div><!-- /.inner -->
                        </div><!-- /.icon-box -->
                        <div class="text-box">
                            <h3>@lang('Balance'): {{__($general->currency_sym)}} {{round(Auth::user()->balance,4)}}</h3>
                            <p>{{__($general->deposit_wallet_name) }}</p>
                        </div><!-- /.text-box -->
                    </div><!-- /.single-tool-satisfaction -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="single-tool-satisfaction">
                        <div class="icon-box">
                            <div class="inner"><i class="icofont icofont-money"></i></div><!-- /.inner -->
                        </div><!-- /.icon-box -->
                        <div class="text-box">
                            <h3>@lang('Balance'): {{__($general->currency_sym)}} {{round(Auth::user()->interest_balance,4)}}</h3>
                            <p>{{__($general->interest_wallet_name) }} || {{Session::get('template')}} </p>
                        </div><!-- /.text-box -->
                    </div><!-- /.single-tool-satisfaction -->
                </div><!-- /.col-md-6 -->
            </div><!-- /.row -->
        </div><!-- /.thm-container -->
    </section><!-- /.tools-satisfaction -->
