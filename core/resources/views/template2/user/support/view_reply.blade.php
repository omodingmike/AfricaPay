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
        </section>

        <section class="get-in-touch" id="contact">

            <div class="thm-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-content">
                            <div class="inner">
                                <div class="title text-center">
                                    <h3>#{{$ticket_object->ticket}} - {{__($ticket_object->subject)}}</h3>
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                {{__($error)}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div><!-- /.title -->
                                <form action="{{route('store.customer.reply', $ticket_object->ticket)}}" method="post" class="contact-form">
                                    @csrf
                                    <div class="row">
                                        @foreach($ticket_data as $data)
                                            <fieldset class="col-md-12" style="margin-bottom: 10px;">
                                                <div class="card" style="border-radius: 15px;">
                                                    <div class="card-body">
                                                        @if($data->type == 1)
                                                            <legend><span style="color: #0e76a8">{{Auth::user()->name}}</span> , <small>{{ \Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A') }}</small></legend>
                                                        @else
                                                            <legend><span style="color: #0e76a8">{{$general->sitename}}</span> , <small>{{ \Carbon\Carbon::parse($data->updated_at)->format('F dS, Y - h:i A') }}</small></legend>
                                                        @endif


                                                        <div class="panel panel-danger">
                                                            <div class="panel-body">
                                                                <p>{!! $data->comment !!}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        @endforeach
                                    </div>

                                    <div class="frm-grp">
                                        <textarea name="comment" rows="10" placeholder="@lang('Reply')" required></textarea>
                                    </div><!-- /.frm-grp -->




                                    <div class="frm-grp">
                                        <button type="submit">@lang('Submit')</button>
                                    </div><!-- /.frm-grp -->


                                    <div class="form-result"></div><!-- /.form-result -->

                                </form>

                            </div><!-- /.inner -->
                        </div><!-- /.form-content -->
                    </div><!-- /.col-md-5 -->
                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.get-in-touch -->



@endsection
@section('script')

@stop
