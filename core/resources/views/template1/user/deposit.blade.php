@extends(activeTemp().'layouts.master')
@section('content')
    <!-- page title begin-->
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
    <!-- page title end -->
    <!-- price begin-->
    <div class="price">
        <div class="container">
            @if (count($errors) > 0)
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p>{{__($error) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="row">

                <div class="col-xl-12 col-lg-12 wow pulse">

                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                            <div class="row">
                                @foreach($gates as $gate)
                                    <div class="col-xl-4 col-lg-4 col-md-6">
                                        <div class="single-price special">
                                            <div class="part-top">
                                                <h3>{{__($gate->name)}}</h3>
                                            </div>
                                            <div class="part-bottom">
                                                <ul>
                                                    <li class="list-group-item section-bg-1">
                                                        {{--                                                        <img src="{{asset('assets/images/gateway')}}/{{$gate->id}}.jpg" style="width:100%;"/>--}}
                                                        <img src="{{asset('assets/images/mobilemoney.jpg')}}"/>
                                                    </li>
                                                    <li class="list-group-item section-bg-1">
                                                        @lang('Charge'):
                                                        {{--                                                        <strong>{{__($general->currency_sym)}}{{__($gate->fixed_charge)}}</strong> +--}}

                                                        <strong>{{__($gate->percent_charge)}} %</strong>
                                                    </li>
                                                    <li class="list-group-item section-bg-1">
                                                        @lang('Limit'): <strong>{{__($general->currency_sym)}}{{__($gate->minamo)}}</strong>
                                                        - <strong>{{__($general->currency_sym)}}{{__($gate->maxamo)}}</strong>
                                                    </li>
                                                </ul>
                                                <a data-toggle="modal" style="width:100%;" data-name="{{__($gate->name)}}"
                                                   data-gate="{{$gate->id}}" class="depoButton" href="#depoModal">  @lang('Deposit Now')</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- price end -->

    <!-- Modal -->
    <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('deposit.data-insert')}}" method="POST">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="gateway" id="gateWay"/>
                        <h5> @lang('Deposit Amount') </h5>

                        <div class="input-group">
                            <input type="text" class="form-control input-lg" name="amount">
                            <div class="input-group-append">
                            <span class="input-group-text">
                                {{__($general->currency_sym)}}
                            </span>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn-success">@lang('Deposit Preview')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function () {

            $(document).on('click', '.depoButton', function () {
                $('#ModalLabel').text($(this).data('name'));
                $('#gateWay').val($(this).data('gate'));

            });
        });
    </script>

@endsection
