@extends(activeTemp().'layouts.frontend')

@section('content')

    <!-- breadcrump begin-->
    <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="breadcrump-title text-center">
                        <h2 class="add-space">@lang('Contact')</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrump end -->

    <!-- contact begin-->
    <div class="contact">
        <div class="part-address">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-adress">
                            <div class="part-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="part-text">
                                <h3>@lang('Email Address')</h3>
                                <ul>
                                    <li><a href="mailto:{{$general->email}}">{{$general->email}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-adress">
                            <div class="part-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="part-text">
                                <h3>@lang('Phone Number')</h3>
                                <ul>
                                    <li>  <a href="tel:{{$general->phone}}">{{__($general->phone)}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-adress">
                            <div class="part-icon">
                                <i class="fa fa-map"></i>
                            </div>
                            <div class="part-text">
                                <h3>@lang('Our Address')</h3>
                                <ul>
                                    <li>{{__($general->address)}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="get-in-touch">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title">
                            <h2>@lang('Contact Us For Support')</h2>
                        </div>
                    </div>
                </div>

                @if (count($errors) > 0)
                    <div class="row">
                        <div class="col-md-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <p>{{__($error)}} </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="part-form">
                            <form action="{{route('send.mail.contact')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" name="name" placeholder="@lang('Enter Your Name')">
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="email" name="email" id="InputMail" placeholder="@lang('Enter Your E-mail Address')">
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <textarea name="message" rows="3" placeholder="@lang('Enter Your Message')"></textarea>
                                    </div>

                                    <div class="col-xl-12 col-lg-12">
                                        <button type="submit">@lang('Send Now')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact end -->

@stop
