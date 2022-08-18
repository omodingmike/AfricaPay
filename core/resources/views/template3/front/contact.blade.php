@extends(activeTemp().'layouts.frontend')

@section('content')

        <section class="page-content">
            <!--Start Page Heading-->
            <div class="page-heading page-heading-bg ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="title">@lang('Contact')</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Page Heading-->

            <!--Start Contact Area-->
            <div class="contact-wrap">
                <!--Start Container-->
                <div class="container">
                    <!--Start Row-->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <!--Start Contact Form-->
                            <div class="contact-form">
                                <!--Start Section Heading-->
                                <div class="section-heading text-center">
                                    <span class="subtitle">@lang('Get In Touch')</span>
                                    <h2 class="title">@lang('Contact Us')</h2>
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
                                <!--End Section Heading-->
                                <form action="{{route('send.mail.contact')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="InputName" name="name" placeholder="@lang('Enter Your Name')">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="InputMail" placeholder="@lang('Enter Your E-mail Address')">
                                    </div>

                                    <div class="form-group">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" placeholder="@lang('Enter Your Message')"></textarea>
                                    </div>
                                    <div class="contact-frm-btn text-center">
                                        <button type="submit" class="cont-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!--End Contact Form-->
                        </div>
                    </div>
                    <!--End Row-->
                </div>
                <!--End Container-->
            </div>
            <!--End Contact Area-->
        </section>

@stop
