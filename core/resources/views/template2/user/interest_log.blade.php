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

        <script>
            function createCountDown(elementId, sec) {
                var tms = sec;
                var x = setInterval(function() {
                    var distance = tms*1000;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    document.getElementById(elementId).innerHTML =days+"d: "+ hours + "h "+ minutes + "m " + seconds + "s ";
                    if (distance < 0) {
                        clearInterval(x);
                        document.getElementById(elementId).innerHTML = "{{__('COMPLETE')}}";
                    }
                    tms--;
                }, 1000);
            }

        </script>

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
                                                <th scope="col">@lang('Plan Name')</th>
                                                <th scope="col">@lang('Payable Interest')</th>
                                                <th scope="col">@lang('Period')</th>
                                                <th scope="col">@lang('Received')</th>
                                                <th scope="col">@lang('Capital Back')</th>
                                                <th scope="col">@lang('Invest Amount')</th>
                                                <th scope="col">@lang('Status')</th>
                                                <th scope="col" style="width :20%">@lang('Next Payment')</th>
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
                                                    <td>{{__($data->plan->name)}}</td>
                                                    <td>{{__($general->currency_sym)}} {{__($data->interest)}} / {{__($data->time_name)}} </td>
                                                    <td>@if($data->period == '-1') <span class="label label-success">@lang('Life-time')</span>  @else {{__($data->period)}} @lang('Times') @endif</td>
                                                    <td>  {{__($data->return_rec_time)}} @lang('Times') </td>
                                                    <td>@if($data->capital_status == '1') <span class="label label-success">@lang('Yes')</span>  @else <span class="label label-warning">@lang('No')</span> @endif</td>
                                                    <td>  {{__($general->currency_sym)}} {{__($data->amount)}} </td>
                                                    <td style="padding-top:20px">  @if($data->status == '1') <img style="width: 30px;" src="{{asset('assets/images/load.gif')}}"><span class="label label-warning">@lang('Running')</span>  @else <span class="label label-primary">@lang('Complete')</span> @endif </td>
                                                    <td scope="row" style="font-weight:bold;"><p id="counter{{$data->id}}" class="demo countdown timess2"> </p></td>

                                                </tr>

                                                <script>createCountDown('counter<?php echo $data->id ?>', {{\Carbon\Carbon::parse($data->next_time)->diffInSeconds()}});</script>
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
        </section><!-- /.transaction-performance-section -->

@endsection
@section('script')

@stop
