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
                <div class="row">
                    <div class="col-md-12 pranto-border" style="margin-bottom: 20px;">


                        <!--Start Contact Form-->
                        <div class="contact-form">

                            <div class="section-heading text-center">
                                <h2 class="title">#{{$ticket_object->ticket}} - {{__($ticket_object->subject)}}</h2>
                            </div>

                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        {{__($error)}}
                                    </div>
                            @endforeach
                        @endif
                            <!--Start Section Heading-->

                            <!--End Section Heading-->
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

                                <div class="form-group">
                                    <textarea name="comment" class="form-control" rows="10" placeholder="@lang('Reply')" required></textarea>
                                </div><!-- /.frm-grp -->




                                <div class="contact-frm-btn text-center">
                                    <button type="submit" style="width: 100%">@lang('Submit')</button>
                                </div><!-- /.frm-grp -->

                            </form>
                        </div>
                        <!--End Contact Form-->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section>



@endsection
@section('script')

@stop
