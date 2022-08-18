@extends(activeTemp().'layouts.master')

@section('content')

        <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="breadcrump-title text-center">
                            <h2 class="add-space">{{__($pt)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        <div class="transaction">
            <div class="container">

                <div class="row">

                    <div class="col-md-12">
                        <div class="single-transaction">

                            <div class="parent-table">
                                <table class="table">
                                    <thead class="table-title" style="color: #fff">
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
                                            <td>@if($data->capital_status == '1') <span class="badge badge-success">@lang('Yes')</span>  @else <span class="badge badge-warning">@lang('No')</span> @endif</td>
                                            <td>  {{__($general->currency_sym)}} {{__($data->amount)}} </td>
                                            <td style="padding-top:20px">  @if($data->status == '1') <img style="width: 30px;" src="{{asset('assets/images/load.gif')}}"><span class="badge badge-warning">@lang('Running')</span>  @else <span class="badge badge-primary">@lang('Complete')</span> @endif </td>
                                            <td scope="row" style="font-weight:bold;"><p id="counter{{$data->id}}" class="demo countdown timess2"> </p></td>

                                        </tr>

                                        <script>createCountDown('counter<?php echo $data->id ?>', {{\Carbon\Carbon::parse($data->next_time)->diffInSeconds()}});</script>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$trans->links()}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
@endsection
