@extends(activeTemp().'layouts.frontend')
@section('style')
    <link rel="stylesheet" href="{{url('/')}}/assets/front/build/css/intlTelInput.css">
@stop

@section('content')

    <section class="tools-section pranto-tool">
        <div class="thm-container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="tools-content pranto-bread">
                        <h3>@lang('Sign Up')</h3>

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
                                <h3>@lang('Sign up to Create New Account')</h3>
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                                            {{__($error)}}
                                        </div>
                                    @endforeach
                                @endif
                            </div><!-- /.title -->
                            <form action="{{ route('register') }}" method="post" class="contact-form">
                                @csrf
                                @if(isset($ref_user))
                                <div class="frm-grp">
                                    <input style="background: #b6b9c1" type="text" value="{{$ref_user->name}}" />
                                </div><!-- /.frm-grp -->
                                    <input type="hidden" value="{{$ref_user->id}}" name="ref_id">
                                @else
                                    <input type="hidden" value="0" name="ref_id">
                                @endif


                                <div class="frm-grp">
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="@lang('Enter Your Name')" required/>
                                </div><!-- /.frm-grp -->

                                <div class="frm-grp">
                                    <input type="email"  name="email"  value="{{old('email')}}"  placeholder="@lang('Enter Your E-mail')" required/>
                                </div><!-- /.frm-grp -->

                                <input type="hidden" id="track" name="country_code" >

                                <div class="frm-grp">
                                    <input type="tel"  name="mobile" id="mobile" value="{{old('phone')}}" required/>
                                </div><!-- /.frm-grp -->

                                <div class="frm-grp">
                                    <input type="text" id="country" name="country"  required/>
                                </div><!-- /.frm-grp -->

                                <div class="frm-grp">
                                    <input type="text" name="username" value="{{old('username')}}" placeholder="@lang('Enter Your Username')" required/>
                                </div><!-- /.frm-grp -->

                                <div class="frm-grp">
                                    <input type="password"  name="password" placeholder="@lang('Enter Your Password')" required/>
                                </div><!-- /.frm-grp -->

                                <div class="frm-grp">
                                    <input type="password" name="password_confirmation" id="InputRetypepassword" placeholder="@lang('Re-type Password')" required/>
                                </div><!-- /.frm-grp -->


                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-xl-12 col-lg-12">
                                            <div class="form-group mb-0 checkbox">
                                                <div class="form-check pl-0">
                                                    <input class="form-check-input" type="checkbox" required id="gridCheck1">
                                                    <label class="form-check-label" for="remember">
                                                        @lang('I agree the terms & conditions')
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="frm-grp">
                                            <button type="submit">@lang('Submit Now')</button>
                                        </div><!-- /.frm-grp -->
                                    </div>
                                </div>
                                <div class="form-result"></div><!-- /.form-result -->

                            </form>

                            <br>

                            <div class="row">

                                <div class="col-md-12 text-right">
                                    <a href="{{ route('login') }}" class="forgetting-password text-right">@lang('Already Have An Account?')</a>
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
