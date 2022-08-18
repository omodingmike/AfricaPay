@extends(activeTemp().'layouts.frontend')
@section('style')
    <link rel="stylesheet" href="{{url('/')}}/assets/front/build/css/intlTelInput.css">
@stop

@section('content')



    <!-- breadcrump begin-->
    <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="breadcrump-title text-center">
                        <h2 class="add-space">@lang('Sign Up')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrump end -->

    <!-- register-1 begin-->
    <div class="login register">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-5 col-lg-5">
                    <div class="part-form">
                        <h3 class="login-title">@lang('Sign up to Create New Account')</h3>
                        <div class="col-md-12">
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <p>{{ __($error) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <form action="{{ route('register') }}" method="post">
                            @if(isset($ref_user))
                            <input class="pranto-input" type="text" style="background: #b6b9c1" id="InputRef" value="{{$ref_user->name}}" disabled readonly required>
                            <input type="hidden" value="{{$ref_user->id}}" name="ref_id">
                            @else
                                <input type="hidden" value="0" name="ref_id">
                            @endif
                            <input class="pranto-input" type="text" name="name" value="{{old('name')}}" placeholder="@lang('Enter Your Name')" required>
                            <input class="pranto-input" type="email" id="InputMail"  name="email"  value="{{old('email')}}"  placeholder="@lang('Enter Your E-mail')" required>
                            <input type="hidden" id="track" name="country_code" >

                            <input class="pranto-input" type="tel" id="mobile"  name="mobile"  value="{{old('phone')}}"  required>

                            <input class="pranto-input" type="text" id="country" name="country" required>

                            <input class="pranto-input" type="password" name="username" value="{{old('username')}}" placeholder="@lang('Enter Your Username')" required>
                            <input class="pranto-input" type="password" name="password" placeholder="@lang('Enter Your Password')" required>
                            <input class="pranto-input" type="password" name="password_confirmation" id="InputRetypepassword" placeholder="@lang('Re-type Password')" required>

                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">@lang('I agree the terms & conditions')</label>

                            <button type="submit">@lang('Submit Now')</button>
                        </form>
                        <span class="forget-password">@lang('Already Have an Account?') <a href="{{ route('login') }}">@lang('Login Now')</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- register-1 end -->

@endsection
@section('script')
    <script src="{{url('/')}}/assets/front/build/js/intlTelInput.js"></script>
    <script>
        $("#mobile").on("countrychange", function(e, countryData) {

            var data =  $(this).val('+' + countryData.dialCode);
            $('#track').val(data);
            var country = countryData.name;
            var country = country.split('(')[0];
            $('#country').val(country);
        });
        $("#mobile").intlTelInput({
            geoIpLookup: function(callback) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            initialCountry: "auto",
            utilsScript: "{{url('/')}}/assets/front/build/js/utils.js"
        });
    </script>
@stop
