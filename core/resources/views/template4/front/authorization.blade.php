@extends(activeTemp().'layouts.frontend')

@section('content')

        <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover; ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="breadcrump-title text-center">
                            <h2 class="add-space">@lang('Authorization')</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="login">
            <div class="container">
                <div class="row justify-content-center">

                        @if (Auth::user()->status != '1')
                        <div class="col-md-12">
                            <div class="section-title text-center">
                                <h2 style="color: #ff3221">@lang('Your Account is Currently Deactive.')</h2>
                                <p>@lang('Contact Us or Make Support Ticket for solving your issue.')</p>
                            </div>
                        </div>

                    @elseif(Auth::user()->emailv != '1')

                        <div class="col-md-12 text-center" style="margin-bottom:30px">
                            <h1>@lang('Please Verify Your Email')</h1>
                        </div>

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


                            <div class="col-xl-6 col-lg-6" style="margin-bottom: 30px">
                                <div class="part-form">

                                    <form action="{{route('sendemailver')}}" method="post">
                                        @csrf
                                        <input type="text"  readonly value="{{Auth::user()->email}}" required>
                                        <button type="submit">@lang('Send Verification Code')</button>
                                    </form>

                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6">
                                <div class="part-form">
                                    <form action="{{route('emailverify')}}" method="post">
                                        @csrf
                                        <input type="text"  name="code" id="InputName"  placeholder="@lang('Enter Verification Code')"  required>
                                        <button type="submit">@lang('Verify')</button>
                                    </form>

                                </div>
                            </div>
                    @elseif(Auth::user()->smsv != '1')
                        <div class="col-md-12 text-center" style="margin-bottom:30px">
                            <h1>@lang('Please Verify Your Mobile')</h1>
                        </div>

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


                        <div class="col-xl-6 col-lg-6" style="margin-bottom: 30px">
                            <div class="part-form">
                                <form action="{{route('sendsmsver')}}" method="post">
                                    @csrf
                                    <input type="text"  readonly value="{{Auth::user()->mobile}}" required>
                                    <button type="submit">@lang('Send Verification Code')</button>
                                </form>

                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6">
                            <div class="part-form">
                                <form action="{{route('smsverify')}}" method="post">
                                    @csrf
                                    <input type="text"  name="code" id="InputName"  placeholder="@lang('Enter Verification Code')"  required>
                                    <button type="submit">@lang('Verify')</button>
                                </form>
                            </div>
                        </div>


                    @elseif(Auth::user()->tfver != '1')

                        <div class="col-xl-6 col-lg-6">
                            <div class="part-form">
                                <form action="{{route('go2fa.verify')}}" method="post">
                                    @csrf
                                    <input type="text"  name="code" id="InputName"  placeholder="@lang('Google Authenticator Code')"  required>
                                    <button type="submit">@lang('Verify')</button>
                                </form>
                            </div>
                        </div>

                    @endif



                </div>
            </div>
        </div>

@endsection

