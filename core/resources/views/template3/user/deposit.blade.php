@extends(activeTemp().'layouts.master')

@section('content')


        <section class="page-content">
            <div class="page-heading page-heading-bg pranto-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="title pranto-title">{{__($pt)}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            @include(activeTemp().'layouts.balance_show')
        </section>

        <section class="latest-news-are pranto-section-bottom">
            <div class="container">
                <div class="row">

                @foreach($gates as $gate)

                    <!--Start Blog Post-->
                        <div class="col-md-4 col-sm-6" style="margin-top: 60px;">
                            <!--Start div-->
                            <div class="blog-post latest single-blog-post home-two">
                                <div class="content">
                                    <div class="post-meta text-center">
                                        <h2 class="post-title">{{__($gate->name)}}</h2>
                                    </div>
                                    <div class="post-content text-center">
                                        <ul>
                                            <li class="list-group-item section-bg-1">
                                                <img src="{{asset('assets/images/gateway')}}/{{$gate->id}}.jpg" style="width:100%;"/>
                                            </li>
                                            <li class="list-group-item section-bg-1">
                                                @lang('Charge'): <strong>{{__($general->currency_sym)}}{{__($gate->fixed_charge)}}</strong> + <strong>{{__($gate->percent_charge)}} %</strong>
                                            </li>
                                            <li class="list-group-item section-bg-1">
                                                @lang('Limit'): <strong>{{__($general->currency_sym)}}{{__($gate->minamo)}}</strong> - <strong>{{__($general->currency_sym)}}{{__($gate->maxamo)}}</strong>
                                            </li>
                                        </ul>
                                        <br>

                                        <div class="contact-frm-btn text-center">
                                            <a data-toggle="modal" style="width:100%;"  data-name="{{__($gate->name)}}" data-gate="{{$gate->id}}" class="depoButton" href="#depoModal">  @lang('Deposit Now')</a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!--End div-->
                        </div>
                        <!--End Blog Post-->
                    @endforeach
                </div>
            </div>
        </section>

        <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h3 class="modal-title" id="ModalLabel"></h3>
                    </div>
                    <form action="{{route('deposit.data-insert')}}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="gateway" id="gateWay"/>
                            <h5> @lang('Deposit Amount') </h5>

                            <div class="input-group">
                                <input type="text" class="form-control input-lg" name="amount">
                                <div class="input-group-addon">
                            <span class="input-group-text">
                                {{__($general->currency_sym)}}
                            </span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn-primary">@lang('Deposit Preview')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
@section('script')
<script>
    $(document).ready(function(){
        
        $(document).on('click','.depoButton', function(){
            $('#ModalLabel').text($(this).data('name'));
            $('#gateWay').val($(this).data('gate'));

        });
    });
</script>

@endsection



