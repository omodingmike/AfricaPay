@extends(activeTemp().'layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}">
@stop


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

        <section class="team-section sec-pad">
            <div class="thm-container">
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
                                    <button type="submit" class="btn btn-primary btn-block btn-lg">@lang('RECHARGE NOW')</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.thm-container -->
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



