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

        <div class="transaction">
            <div class="container">

                <div class="row">

                    <div class="col-md-12">
                        <div class="single-transaction">

                            <div class="parent-table">
                                <table class="table">
                                    <thead class="table-title" style="color: #fff">
                                    <tr>
                                        <th >@lang('Amount')</th>
                                        <th >@lang('Gateway')</th>
                                        <th >@lang('TRX ID')</th>
                                        <th >@lang('TRX Time')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($deposit)==0)
                                        <tr>
                                            <td colspan="4" class="text-center">@lang('No Data Available')</td>
                                        </tr>
                                    @endif
                                    @foreach($deposit as $log)
                                        <tr>
                                            <td class="text-center">{{$log->amount}} {{$general->currency_sym}}</td>
                                            <td class="text-center">@lang($log->gateway->name)</td>
                                            <td class="text-center">@lang($log->trx))</td>
                                            <td class="text-center">{{$log->created_at}}</td>
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

@endsection


