@extends(activeTemp().'layouts.master')

@section('content')

        <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8 text-center">
                        <div class="breadcrump-title text-center">
                            <h2 class="add-space text-center">{{__($pt)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="login">
            <div class="container">
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


                    <div class="col-xl-6" style="margin-bottom:20px ">
                        <div class="part-form">
                            <h3 class="login-title">@lang('Profile Update')</h3>

                            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="text"  id="InputFirstname" placeholder="@lang('Enter Name')" value="{{Auth::user()->name}}"  name="name" required>
                                <input type="email"  id="InputMail" name="email" value="{{Auth::user()->email}}" placeholder="@lang('Enter Your E-mail')" required>
                                <input type="text"   name="mobile" value="{{Auth::user()->mobile}}" placeholder="@lang('Enter Mobile')" required>
                                <input type="text"   name="country" value="{{Auth::user()->country}}" placeholder="@lang('Enter Country Name')" required>
                                <button type="submit">@lang('Update Profile')</button>
                            </form>
                        </div>
                    </div>


                    <div class="col-xl-6">
                        <div class="part-form">
                            <h3 class="login-title">@lang('Change Password')</h3>

                            <form action="{{route('change.password.user')}}" id="changePAss" method="post">
                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                @csrf
                                <input type="password"  id="InputFirstname" placeholder="@lang('Enter Your Old Password')"  name="passwordold" required>
                                <input type="password"  id="InputFirstname" placeholder="@lang('Enter New Password')" name="password" required>
                                <input type="password"  id="InputMail" name="password_confirmation" placeholder="@lang('Confirm Password')" required>

                                @if(Auth::user()->tauth == 1)
                                    <button  data-toggle="modal" data-target="#openmodal" type="button" class="login-button btn-contact"> @lang('Change Password')</button>
                                @else
                                    <button type="submit" class="login-button btn-contact"> @lang('Change Password')</button>
                                @endif
                            </form>
                        </div>
                    </div>
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
