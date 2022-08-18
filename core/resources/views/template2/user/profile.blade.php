@extends(activeTemp().'layouts.master')
@section('style')

@stop
@section('content')

        <section class="tools-section  pranto-tool">
            <div class="thm-container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="tools-content pranto-bread">
                            <h3>{{__($pt)}}</h3>

                        </div><!-- /.tools-content -->
                    </div><!-- /.col-md-6 -->

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section>

        <section class="get-in-touch">

            <div class="thm-container">
                <div class="row">
                    <div class="col-md=12">
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    {{__($error)}}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-md-6">
                        <div class="form-content">
                            <div class="inner">
                                <div class="title text-center">
                                    <h3>@lang('Profile Update')</h3>
                                </div><!-- /.title -->
                                <form action="{{route('user.profile.update')}}" enctype="multipart/form-data" method="post" class="contact-form">
                                    @csrf
                                    <div class="frm-grp">
                                        <input type="text" id="InputFirstname" placeholder="@lang('Enter Name')" value="{{Auth::user()->name}}"  name="name" required>
                                    </div><!-- /.frm-grp -->

                                    <div class="frm-grp">
                                        <input type="email"  id="InputMail" name="email" value="{{Auth::user()->email}}" placeholder="@lang('Enter Your E-mail')" required>
                                    </div>

                                    <div class="frm-grp">
                                        <input type="text"   name="mobile" value="{{Auth::user()->mobile}}" placeholder="@lang('Enter Mobile')"  required>
                                    </div>

                                    <div class="frm-grp">
                                        <input type="text"   name="country" value="{{Auth::user()->country}}" placeholder="@lang('Enter Country Name')" required>
                                    </div>




                                    <div class="frm-grp">
                                        <button type="submit">@lang('Update Profile')</button>
                                    </div><!-- /.frm-grp -->


                                    <div class="form-result"></div><!-- /.form-result -->

                                </form>
                            </div><!-- /.inner -->
                        </div><!-- /.form-content -->
                    </div><!-- /.col-md-5 -->


                    <div class="col-md-6">
                        <div class="form-content">
                            <div class="inner">
                                <div class="title text-center">
                                    <h3>@lang('Change Password')</h3>

                                </div><!-- /.title -->
                                <form action="{{route('change.password.user')}}" method="post" id="changePAss" class="contact-form">
                                    <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                    @csrf
                                    <div class="frm-grp">
                                        <input type="password"  id="InputFirstname" placeholder="@lang('Enter Your Old Password')"  name="passwordold" required>
                                    </div><!-- /.frm-grp -->
                                    <div class="frm-grp">
                                        <input type="password"  id="InputFirstname" placeholder="@lang('Enter New Password')" name="password" required>
                                    </div><!-- /.frm-grp -->
                                    <div class="frm-grp">
                                        <input type="password"  id="InputMail" name="password_confirmation" placeholder="@lang('Confirm Password')" required>
                                    </div><!-- /.frm-grp -->


                                        <div class="frm-grp">
                                            @if(Auth::user()->tauth == 1)
                                                <button style="width: 100%" data-toggle="modal" data-target="#openmodal" type="button" class="login-button btn-contact"> @lang('Change Password')</button>
                                            @else
                                                <button style="width: 100%" type="submit" class="login-button btn-contact"> @lang('Change Password')</button>
                                            @endif
                                        </div><!-- /.frm-grp -->


                                    <div class="form-result"></div><!-- /.form-result -->

                                </form>
                            </div><!-- /.inner -->
                        </div><!-- /.form-content -->
                    </div><!-- /.col-md-5 -->
                </div><!-- /.row -->
            </div><!-- /.thm-container -->
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

