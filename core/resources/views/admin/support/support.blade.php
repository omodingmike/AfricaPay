@extends('admin.layout.master')
@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th> Ticket Id </th>
                            <th> Customer Name </th>
                            <th> Subject </th>
                            <th> Raised Time </th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $all_ticket as $key=>$data)
                            <tr>
                                <td>{{$data->ticket}}</td>
                                <td><b><a href="{{route('user.view', $data->user->id)}}">{{$data->user->name}}</a></b></td>
                                <td><b>{{$data->subject}}</b></td>
                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('F dS, Y - h:i A') }}</td>
                                <td>
                                    @if($data->status == 1)
                                        <button class="btn btn-warning"> Opened</button>
                                    @elseif($data->status == 2)
                                        <button type="button" class="btn btn-success">  Answered </button>
                                    @elseif($data->status == 3)
                                        <button type="button" class="btn btn-info"> Customer Reply </button>
                                    @elseif($data->status == 9)
                                        <button type="button" class="btn btn-danger">  Closed </button>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('ticket.admin.reply', $data->ticket )}}">View</a>
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
@endsection
