@extends('admin.layout.master')
@section('css')
    <link href="{{url('/')}}/assets/admin/css/spectrum.css" rel="stylesheet">
@stop
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">{{$page_title}}</h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="{{route('general.store')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <h6>Website Title</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->sitename}}"
                                           name="sitename">
                                    <div class="input-group-append"><span class="input-group-text">
                                            <i class="fa fa-file-text-o"></i>
                                            </span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <h6>BASE COLOR CODE <small>(type with '#' before)</small></h6>

                                <div class="input-group pranto col-md-12">
                                            <span class="input-group-addon ">
                                                <input type='text' class="form-control" id="base_color" value="{{$general->color}}"/>
                                            </span>
                                    <input type="text" name="color"  class="form-control" id="base_color_value" value="#{{$general->color}}">
                                </div>

                            </div>

                            <div class="col-md-4">
                                <h6>SECONDARY COLOR CODE <small>(type with '#' before)</small></h6>
                                <div class="input-group pranto col-md-12">
                                            <span class="input-group-addon ">
                                                <input type='text' class="form-control" id="sec_color" value="{{$general->color_two}}"/>
                                            </span>
                                    <input type="text"  name="color_two"  class="form-control" id="sec_color_value" value="#{{$general->color_two}}">
                                </div>

                            </div>




                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <h6>Currency </h6>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->currency}}"
                                           name="currency">
                                    <div class="input-group-append"><span class="input-group-text">
                                        {{$general->currency}}
                                        </span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <h6>Currency Symbol</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->currency_sym}}"
                                           name="currency_sym">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                             {{$general->currency_sym}}
                                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <h6>User's Deposit Wallet Name</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->deposit_wallet_name}}" name="deposit_wallet_name">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <h6>User's Interest Wallet Name</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->interest_wallet_name}}" name="interest_wallet_name">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h6>YouTube Video URL</h6>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->video_url}}" name="video_url">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <hr/>
                            <div class="col-md-4">
                                <h6>Facebook Client ID<small>(Social Login)</small></h6>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->fb_client_id}}"
                                           name="fb_client_id">
                                    <small><a href="https://developers.facebook.com/" target="_blank">Configure Facebook</a></small>
                                </div>


                            </div>

                            <div class="col-md-4">
                                <h6>Facebook Client Secret<small>(Social Login)</small></h6>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->fb_client_secret}}"
                                           name="fb_client_secret">
                                </div>

                            </div>

                            <div class="col-md-4">
                                <h6>Facebook Redirect Url<small>(Social Login)</small></h6>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" value="{{url('/').'/login/facebook/callback'}}" readonly>

                                </div>

                            </div>
                        </div><br>

                        <div class="row">
                            <hr/>
                            <div class="col-md-4">
                                <h6>Google Client ID<small>(Social Login)</small></h6>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->google_client_id}}"
                                           name="google_client_id">
                                    <small><a href="https://console.developers.google.com/" target="_blank">Configure Google</a></small>
                                </div>


                            </div>

                            <div class="col-md-4">
                                <h6>Google Client Secret<small>(Social Login)</small></h6>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->google_client_secret}}"
                                           name="google_client_secret">
                                </div>

                            </div>

                            <div class="col-md-4">
                                <h6>Google Redirect Url<small>(Social Login)</small></h6>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" value="{{url('/').'/login/google/callback'}}" readonly>

                                </div>

                            </div>
                        </div><br>


                        <div class="row">
                            <hr/>

                            <div class="col-md-3">
                                <h6>EMAIL NOTIFICATION</h6>
                                <select class="form-control" name="email_notification">
                                    <option {{ $general->email_notification == "1" ? 'selected' : '' }} value="1">On</option>
                                    <option {{ $general->email_notification == "0" ? 'selected' : '' }} value="0">Off</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <h6>SMS NOTIFICATION</h6>
                                <select class="form-control" name="sms_notification">
                                    <option {{ $general->sms_notification == "1" ? 'selected' : '' }} value="1">On</option>
                                    <option {{ $general->sms_notification == "0" ? 'selected' : '' }} value="0">Off</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <h6>EMAIL VERIFICATION</h6>
                                <select class="form-control" name="emailver">
                                    <option {{ $general->emailver == "1" ? 'selected' : '' }} value="1">On</option>
                                    <option {{ $general->emailver == "0" ? 'selected' : '' }} value="0">Off</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <h6>SMS VERIFICATION</h6>
                                <select class="form-control" name="smsver">
                                    <option {{ $general->smsver == "1" ? 'selected' : '' }} value="1">On</option>
                                    <option {{ $general->smsver == "0" ? 'selected' : '' }} value="0">Off</option>
                                </select>
                            </div>

                            <div class="col-md-2">
                                <h6>SOCIAL LOGIN</h6>
                                <select class="form-control" name="social_login">
                                    <option {{ $general->social_login == "1" ? 'selected' : '' }} value="1">On</option>
                                    <option {{ $general->social_login == "0" ? 'selected' : '' }} value="0">Off</option>
                                </select>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <hr/>
                            <div class="col-md-12 ">
                                <button class="btn btn-primary btn-block btn-lg">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{url('/')}}/assets/admin/js/spectrum.js"></script>
    <script>
        $('#base_color').spectrum({
            color: $('#base_color').val(),
            change: function (color) {
                $('#base_color_value').val(color.toHexString());
            }
        });

        $('#sec_color').spectrum({
            rong: $('#sec_color').val(),
            change: function (rong) {
                $('#sec_color_value').val(rong.toHexString());
            }
        });
    </script>
@stop
