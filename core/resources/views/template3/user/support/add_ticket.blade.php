@extends(activeTemp().'layouts.master')
@section('style')

@stop
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

        <section class="transaction-performance-section pranto-section-bottom" style="padding-top: 50px">
            <div class="thm-container container">
                <div class="row">
                    <div class="col-md-12 pranto-border" style="margin-bottom: 20px;">
                        <!--Start Contact Form-->
                        <div class="contact-form">

                            <div class="section-heading text-center">
                                <h2 class="title">@lang('Create A Ticket')</h2>
                            </div>
                            <!--Start Section Heading-->

                            <!--End Section Heading-->
                            <form action="{{route('ticket.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" value="{{ old('subject') }}" name="subject"  placeholder="@lang('Subject Name')*" required>
                                </div><!-- /.frm-grp -->
                                <div class="form-group">
                                    <textarea name="detail" class="form-control" rows="10" required placeholder="@lang('Message...')"></textarea>
                                </div><!-- /.frm-grp -->

                                <div class="contact-frm-btn text-center">
                                    <button type="submit" class="cont-btn btn-block" style="width: 100%">@lang('Submit')</button>
                                </div>

                            </form>
                        </div>
                        <!--End Contact Form-->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section>


@endsection
@section('script')

@stop
