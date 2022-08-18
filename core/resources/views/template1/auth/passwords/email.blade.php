@extends(activeTemp().'layouts.frontend')


@section('content')

    <div class="page-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <h2 class="extra-margin">@lang('Forgot Password')</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- page title end -->

    <!-- login begin-->
    <div class="contact login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="section-title text-center">
                        <h2>@lang('Recover Your Account')</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">


                <div class="col-xl-6 col-lg-6">
                    <form class="contact-form" action="{{ route('forget.password.user') }}" method="post">
                        @csrf
                        <div class="row">
                            @if (count($errors) > 0)

                                @foreach ($errors->all() as $error)
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                &times;
                                            </button>
                                            <p>{{ $error }}</p>
                                        </div>
                                    </div>
                                @endforeach

                            @endif

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputName">@lang('Enter Your Email')<span class="requred">*</span></label>
                                    <input type="email" name="email"  class="form-control"  id="InputName" placeholder="@lang('E-mail')"
                                           required>
                                </div>
                            </div>


                            <div class="col-xl-12 col-lg-12">
                                <div class="row d-flex">
                                    <div class="col-xl-6 col-lg-6">
                                        <button type="submit" class="login-button btn-contact"> @lang('Submit') </button>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 d-flex align-items-center">
                                        <a href="{{ url('login') }}" class="forgetting-password">@lang('Back To Login')</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


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
