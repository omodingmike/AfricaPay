@extends(activeTemp().'layouts.frontend')

@section('content')

        <section class="page-content">
            <!--Start Page Heading-->
            <div class="page-heading page-heading-bg ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="title">@lang('Authorization')</h1>
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
                        <div class="col-md-12 ">
                            <!--Start Contact Form-->
                            <div class="contact-form">
                                <!--Start Section Heading-->


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


                            @if (Auth::user()->status != '1')

                                <div class="section-heading text-center">
                                    <h2 class="title" style="color: #ff1715">@lang('Your Acount is Currently Deactive.')</h2>
                                    <p>@lang('Contact Us or Make Support Ticket for solving your issue.')</p>
                                </div>

                            @elseif(Auth::user()->emailv != '1')
                                    <div class="row">

                                        <div class="col-md-6" style="margin-bottom: 10px">
                                            <form  action="{{route('sendemailver')}}" method="post">
                                                @csrf

                                            <div class="form-group">
                                                <label for="InputName">@lang('Please verify your Email')<span class="requred">*</span></label>
                                                <input type="text" class="form-control" readonly value="{{Auth::user()->email}}" required>
                                            </div>


                                            <div class="contact-frm-btn text-center">
                                                <button type="submit" class="cont-btn btn-block" style="width: 100%">@lang('Send Verification Code')</button>
                                            </div>

                                            </form>
                                        </div>

                                        <div class="col-md-6" style="margin-bottom: 10px">
                                            <form action="{{route('emailverify')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="InputName">@lang('Verify Code')<span class="requred">*</span></label>
                                                    <input type="text" class="form-control" name="code" id="InputName"  placeholder="@lang('Enter Verification Code')"  required>
                                                </div>

                                                <div class="contact-frm-btn text-center">
                                                    <button type="submit" class="cont-btn btn-block" style="width: 100%">@lang('Verify')</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                            @elseif(Auth::user()->smsv != '1')
                                    <div class="row">

                                        <div class="col-md-6" style="margin-bottom: 10px">
                                            <form  action="{{route('sendsmsver')}}" method="post">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="InputName">@lang('Please verify your Mobile')<span class="requred">*</span></label>
                                                    <input type="text" class="form-control" readonly value="{{Auth::user()->mobile}}" required>
                                                </div>


                                                <div class="contact-frm-btn text-center">
                                                    <button type="submit" class="cont-btn btn-block" style="width: 100%">@lang('Send Verification Code')</button>
                                                </div>

                                            </form>
                                        </div>

                                        <div class="col-md-6" style="margin-bottom: 10px">
                                            <form action="{{route('smsverify')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="InputName">@lang('Verify Code')<span class="requred">*</span></label>
                                                    <input type="text" class="form-control" name="code" id="InputName"  placeholder="@lang('Enter Verification Code')"  required>
                                                </div>

                                                <div class="contact-frm-btn text-center">
                                                    <button type="submit" class="cont-btn btn-block" style="width: 100%">@lang('Verify')</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                            @elseif(Auth::user()->tfver != '1')
                                    <div class="row">

                                        <div class="col-md-6 col-md-offset-3" style="margin-bottom: 10px">
                                            <form  action="{{route('go2fa.verify') }}" method="post">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="InputName">@lang('Verify Google Authenticator Code')<span class="requred">*</span></label>
                                                    <input type="text" class="form-control" name="code" id="InputName"  placeholder="@lang('Enter Verification Code')"  required>
                                                </div>


                                                <div class="contact-frm-btn text-center">
                                                    <button type="submit" class="cont-btn btn-block" style="width: 100%">@lang('Verify')</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                            @endif

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

@endsection
