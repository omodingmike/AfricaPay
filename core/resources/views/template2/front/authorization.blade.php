@extends(activeTemp().'layouts.frontend')
@section('content')
        <section class="tools-section pranto-tool">
            <div class="thm-container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="tools-content pranto-bread">
                            <h3>@lang('Authorization')</h3>
                        </div><!-- /.tools-content -->
                    </div><!-- /.col-md-6 -->

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.tools-section -->

        <div class="contact login">
            <div class="container">
                @if (Auth::user()->status != '1')
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-8">
                            <div class="section-title text-center">
                                <h2 style="color: #ff3221">@lang('Your Account is Currently Deactive.')</h2>
                                <p>@lang('Contact Us or Make Support Ticket for solving your issue.')</p>
                            </div>
                        </div>
                    </div>

                    @if (count($errors) > 0)
                        <div class="row">
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
                        </div>
                    @endif
                @elseif(Auth::user()->emailv != '1')
                    <div class="row justify-content-center">

                        <div class="col-xl-6 col-lg-6" style="margin-bottom: 10px">
                            <form class="contact-form" action="{{route('sendemailver')}}" method="post">
                                @csrf
                                <div class="row">


                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="InputName">@lang('Please verify your Email')<span class="requred">*</span></label>
                                            <input type="text" class="form-control" readonly value="{{Auth::user()->email}}" required>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12">
                                        <div class="row d-flex">
                                            <div class="col-xl-12 col-lg-12">
                                                <button type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Send Verification Code')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>

                        <div class="col-xl-6 col-lg-6" style="margin-bottom: 10px">
                            <form class="contact-form" action="{{route('emailverify')}}" method="post">
                                @csrf
                                <div class="row">


                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="InputName">@lang('Verify Code')<span class="requred">*</span></label>
                                            <input type="text" class="form-control" name="code" id="InputName"  placeholder="@lang('Enter Verification Code')"  required>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12">
                                        <div class="row d-flex">
                                            <div class="col-xl-12 col-lg-12">
                                                <button type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Verify')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>

                    </div>

                @elseif(Auth::user()->smsv != '1')

                    <div class="row justify-content-center">

                        <div class="col-xl-6 col-lg-6" style="margin-bottom: 10px">
                            <form class="contact-form" action="{{route('sendsmsver')}}" method="post">
                                @csrf
                                <div class="row">


                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="InputName">@lang('Please verify your Mobile')<span class="requred">*</span></label>
                                            <input type="text" class="form-control" readonly value="{{Auth::user()->mobile}}" required>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12">
                                        <div class="row d-flex">
                                            <div class="col-xl-12 col-lg-12">
                                                <button type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Send Verification Code')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>

                        <div class="col-xl-6 col-lg-6" style="margin-bottom: 10px">
                            <form class="contact-form" action="{{route('smsverify')}}" method="post">
                                @csrf
                                <div class="row">


                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="InputName">@lang('Verify Code')<span class="requred">*</span></label>
                                            <input type="text" class="form-control" name="code" id="InputName"  placeholder="@lang('Enter Verification Code')"  required>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12">
                                        <div class="row d-flex">
                                            <div class="col-xl-12 col-lg-12">
                                                <button type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Verify')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

                @elseif(Auth::user()->tfver != '1')
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-md-offset-3">
                            <form class="contact-form" action="{{route('go2fa.verify') }}" method="post">
                                @csrf
                                <div class="row">


                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="InputName">@lang('Verify Google Authenticator Code')<span class="requred">*</span></label>
                                            <input type="text" class="form-control" name="code" id="InputName"  placeholder="@lang('Enter Verification Code')"  required>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12">
                                        <div class="row d-flex">
                                            <div class="col-xl-12 col-lg-12">
                                                <button type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Verify')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

                @endif

            </div>
        </div>

@endsection
