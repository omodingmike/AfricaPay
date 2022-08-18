@extends(activeTemp().'layouts.master')

@section('content')

        <section class="page-content">
            <!--Start Page Heading-->
            <div class="page-heading page-heading-bg ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="title">{{__($pt)}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Page Heading-->

            <!--Start Contact Area-->
            <div class="contact-wrap">
                <!--Start Container-->
                <div class="container">
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
                    <!--Start Row-->
                    <div class="row">
                        <div class="col-md-6 pranto-border" style="margin-bottom: 20px;">
                            <!--Start Contact Form-->
                            <div class="contact-form">

                                <div class="section-heading text-center">
                                    <h2 class="title">@lang('Profile Update')</h2>
                                </div>
                                <!--Start Section Heading-->

                            <!--End Section Heading-->
                                <form action="{{route('user.profile.update')}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="row">


                                        <div class="col-xl-12 col-lg-12 ">
                                            <div class="form-group">
                                                <label for="InputFirstname">@lang('Full Name')<span class="requred">*</span></label>
                                                <input type="text" class="form-control" id="InputFirstname" placeholder="@lang('Enter Name')" value="{{Auth::user()->name}}"  name="name" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="InputMail">@lang('E-mail')<span class="requred">*</span></label>
                                                <input type="email" class="form-control" id="InputMail" name="email" value="{{Auth::user()->email}}" placeholder="@lang('Enter Your E-mail')"
                                                       required>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="InputUsername">@lang('Enter Mobile')<span class="requred">*</span></label>
                                                <input type="text" class="form-control"  name="mobile" value="{{Auth::user()->mobile}}" placeholder="@lang('Enter Mobile')"
                                                       required>
                                            </div>
                                        </div>


                                        <div class="col-xl-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="InputUsername">@lang('Country Name')<span class="requred">*</span></label>
                                                <input type="text" class="form-control"  name="country" value="{{Auth::user()->country}}" placeholder="@lang('Enter Country Name')"
                                                       required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="contact-frm-btn text-center">
                                        <button type="submit" class="cont-btn btn-block" style="width: 100%">@lang('Update Profile')</button>
                                    </div>

                                </form>
                            </div>
                            <!--End Contact Form-->
                        </div>


                        <div class="col-md-5 pranto-border">
                            <!--Start Contact Form-->
                            <div class="contact-form">

                                <div class="section-heading text-center">
                                    <h2 class="title">@lang('Change Password')</h2>
                                </div>
                                <!--Start Section Heading-->

                            <!--End Section Heading-->
                                <form id="changePAss"  action="{{route('change.password.user')}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                    <div class="row">



                                        <div class="col-xl-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="oldpass">@lang('Old Password')<span class="requred">*</span></label>
                                                <input type="password" class="form-control" id="oldpass" placeholder="@lang('Enter Your Old Password')"  name="passwordold" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="newPass">@lang('New Password')<span class="requred">*</span></label>
                                                <input type="password" class="form-control" id="newPass" placeholder="@lang('Enter New Password')" name="password" required>
                                            </div>
                                        </div>

                                        <div class="col-xl-12 col-lg-12">
                                            <div class="form-group">
                                                <label for="repas">@lang('Confirm Password')<span class="requred">*</span></label>
                                                <input type="password" class="form-control" id="repas" name="password_confirmation" placeholder="@lang('Confirm Password')" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="contact-frm-btn text-center">
                                        @if(Auth::user()->tauth == 1)
                                            <button style="width: 100%" data-toggle="modal" data-target="#openmodal" type="button" class="login-button btn-contact"> @lang('Change Password')</button>
                                        @else
                                            <button style="width: 100%" type="submit" class="login-button btn-contact"> @lang('Change Password')</button>
                                        @endif
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

        <div id="openmodal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('Google Authenticator Code Verify')</h4>
                    </div>
                    <form action="#" method="POST" class="tauthSubmit">
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="text"  name="code" class="form-control" placeholder="Enter Google Authenticator Code">
                                <small style="color: red; text-align: center" class="errors"></small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn-success">@lang('Verify')</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>



@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.tauthSubmit').on('submit',function(e){
            e.preventDefault();
            var code = $('input[name=code]').val();
            $.post('{{route('check_two_facetor')}}', {code:code}, function(response) {
                if(response.errors){
                    $('.errors').text(response.errors.code[0]);
                }
                if (response.success == true){
                    $("#changePAss").submit();
                }else if(response.message) {
                    swal(response.message,"", "warning");
                }
            })
        });
    </script>
@stop
