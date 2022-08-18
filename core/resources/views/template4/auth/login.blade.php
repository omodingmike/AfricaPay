@extends(activeTemp().'layouts.frontend')
@section('content')

    <!-- breadcrump begin-->
    <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="breadcrump-title text-center">
                        <h2 class="add-space">@lang('Login')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrump end -->
    @if($general->social_login == 1)
    <!-- login-2 begin-->
    <div class="login">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="part-form">
                        <h3 class="login-title">@lang('Login On Your Account')</h3>
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
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <input type="text" name="username" id="InputName" placeholder="@lang('Enter Username')" required>
                            <input type="password" name="password" id="InputAmount" placeholder="@lang('Enter Your Password')" required>
                            <input type="checkbox" class="form-check-input" name="remember" id="remember">
                            <label class="form-check-label" for="remember"> @lang('Keep me logged in')</label>
                            <button type="submit">@lang('Sign In')</button>
                        </form>
                        <span class="forget-password">@lang('Forgot Password?')<a href="{{ route('password.request') }}">@lang('Reset Now')</a></span>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2">
                    <div class="line">
                        <div class="or">@lang('Or')</div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="login-with-social">
                        <h3 class="login-title">@lang('Login with social media')</h3>
                        <a class="facebook social-link" href="{{route('social.login', 'facebook')}}">@lang('Login With Facebook')</a>
                        <a class="google social-link" href="{{route('social.login', 'google')}}">@lang('Login With google+')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login-2 end -->
    @else

        <div class="login">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-5 col-lg-5">
                        <div class="part-form">
                            <h3 class="login-title">@lang('Login On Your Account')</h3>
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
                            </div>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <input type="text" name="username" id="InputName" placeholder="@lang('Enter Username')" required>
                                <input type="password" name="password" id="InputAmount" placeholder="@lang('Enter Your Password')" required>
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                <label class="form-check-label" for="remember"> @lang('Keep me logged in')</label>
                                <button type="submit">@lang('Sign In')</button>
                            </form>
                            <span class="forget-password">@lang('Forgot Password?')<a href="{{ route('password.request') }}">@lang('Reset Now')</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif


@endsection
@section('script')

@stop
