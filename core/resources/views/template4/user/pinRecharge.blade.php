@extends(activeTemp().'layouts.master')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/front/css/custom.css')}}">
@stop

@section('content')

        <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover; ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="breadcrump-title text-center">
                            <h2 class="add-space" style="font-size: 50px;">{{__($pt)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="login">
            <div class="container">
                <div class="row justify-content-center">


                    <div class="col-xl-12">
                        <div class="part-form">

                            <form action="{{route('pin.recharge.post')}}" method="post">
                                @csrf
                                <input id="code" value=""  pattern=".{35,35}" name="pin" maxlength="35" autocomplete="off" type="tel" Placeholder='@lang('ENTER PIN')' required >
                                <button type="submit">@lang('RECHARGE NOW')</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>


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



