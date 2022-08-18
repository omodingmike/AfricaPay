@extends(activeTemp().'layouts.frontend')


@section('content')


    <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="breadcrump-title text-center">
                        <h2 class="add-space">@lang('Forgot Password')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="login">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-xl-5 col-lg-5">
                    <div class="part-form">

                        <div class="row">
                            @if (count($errors) > 0)
                                @foreach ($errors->all() as $error)
                                    <div class="col-md-12">
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                &times;
                                            </button>
                                            <p>{{ __($error) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <form action="{{ route('forget.password.user') }}" method="post">
                            @csrf
                            <input type="email" name="email"  placeholder="@lang('Enter Your Email')" required>
                            <button type="submit">@lang('Submit')</button>
                        </form>
                        <span class="forget-password"><a href="{{ url('login') }}">@lang('Back To Login')</a></span>
                    </div>
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
