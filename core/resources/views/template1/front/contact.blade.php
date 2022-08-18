@extends(activeTemp().'layouts.frontend')

@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <h2>@lang('Contact Us')</h2>

                </div>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- contact begin-->
    <div class="address-area">
        <div class="container">
            <div class="tsk-contact-info">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="contact-info-item">
                            <div class="icon-bar">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div class="info-details">
                                <h5>@lang('Our Address')</h5>
                                <p>{{__($general->address)}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="contact-info-item">
                            <div class="icon-bar">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="info-details">
                                <h5>@lang('Email Address')</h5>
                                <a href="mailto:{{$general->email}}">{{$general->email}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="contact-info-item">
                            <div class="icon-bar">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="info-details">
                                <h5>@lang('Phone Number')</h5>
                                <a href="tel:{{$general->phone}}">{{__($general->phone)}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact pt-120px" style="margin-bottom: 120px">

        <div class="container">


            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <form class="contact-form" action="{{route('send.mail.contact')}}" method="post" id="get_in_touch">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-xl-8 col-lg-8">
                                <div class="section-title text-center">
                                    <h2>@lang('Contact Us For Support')</h2>

                                </div>
                            </div>
                        </div>

                        @if (count($errors) > 0)
                            <div class="row">
                                <div class="col-md-12">
                                    @foreach ($errors->all() as $error)

                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <p>{{__($error)}} </p>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="row">



                            <div class="col-xl-6 col-lg-6">
                                <div class="form-group">
                                    <label for="InputName">@lang('Name')<span class="requred">*</span></label>
                                    <input type="text" class="form-control" id="InputName" name="name" placeholder="@lang('Enter Your Name')">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="form-group">
                                    <label for="InputMail">@lang('E-mail')<span class="requred">*</span></label>
                                    <input type="email" class="form-control" name="email" id="InputMail" placeholder="@lang('Enter Your E-mail Address')">
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">@lang('Message') <span class="requred">*</span></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" placeholder="@lang('Enter Your Message')"></textarea>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <button class="btn-contact" type="submit">@lang('Send Now')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@stop
