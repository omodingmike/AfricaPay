@extends(activeTemp().'layouts.frontend')

@section('content')

        <section class="tools-section pranto-tool">
            <div class="thm-container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="tools-content pranto-bread">
                            <h3>@lang('Contact Us')</h3>
                        </div><!-- /.tools-content -->
                    </div><!-- /.col-md-6 -->

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.tools-section -->

        <!-- contact begin-->
        <div class="address-area">
            <div class="container">
                <div class="tsk-contact-info">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6" style="margin-bottom: 20px">
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

                        <div class="col-xl-4 col-lg-4 col-md-6" style="margin-bottom: 20px">
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

                        <div class="col-xl-4 col-lg-4 col-md-6" style="margin-bottom: 20px">
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

        <div class="contact" style="padding:  0 0 120px;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <form class="contact-form" action="{{route('send.mail.contact')}}" method="post" id="get_in_touch">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="section-title text-center">
                                        <h2>@lang('Contact Us For Support')</h2>

                                    </div>
                                </div>
                            </div>

                            @if (count($errors) > 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                {{__($error)}}
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
