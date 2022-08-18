@extends(activeTemp().'layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}">
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
        </section><br><br>

        <section class="latest-news-are pranto-section-bottom">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center">
                                <h3>@lang('Put Your Pin')</h3>
                            </div>

                            <form action="{{route('pin.recharge.post')}}" method="post">
                                @csrf
                                <div class="panel-body text-center">
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                {{__($error)}}
                                            </div>
                                        @endforeach
                                    @endif
                                    <input class="form-control input-lg" id="code" value=""  pattern=".{35,35}" name="pin" maxlength="35" autocomplete="off" type="tel" Placeholder='@lang('ENTER PIN')' required />
                                </div>
                                <div class="panel-footer">
                                    <div class="contact-frm-btn text-center">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg" style="width: 100%;line-height:0;">@lang('RECHARGE NOW')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
@section('script')
    <script>
        $('#code').on('keypress change', function () {

            var xx = document.getElementById('code').value;
            if (xx.length < 32) {

                $(this).val(function (index, value) {
                    return value.replace(/\W/gi, '').replace(/(.{8})/g, '$1-');

                });
            }
        });



    </script>

@endsection



