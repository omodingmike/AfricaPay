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
        </section><!-- /.tools-section -->
        @include(activeTemp().'layouts.balance_show')
        <section class="transaction-performance-section">
            <div class="thm-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="transaction-content">

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="diposited-by">
                                    <div class="table-responsive transaction-table">
                                        <table class="table">
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



