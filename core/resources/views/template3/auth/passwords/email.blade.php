@extends(activeTemp().'layouts.frontend')
@section('content')
    <section class="page-content">
        <!--Start Page Heading-->
        <div class="page-heading page-heading-bg ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h1 class="title">@lang('Forgot Password')</h1>
                    </div>
                </div>
            </div>
        </div>
        <!--End Page Heading-->

        <!--Start Contact Area-->
        <div class="contact-wrap">
            <!--Start Container-->
            <div class="container">
                <!--Start Row-->
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <!--Start Contact Form-->
                        <div class="contact-form">
                            <!--Start Section Heading-->
                            @if (count($errors) > 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                {{__($error)}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        <!--End Section Heading-->
                            <form action="{{ route('forget.password.user') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="InputName" placeholder="@lang('E-mail')" required>
                                </div>

                                <div class="contact-frm-btn text-center">
                                    <button type="submit" class="cont-btn btn-block" style="width: 100%">@lang('Submit')</button>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <a href="{{ url('login') }}" class="forgetting-password">@lang('Back To Login')</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--End Contact Form-->
                    </div>
                </div>
                <!--End Row-->
            </div>
            <!--End Container-->
        </div>
        <!--End Contact Area-->
    </section>
@endsection
@section('script')
    <script>
        $('.form').find('input, textarea').on('keyup blur focus', function (e) {

            var $this = $(this),
                label = $this.prev('label');

            if (e.type === 'keyup') {
                if ($this.val() === '') {
                    label.removeClass('active highlight');
                } else {
                    label.addClass('active highlight');
                }
            } else if (e.type === 'blur') {
                if( $this.val() === '' ) {
                    label.removeClass('active highlight');
                } else {
                    label.removeClass('highlight');
                }
            } else if (e.type === 'focus') {

                if( $this.val() === '' ) {
                    label.removeClass('highlight');
                }
                else if( $this.val() !== '' ) {
                    label.addClass('highlight');
                }
            }

        });

    </script>
@stop
