@extends(activeTemp().'layouts.frontend')


@section('content')

    <section class="tools-section pranto-tool">
        <div class="thm-container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="tools-content pranto-bread">
                        <h3>@lang('Forgot Password')</h3>

                    </div><!-- /.tools-content -->
                </div><!-- /.col-md-6 -->

            </div><!-- /.row -->
        </div><!-- /.thm-container -->
    </section><!-- /.tools-section -->

    <section class="get-in-touch" id="contact">

        <div class="thm-container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-content">
                        <div class="inner">
                            <div class="title text-center">
                                <h3>@lang('Recover Your Account')</h3>
                                @if (count($errors) > 0)
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                                            {{__($error)}}
                                        </div>
                                    @endforeach
                                @endif
                            </div><!-- /.title -->
                            <form action="{{ route('forget.password.user') }}" method="post" class="contact-form">
                                @csrf
                                <div class="frm-grp">
                                    <input type="email" name="email"  placeholder="@lang('Enter Your Email')" />
                                </div><!-- /.frm-grp -->


                                <div class="frm-grp">
                                    <button type="submit">@lang('Submit')</button>
                                </div><!-- /.frm-grp -->

                                <div class="form-result"></div><!-- /.form-result -->

                            </form>


                            <br>

                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ url('login') }}" class="forgetting-password text-right">@lang('Back To Login')</a>
                                </div>
                            </div>
                        </div><!-- /.inner -->
                    </div><!-- /.form-content -->
                </div><!-- /.col-md-5 -->
            </div><!-- /.row -->
        </div><!-- /.thm-container -->
    </section><!-- /.get-in-touch -->


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
