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
        <!-- plan begin-->
        <div class="plan">
            <div class="container">

                <div class="row">

                    @foreach($gates as $gate)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-plan active">
                            <h3>{{__($gate->name)}}</h3>
                            <div class="part-parcent">
                                <img src="{{asset('assets/images/gateway')}}/{{$gate->id}}.jpg" style="width:100%;"/>
                            </div>
                            <div class="part-feature">
                                <div class="single-plan-feature">
                                    <span class="large-text"> @lang('Charge'): <strong>{{__($general->currency_sym)}}{{__($gate->fixed_charge)}}</strong> + <strong>{{__($gate->percent_charge)}} %</strong></span>
                                </div>
                                <div class="single-plan-feature">
                                    <span class="large-text"> @lang('Limit'): <strong>{{__($general->currency_sym)}}{{__($gate->minamo)}}</strong> - <strong>{{__($general->currency_sym)}}{{__($gate->maxamo)}}</strong></span>
                                </div>
                            </div>
                            <div class="part-button">
                                <a data-toggle="modal" style="width:100%;"  data-name="{{__($gate->name)}}" data-gate="{{$gate->id}}" class="depoButton" href="#depoModal">  @lang('Deposit Now')</a>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
        <!-- plan end -->

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



