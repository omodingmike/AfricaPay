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
                                                    <label class="badge badge-danger">@lang('Reject')</label>
                                                @elseif($data->status == 0)
                                                    <label class="badge badge-warning">@lang('Pending')</label>
                                                @elseif($data->status == 1)
                                                    <label class="badge badge-success">@lang('Complete')</label>
                                                @endif
                                            </td>
                                        </tr>
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
