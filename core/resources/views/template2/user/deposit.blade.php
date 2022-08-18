@extends(activeTemp().'layouts.master')

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
        @include(activeTemp().'layouts.balance_show')

        <section class="pricing-section sec-pad" id="plan">
            <div class="thm-container">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            {{__($error)}}
                        </div>
                    @endforeach
                @endif

                <div class="tab-content">
                    <div class="tab-pane fade in active" >
                        <div class="row">
                            @foreach($gates as $gate)
                                <div class="col-md-4 col-sm-6 col-xs-12" style="margin-top: 20px;">
                                    <div class="single-pricing hvr-bounce-to-bottom">
                                        <div class="title">
                                            <h3>{{__($gate->name)}}</h3>
                                        </div><!-- /.title -->

                                        <div class="info">
                                            <ul class="list-group">
                                                <li class="list-group-item ">
                                                    <img src="{{asset('assets/images/gateway')}}/{{$gate->id}}.jpg" style="width:100%;"/>
                                                </li><br><br>
                                                <p>@lang('Charge'): <strong>{{__($general->currency_sym)}}{{__($gate->fixed_charge)}}</strong> + <strong>{{__($gate->percent_charge)}} %</strong></p>
                                                <p>@lang('Limit'): <strong>{{__($general->currency_sym)}}{{__($gate->minamo)}}</strong> - <strong>{{__($general->currency_sym)}}{{__($gate->maxamo)}}</strong></p>
                                            </ul>
                                        </div><!-- /.info -->
                                        <div class="btn-box">
                                            <a data-toggle="modal" style="width:100%;" class="sign-up depoButton" data-name="{{__($gate->name)}}" data-gate="{{$gate->id}}" href="#depoModal">  @lang('Deposit Now')</a>
                                        </div><!-- /.btn-box -->
                                    </div><!-- /.single-pricing -->
                                </div><!-- /.col-md-4 -->
                            @endforeach
                        </div><!-- /.row -->
                    </div>

                </div><!-- /.tab-content -->
            </div><!-- /.thm-container -->
        </section><!-- /.pricing-section -->

        <!-- Modal -->
        <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header">
                        <h3 class="modal-title" id="ModalLabel"></h3>
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



