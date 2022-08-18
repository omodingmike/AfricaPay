@extends(activeTemp().'layouts.frontend')

@section('content')

    <section class="page-content">
        <!--Start Page Heading-->
        <div class="page-heading page-heading-bg ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="title">@lang('Login')</h1>
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
                    <div class="col-md-6 col-md-offset-3">
                        <!--Start Contact Form-->
                        <div class="contact-form">
                            <!--Start Section Heading-->
                            <div class="section-heading text-center">
                                <h2 class="title">@lang('Login On Your Account')</h2>
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
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" id="InputName" placeholder="@lang('Enter Username')" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control"  name="password" id="InputAmount" placeholder="@lang('Enter Your Password')" required>
                                </div>

                                <div class="form-group">
                                    <label for="remember" class="checkbox-inline"> <input  name="remember" id="remember" type="checkbox">@lang('Keep me logged in')</label>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact-frm-btn text-center">
                                            <button type="submit" class="cont-btn btn-block" style="width: 100%">@lang('Sign In')</button>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('password.request') }}">@lang('Forgot Password?')</a>
                                    </div>
                                </div>


                                @if($general->social_login == 1)
                                    <br>
                                    <div class="row">

                                        <div class="col-md-6" style="margin-top: 20px">
                                            <a href="{{route('social.login', 'facebook')}}" class="btn btn-success btn-block" style="background:#4267b2; border: #4267b2;padding: 12px 0px 12px;" >@lang('Join With') <i class="fa fa-facebook"></i> </a>
                                        </div>

                                        <div class="col-md-6" style="margin-top: 20px">
                                            <a href="{{route('social.login', 'google')}}" class="btn btn-danger btn-block" style="padding: 12px 0px 12px;">@lang('Join With') <i class="fa fa-google"></i></a>
                                        </div>

                                    </div>
                                @endif
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

@endsection
@section('script')

@stop
