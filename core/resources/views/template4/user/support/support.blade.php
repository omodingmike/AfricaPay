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
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <a href="{{route('add.new.ticket')}}" class="btn btn-warning btn-block" style="color: black ;"><b>@lang('New Ticket')</b></a>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="single-transaction">

                            <div class="parent-table">
                                <table class="table">
                                    <thead class="table-title" style="color: #fff">
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
                                                    <h4> <span class="badge badge-warning"> @lang('Opened')</span></h4>
                                                @elseif($data->status == 2)
                                                    <h4> <span  class="badge badge-success">  @lang('Answered') </span></h4>
                                                @elseif($data->status == 3)
                                                    <h4><span  class="badge badge-info"> @lang('Customer Reply') </span></h4>
                                                @elseif($data->status == 9)
                                                    <h4><span  class="badge badge-danger">  @lang('Closed') </span></h4>
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
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

@endsection