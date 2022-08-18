@extends('admin.layout.master')
@section('import-css')
    <link href="{{ asset('assets/admin/css/jquery.fileupload.css') }}" rel="stylesheet">
@stop
@section('body')
    <div class="row">
        <div class="col-md-12">

            <div class="tile">
                <div class="row">
                    <div class="col-md-12">

                        <div class="portlet box purple">
                            <div class="portlet-title">

                                <div class="caption">
                                   <h3>Title: {{$ticket_object->ticket}} - {{$ticket_object->subject}}

                                       <div class="pull-right">
                                           @if($ticket_object->status == 1)
                                               <button class="btn btn-warning"> Opened</button>
                                           @elseif($ticket_object->status == 2)
                                               <button type="button" class="btn btn-success">  Answered </button>
                                           @elseif($ticket_object->status == 3)
                                               <button type="button" class="btn btn-info"> Customer Reply </button>
                                           @elseif($ticket_object->status == 9)
                                               <button type="button" class="btn btn-danger">  Closed </button>
                                           @endif

                                       </div>
                                   </h3>
                                </div>
                                <br>

                            </div>

                            <div class="portlet-body form">

                                <form method="POST" action="{{route('store.admin.reply', $ticket_object->ticket)}}" accept-charset="UTF-8" class="form-horizontal form-bordered">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            @foreach($ticket_data as $data)
                                                <div class="panel-body">
                                                    <fieldset class="col-md-12">
                                                        @if($data->type == 1)
                                                            <legend><span style="color: #0e76a8">{{$ticket_object->user->name}}</span> , <small>{{ \Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A') }}</small></legend>
                                                        @else
                                                            <legend><span style="color: #0e76a8">{{Auth::guard('admin')->user()->name}}</span> , <small>{{ \Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A') }}</small></legend>
                                                        @endif
                                                        <div class="panel panel-danger">
                                                            <div class="panel-body">
                                                                <p>{!! $data->comment !!}</p>
                                                            </div>
                                                        </div>

                                                    </fieldset>

                                                    <br>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12 bold">Reply: </label>
                                        <div class="col-md-12">
                                            <textarea class="form-control" name="comment" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary col-md-12"><i class="fa fa-check"></i> Post</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- END PAGE CONTENT-->
                </div>
            </div>
        </div>
    </div>


@endsection
