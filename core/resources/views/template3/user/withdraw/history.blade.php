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
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th >@lang('Withdraw Id')</th>
                                                <th >@lang('Date')</th>
                                                <th >@lang('Payment Detail')</th>
                                                <th >@lang('Amount')</th>
                                                <th >@lang('Charge')</th>
                                                <th >@lang('Payable Amount')</th>
                                                <th >@lang('Processing Time')</th>
                                                <th >@lang('Status')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($trans)==0)
                                                <tr>
                                                    <td colspan="8" class="text-center">@lang('No Data Available')</td>
                                                </tr>
                                            @endif
                                            @foreach($trans as $data)
                                                <tr>
                                                    <td>{{__($data->withdraw_id)}}</td>
                                                    <td scope="row">{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
                                                    <td>{{__($data->detail)}}</td>
                                                    <td>{{__($general->currency_sym)}} {{__($data->amount)}}</td>
                                                    <td>{{__($general->currency_sym)}} {{__($data->charge)}}</td>
                                                    <td>{{__($data->method_cur_amount)}} {{__($data->withdraw_method->currency)}} - @lang('Via') {{__($data->withdraw_method->name)}}</td>
                                                    <td>{{__($data->processing_time)}}</td>
                                                    <td>
                                                        @if($data->status == 2)
                                                            <label class="label label-danger">@lang('Reject')</label>
                                                        @elseif($data->status == 0)
                                                            <label class="label label-warning">@lang('Pending')</label>
                                                        @elseif($data->status == 1)
                                                            <label class="label label-success">@lang('Complete')</label>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            {{$trans->links()}}
                                        </table><!-- /.table -->
                                    </div><!-- /.table-responsive -->
                                </div>

                            </div><!-- /.tab-content -->
                        </div><!-- /.transaction-content -->
                    </div><!-- /.col-lg-8 -->

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section>

@endsection

