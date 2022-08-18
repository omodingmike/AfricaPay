@extends(activeTemp().'layouts.frontend')
@section('style')
    <link rel="stylesheet" href="{{url('/')}}/assets/front/build/css/intlTelInput.css">
@stop

@section('content')

        <section class="page-content">
            <!--Start Page Heading-->
            <div class="page-heading page-heading-bg ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="title">@lang('Sign Up')</h1>
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
                                    <h2 class="title">@lang('Sign up to Create New Account')</h2>
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
                                <form action="{{ route('register') }}" method="post" class="contact-form">
                                    @csrf
                                    @if(isset($ref_user))
                                        <div class="form-group">
                                            <input style="background: #b6b9c1" readonly type="text" class="form-control" value="{{$ref_user->name}}" />
                                        </div><!-- /.form-group -->
                                        <input type="hidden" value="{{$ref_user->id}}" name="ref_id">
                                    @else
                                        <input type="hidden" value="0" name="ref_id">
                                    @endif


                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="@lang('Enter Your Name')" required/>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email"  value="{{old('email')}}"  placeholder="@lang('Enter Your E-mail')" required/>
                                    </div><!-- /.form-group -->

                                    <input type="hidden" id="track" name="country_code" >

                                    <div class="form-group">
                                        <input type="tel" class="form-control" style="width: 100%" name="mobile" id="mobile" value="{{old('phone')}}" required/>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="country" name="country"  required/>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="@lang('Enter Your Username')" required/>
                                    </div><!-- /.form-group -->

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="@lang('Enter Your Password')" required/>
                                    </div><!-- /.form-group -->



                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password_confirmation" id="InputRetypepassword" placeholder="@lang('Re-type Password')"  required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="contact-frm-btn text-center">
                                                <button type="submit" class="cont-btn btn-block" style="width: 100%">@lang('Submit Now')</button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <a href="{{ route('login') }}">@lang('Already Have An Account?')</a>
                                        </div>
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
