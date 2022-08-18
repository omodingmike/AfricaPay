@extends(activeTemp().'layouts.master')

@section('content')

        <section class="page-content">
            <div class="page-heading page-heading-bg pranto-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="title pranto-title">{{__($pt)}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            @include(activeTemp().'layouts.balance_show')
        </section>


        <section class="transaction-performance-section pranto-section-bottom" style="padding-top: 50px">
            <div class="thm-container container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="transaction-content">

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="diposited-by">
                                    <div class="table-responsive transaction-table">
                                        <table class="table text-center">
                                            <thead>
                                            <tr>
                                                <th class="text-center">@lang('Amount')</th>
                                                <th class="text-center">@lang('Gateway')</th>
                                                <th class="text-center">@lang('TRX ID')</th>
                                                <th class="text-center">@lang('TRX Time')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($deposit)==0)
                                                <tr>
                                                    <td colspan="4"><h2>@lang('No Data Available')</h2></td>
                                                </tr>
                                            @endif
                                            @foreach($deposit as $log)
                                                <tr>
                                                    <td>{{$log->amount}} {{$general->currency_sym}}</td>
                                                    <td>@lang($log->gateway->name)</td>
                                                    <td>@lang($log->trx))</td>
                                                    <td>{{$log->created_at}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>

                                        </table><!-- /.table -->
                                        {{$deposit->links()}}
                                    </div><!-- /.table-responsive -->
                                </div>

                            </div><!-- /.tab-content -->
                        </div><!-- /.transaction-content -->
                    </div><!-- /.col-lg-8 -->

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section>


@endsection
@section('page_scripts')


@endsection



