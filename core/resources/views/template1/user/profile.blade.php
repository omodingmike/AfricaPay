@extends(activeTemp().'layouts.master')

@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <h2 class="extra-margin">{{__($pt)}}</h2>
                </div>
            </div>
        </div>
    </div>

    @include(activeTemp().'layouts.balance_show')

    <div class="contact register" id="app">
        <div class="container">


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
                <div class="col-xl-6 col-lg-12" style="margin-bottom:20px ">

                    <form class="contact-form" method="POST" action="{{route('user.profile.update')}}" enctype="multipart/form-data">

                        @csrf
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>@lang('Profile Update')</h2>
                                <br>
                            </div>


                            <div class="col-xl-12 col-lg-12 ">
                                <div class="form-group">
                                    <label for="InputFirstname">@lang('Full Name')<span class="requred">*</span></label>
                                    <input type="text" id="InputFirstname" class="form-control" placeholder="@lang('Enter Name')" value="{{Auth::user()->name}}"  name="name" required>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputMail">@lang('E-mail')<span class="requred">*</span></label>
                                    <input type="email"  id="InputMail" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="@lang('Enter Your E-mail')"
                                           required>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputUsername">@lang('Enter Mobile')<span class="requred">*</span></label>
                                    <input type="text" name="mobile" class="form-control" value="{{Auth::user()->mobile}}" placeholder="@lang('Enter Mobile')"
                                           required>
                                </div>
                            </div>


                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputUsername">@lang('Country Name')<span class="requred">*</span></label>
                                    <input type="text"   name="country" class="form-control" value="{{Auth::user()->country}}" placeholder="@lang('Enter Country Name')"
                                           required>
                                </div>
                            </div>



                            <div class="col-xl-12 col-lg-12">
                                <div class="row d-flex">
                                    <div class="col-md-6 offset-md-3">
                                        <button type="submit" style="width: 100%;" class="login-button btn-contact"> @lang('Update Profile')</button>
                                    </div>

                                </div>
                            </div>


                        </div>
                    </form>

                </div>

                <div class="col-xl-6 col-lg-12" >




                    <form class="contact-form" id="changePAss" method="POST" action="{{route('change.password.user')}}" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{Auth::user()->id}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>@lang('Change Password')</h2>
                                <br>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputFirstname">@lang('Old Password')<span class="requred">*</span></label>
                                    <input type="password"  id="InputFirstname" class="form-control" placeholder="@lang('Enter Your Old Password')"  name="passwordold" required>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputFirstname">@lang('New Password')<span class="requred">*</span></label>
                                    <input type="password"  id="InputFirstname" class="form-control" placeholder="@lang('Enter New Password')" name="password" required>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputMail">@lang('Confirm Password')<span class="requred">*</span></label>
                                    <input type="password"  id="InputMail" class="form-control" name="password_confirmation" placeholder="@lang('Confirm Password')" required>
                                </div>
                            </div>



                            <div class="col-xl-12 col-lg-12">
                                <div class="row d-flex">
                                    <div class="col-md-6 offset-md-3">
                                        @if(Auth::user()->tauth == 1)
                                            <button style="width: 100%" data-toggle="modal" data-target="#openmodal" type="button" class="login-button btn-contact"> @lang('Change Password')</button>
                                        @else
                                            <button style="width: 100%" type="submit" class="login-button btn-contact"> @lang('Change Password')</button>
                                        @endif
                                    </div>

                                </div>
                            </div>


                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div id="openmodal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('Google Authenticator Code Verify')</h4>
                    </div>
                    <form action="#" method="POST" class="tauthSubmit">
                        {{csrf_field()}}
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="text" name="code" class="form-control" placeholder="Enter Google Authenticator Code">
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
