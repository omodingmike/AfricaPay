@extends(activeTemp().'layouts.frontend')

@section('content')

    <!-- page title begin-->
    <div class="page-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <h2 class="extra-margin">@lang('Login')</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- login begin-->
    <div class="contact login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="section-title text-center">
                        <h2>@lang('Login On Your Account')</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">


                <div class="col-xl-6 col-lg-6">
                    {{--                    <form class="contact-form" action="{{ route('login') }}" method="post">--}}
                    <form class="contact-form" action="{{ route('user.login') }}" method="post">
                        @csrf
                        <div class="row">
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

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputName">@lang('Username')<span class="requred">*</span></label>
                                    <input type="text" class="form-control" name="username" id="InputName"
                                           placeholder="@lang('Enter Username')" required>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputAmount">@lang('Password')<span class="requred">*</span></label>
                                    <input type="password" class="form-control" name="password" id="InputAmount"
                                           placeholder="@lang('Enter Your Password')" required>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">

                                <div class="form-group mb-0 checkbox">

                                    <div class="form-check pl-0">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">
                                            @lang('Keep me logged in')
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="row d-flex">
                                    <div class="col-xl-6 col-lg-6">
                                        <button type="submit" class="login-button btn-contact"> @lang('Sign In')</button>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 d-flex align-items-center">
                                        <a href="{{ route('password.request') }}" class="forgetting-password">@lang('Forgot Password?')</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($general->social_login == 1)
                            <br>
                            <div class="row">

                                <div class="col-md-6" style="margin-top: 20px">
                                    <a href="{{route('social.login', 'facebook')}}" class="btn btn-success btn-block"
                                       style="background:#4267b2; border: #4267b2;padding: 12px 0px 12px;">@lang('Join With') <i
                                                class="fa fa-facebook"></i> </a>
                                </div>

                                <div class="col-md-6" style="margin-top: 20px">
                                    <a href="{{route('social.login', 'google')}}" class="btn btn-danger btn-block"
                                       style="padding: 12px 0px 12px;">@lang('Join With') <i class="fa fa-google"></i></a>
                                </div>

                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

@stop
