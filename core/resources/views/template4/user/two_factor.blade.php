@extends(activeTemp().'layouts.master')

@section('content')

        <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="breadcrump-title text-center">
                            <h2 class="add-space">{{__($pt)}}</h2>
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
                        @if(Auth::user()->tauth == '1')
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="panel-title text-center">@lang('Two Factor Authenticator')</h4>
                                </div>
                                <div class="card-body text-center">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" value="{{$prevcode}}" class="form-control input-lg" id="code" readonly>
                                            <span class="input-group-addon btn btn-success" id="copybtn">@lang('Copy')</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <img src="{{$prevqr}}">
                                    </div>
                                    <button type="button" class="btn btn-block btn-lg btn-danger" data-toggle="modal" data-target="#disableModal">@lang('Disable Two Factor Authenticator')</button>
                                </div>
                            </div>
                        @else
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="panel-title text-center">@lang('Two Factor Authenticator')</h4>
                                </div>
                                <div class="card-body text-center">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="key" value="{{$secret}}" class="form-control input-lg" id="code" readonly>
                                            <span class="input-group-addon btn btn-success" id="copybtn">@lang('Copy')</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <img src="{{$qrCodeUrl}}">
                                    </div>
                                    <button type="button" class="btn btn-block btn-lg btn-primary small-font-size-in-mobile-device" data-toggle="modal" data-target="#enableModal">@lang('Enable Two Factor Authenticator')</button>
                                </div>
                            </div>
                        @endif
                    </div>


                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="panel-title">@lang('Google Authenticator')</h4>
                            </div>
                            <div class="card-body text-justify">
                                <h5 style="text-transform: capitalize;">@lang('Use Google Authenticator to Scan the QR code  or use the code')</h5><hr/>
                                <p>{{__('Google Authenticator is a multifactor app for mobile devices. It generates timed codes used during the 2-step verification process. To use Google Authenticator, install the Google Authenticator application on your mobile device.')}}</p>
                                <a class="btn btn-primary btn-md" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en" target="_blank">@lang('DOWNLOAD APP')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Enable Modal -->
        <div id="enableModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('Verify Your OTP')</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <form action="{{route('go2fa.create')}}" method="POST">
                        {{csrf_field()}}
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="hidden" name="key" value="{{$secret}}">
                                <input type="text" class="form-control" name="code" placeholder="@lang('Enter Google Authenticator Code')">
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

        <!--Disable Modal -->
        <div id="disableModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">@lang('Verify Your OTP to Disable')</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form action="{{route('disable.2fa')}}" method="POST">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" name="code" placeholder="@lang('Enter Google Authenticator Code')">
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
    <script type="text/javascript">
        document.getElementById("copybtn").onclick = function()
        {
            document.getElementById('code').select();
            document.execCommand('copy');
        }
    </script>
@stop
