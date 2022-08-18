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


    <div class="contact login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="section-title text-center">
                        <h2> #{{$ticket_object->ticket}} - {{__($ticket_object->subject)}}</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    &times;
                                </button>
                                <p>{{ __($error) }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="col-xl-12">
                    <form class="contact-form" action="{{route('store.customer.reply', $ticket_object->ticket)}}" method="post">
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



                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputName">@lang('Reply')<span class="requred">:</span></label>
                                    <textarea class="form-control" name="comment" rows="10" required></textarea>
                                </div>
                            </div>


                            <div class="col-xl-12 col-lg-12">
                                <div class="row d-flex">
                                    <div class="col-xl-12 col-lg-12">
                                        <button type="submit" style="width: 100%" class="login-button btn-contact">@lang('Submit')</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@stop
