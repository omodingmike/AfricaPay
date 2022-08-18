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
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <a href="{{route('add.new.ticket')}}" class="btn btn-warning btn-block" style="color: black ;"><b>@lang('New Ticket')</b></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="transaction-content">

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="diposited-by">
                                    <div class="table-responsive transaction-table">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>@lang('Ticket Subject')</th>
                                                <th>@lang('Last Activity')</th>
                                                <th>@lang('Status')</th>
                                                <th>@lang('Priority')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($all_ticket)==0)
                                                <tr>
                                                    <td colspan="5" class="text-center">@lang('No Data Available')</td>
                                                </tr>
                                            @endif
                                            @foreach($all_ticket as $data)
                                                <tr>
                                                    <td>
                                                        <a style="color: #56cae9" href="{{route('ticket.customer.reply', $data->ticket )}}"><b>{{$data->subject}}</b></a>
                                                        <br>
                                                        <small style="color: #000000" class="text-muted">@lang('Ticket ID'): {{$data->ticket}}</small>
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($data->created_at)->diffForHumans() }}<br><small style="color: #1a0000 !important;" class="text-muted">{{ \Carbon\Carbon::parse($data->created_at)->format('F dS, Y - h:i A') }}</small></td>
                                                    <td>
                                                        @if($data->status == 1)
                                                            <h4> <span class="label label-warning"> @lang('Opened')</span></h4>
                                                        @elseif($data->status == 2)
                                                            <h4> <span  class="label label-success">  @lang('Answered') </span></h4>
                                                        @elseif($data->status == 3)
                                                            <h4><span  class="label label-info"> @lang('Customer Reply') </span></h4>
                                                        @elseif($data->status == 9)
                                                            <h4><span  class="label label-danger">  @lang('Closed') </span></h4>
                                                        @endif
                                                    </td>
                                                    <td>

                                                        <a class="btn btn-success"  href="{{route('ticket.customer.reply', $data->ticket )}}"><i class="fa fa-eye"></i></a>
                                                        <a class="btn btn-danger" href="{{route('ticket.close', $data->ticket)}}"><i class="fa fa-times"></i> @lang('Close Ticket')</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        {{$all_ticket->links()}}
                                    </div><!-- /.table-responsive -->
                                </div>

                            </div><!-- /.tab-content -->
                        </div><!-- /.transaction-content -->
                    </div><!-- /.col-lg-8 -->

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section>


@endsection

