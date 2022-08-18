@extends(activeTemp().'layouts.frontend')
@section('style')
    <link rel="stylesheet" href="{{url('/')}}/assets/front/build/css/intlTelInput.css">
@stop

@section('content')

    <div class="page-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <h2 class="extra-margin">@lang('Sign Up')</h2>

                </div>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- register begin-->
    <div class="contact register">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-title text-center">
                        <h2>@lang('Sign up to Create New Account')</h2>

                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p>{{ __($error) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form class="contact-form" action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="row">
                            @if(isset($ref_user))
                                <div class="col-xl-12 col-lg-12">
                                    <div class="form-group">
                                        <label for="InputRef">@lang('Referred By')<span class="requred">*</span></label>
                                        <input type="text" style="background: #b6b9c1" class="form-control" id="InputRef"
                                               value="{{$ref_user->name}}" disabled readonly required>
                                    </div>
                                </div>
                                <input type="hidden" value="{{$ref_user->id}}" name="ref_id">
                            @else
                                <input type="hidden" value="0" name="ref_id">
                            @endif

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputFirstname">@lang('Full Name')<span class="requred">*</span></label>
                                    <input type="text" class="form-control" id="InputFirstname" name="name" value="{{old('name')}}"
                                           placeholder="@lang('Enter Your Name')"
                                           required>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputMail">@lang('E-mail')<span class="requred">*</span></label>
                                    <input type="email" class="form-control" id="InputMail" name="email" value="{{old('email')}}"
                                           placeholder="@lang('Enter Your E-mail')"
                                           required>
                                </div>
                            </div>

                            <input type="hidden" id="track" name="country_code">

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="phone">@lang('Mobile Number')<span class="requred">*</span></label>
                                    <input type="tel" class="form-control pranto-control" id="mobile" name="mobile" value="{{old('phone')}}"
                                           pattern=".{5,13}">
                                    {{--                                           required minlength="13" maxlength="13">--}}
                                </div>
                            </div>
                            <div class=" col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputMoe">@lang('Country')<span class="requred">*</span></label>
                                    <input type="text" class="form-control" id="country" name="country" required>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputUsername">@lang('User Name')<span class="requred">*</span></label>
                                    <input type="text" class="form-control" id="InputUsername" name="username"
                                           value="{{old('username')}}"
                                           placeholder="@lang('Enter Your Username')"
                                           required>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputPassword">@lang('Password')<span class="requred">*</span></label>
                                    <input type="password" class="form-control" id="InputPassword" name="password"
                                           placeholder="@lang('Enter Your Password')"
                                           required>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputRetypepassword">@lang('Re-type Password')<span class="requred">*</span></label>
                                    <input type="password" class="form-control" name="password_confirmation" id="InputRetypepassword"
                                           placeholder="@lang('Re-type Password')"
                                           required>
                                </div>
                            </div>


                            <div class="col-xl-6 col-lg-6">
                                <div class="form-group mb-0 checkbox">
                                    <div class="form-check pl-0">
                                        <input class="form-check-input" type="checkbox" required id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            @lang('I agree the terms & conditions')
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <button type="submit" class="submit-button btn-contact">@lang('Submit Now')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{url('/')}}/assets/front/build/js/intlTelInput.js"></script>
    <script>
        $("#mobile").on("countrychange", function (e, countryData) {

            var data = $(this).val('+' + countryData.dialCode);
            $('#track').val(data);
            var country = countryData.name;
            var country = country.split('(')[0];
            $('#country').val(country);
        });
        $("#mobile").intlTelInput({
            geoIpLookup: function (callback) {
                $.get("https://ipinfo.io", function () {
                }, "jsonp").always(function (resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },
            initialCountry: "auto",
            utilsScript: "{{url('/')}}/assets/front/build/js/utils.js"
        });
    </script>
@stop
