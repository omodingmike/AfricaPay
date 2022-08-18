@extends(activeTemp().'layouts.frontend')

@section('content')

        <section class="tools-section pranto-tool" >
            <div class="thm-container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="tools-content pranto-bread">
                            <h3>@lang('Login')</h3>

                        </div><!-- /.tools-content -->
                    </div><!-- /.col-md-6 -->

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.tools-section -->

        <section class="get-in-touch" id="contact">

            <div class="thm-container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-content">
                            <div class="inner">
                                <div class="title text-center">
                                    <h3>@lang('Login On Your Account')</h3>
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                {{__($error)}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div><!-- /.title -->
                                <form action="{{ route('login') }}" method="post" class="contact-form">
                                    @csrf
                                    <div class="frm-grp">
                                        <input type="text" name="username"  placeholder="@lang('Enter Username')" />
                                    </div><!-- /.frm-grp -->
                                    <div class="frm-grp">
                                        <input type="password" name="password"  placeholder="@lang('Enter Your Password')" />
                                    </div><!-- /.frm-grp -->


                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-xl-12 col-lg-12">
                                                <div class="form-group mb-0 checkbox">
                                                    <div class="form-check pl-0">
                                                        <input class="form-check-input" type="checkbox"  name="remember" id="remember">
                                                        <label class="form-check-label" for="remember">
                                                            @lang('Keep me logged in')
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="frm-grp">
                                                <button type="submit">@lang('Sign In')</button>
                                            </div><!-- /.frm-grp -->
                                        </div>
                                        </div>
                                    <div class="form-result"></div><!-- /.form-result -->

                                </form>

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
                                <br>

                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ route('password.request') }}" class="forgetting-password text-right">@lang('Forgot Password?')</a>
                                    </div>
                                </div>
                            </div><!-- /.inner -->
                        </div><!-- /.form-content -->
                    </div><!-- /.col-md-5 -->
                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.get-in-touch -->


@endsection
@section('script')

@stop
