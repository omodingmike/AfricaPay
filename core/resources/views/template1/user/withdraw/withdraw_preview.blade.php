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

    <!-- login begin-->
    <div class="contact login" id="app">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <form class="contact-form" id="balanceWithdraw" action="{{route('confirm.withdraw.store', $with_method->id)}}"
                          method="post">
                        @csrf
                        <div class="row">
                            @php
                                $one = $amount + $with_method->chargefx;
                                $two = ($amount * $with_method->chargepc)/100;
                               $charge = $with_method->chargefx + ( $amount *  $with_method->chargepc )/100
                            @endphp

                            <div class="col-md-12 text-center">
                                <input type="hidden" name="amount" value="{{$amount}}">
                                <ul>
                                    <li class="list-group-item">@lang('Request for Withdraw Amount'):
                                        <strong>{{$amount}}</strong> {{__($general->currency)}}</li>
                                    <li class="list-group-item" style="color: red">@lang('Charge') :
                                        <strong>{{$charge}}</strong> {{__($general->currency)}}</li>
                                    <li class="list-group-item">@lang('Total Withdraw Amount'):
                                        <strong>{{$to = $amount - $charge}}</strong> {{__($general->currency)}}</li>
                                    <li class="list-group-item" style="color: firebrick">@lang('In') {{__($with_method->currency)}}:
                                        <strong>{{round($to / $with_method->rate, 4)}}</strong> {{__($with_method->currency)}}</li>
                                </ul>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="row d-flex">
                                    <div class="col-xl-12 col-lg-12">
                                        @if(Auth::user()->tauth == 1)
                                            <button style="width: 100%" data-toggle="modal" data-target="#openmodal" type="button"
                                                    class="login-button btn-contact"> @lang('Confirm Withdraw')</button>
                                        @else
                                            <button style="width: 100%" type="submit"
                                                    class="login-button btn-contact"> @lang('Confirm Withdraw') </button>
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
                        <div class="modal-body">

                            <div class="form-group">
                                <input type="text" class="form-control" name="code" placeholder="@lang('Enter Google Authenticator Code')">
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
        $('.tauthSubmit').on('submit', function (e) {
            e.preventDefault();
            var code = $('input[name=code]').val();
            $.post('{{route('check_two_facetor')}}', {code: code}, function (response) {
                if (response.errors) {
                    $('.errors').text(response.errors.code[0]);
                }
                if (response.success == true) {
                    $("#balanceWithdraw").submit();
                } else if (response.message) {
                    swal(response.message, "", "warning");
                }
            })
        });
    </script>
@stop
