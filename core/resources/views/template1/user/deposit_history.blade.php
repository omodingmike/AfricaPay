@extends(activeTemp().'layouts.master')

@section('content')
    <!-- page title begin-->
    <div class="page-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <h2 class="extra-margin">{{__($pt)}}</h2>

                </div>
            </div>
        </div>
    </div>
    @include(activeTemp().'layouts.balance_show')
    <!-- page title end -->

    <div class="transaction">
        <div class="container">

            <div class="row">
                <div class="col-xl-12 col-lg-12 wow zoomIn">
                    <div class="transaction-area">

                        <div class="tab-content" >
                            <div class="tab-pane fade show active" >

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
                                            <td>{{$log->amount}} {{__($general->currency_sym)}}</td>
                                            <td>{{__($log->gateway->name)}}</td>
                                            <td>{{__($log->trx)}}</td>
                                            <td>{{$log->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$deposit->links()}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('page_scripts')


@endsection



