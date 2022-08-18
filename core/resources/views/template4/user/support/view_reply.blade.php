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

        <div class="contact">


            <div class="get-in-touch">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-8">
                            <div class="section-title">
                                <h2>#{{$ticket_object->ticket}} - {{__($ticket_object->subject)}}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                        <p>{{ __($error) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif

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

                        <div class="col-xl-12 col-lg-12">
                            <div class="part-form">
                                <form action="{{route('store.customer.reply', $ticket_object->ticket)}}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <textarea name="comment" rows="10" required placeholder="@lang('Message...')"></textarea>
                                        </div>

                                        <div class="col-xl-12">
                                            <button type="submit">@lang('Submit')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
