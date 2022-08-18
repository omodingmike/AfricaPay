@extends(activeTemp().'layouts.master')

@section('content')
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
                                        <th scope="col">@lang('Date')</th>
                                        <th scope="col">@lang('Description')</th>
                                        <th scope="col">@lang('Amount')</th>
                                        <th scope="col">@lang('After Balance')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($trans)==0)
                                        <tr>
                                            <td colspan="4" class="text-center">@lang('No Data Available')</td>
                                        </tr>
                                    @endif
                                    @foreach($trans as $data)
                                        <tr @if($data->amount < 0) style="background-color: #e4afaf" @endif>
                                            <td scope="row">{{date('g:ia \o\n l jS F Y', strtotime($data->created_at))}}</td>
                                            <td>{{__($data->des)}}</td>
                                            <td>{{__($general->currency_sym)}} {{abs($data->amount)}}</td>
                                            <td>{{__($general->currency_sym)}} {{round($data->balance,4)}}</td>
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
    </div>
@endsection