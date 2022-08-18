@extends(activeTemp().'layouts.master')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <h2 class="extra-margin">{{__($pt)}}</h2>
                </div>
            </div>
        </div>
    </div>


    <div class="contact login">
        <div class="container">


            <div class="row justify-content-center">
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
                <div class="col-xl-12">
                    <form class="contact-form" action="{{route('ticket.store')}}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputName">@lang('Subject')<span class="requred">:</span></label>
                                    <input type="text" class="form-control"  value="{{ old('subject') }}" name="subject"  placeholder="@lang('Subject Name')*" required>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputName">@lang('Detail')<span class="requred">:</span></label>
                                    <textarea class="form-control" name="detail" rows="10" required placeholder="@lang('Message...')"></textarea>
                                </div>
                            </div>


                            <div class="col-xl-12 col-lg-12">
                                <div class="row d-flex">
                                    <div class="col-xl-12 col-lg-12">
                                        <button type="submit" style="width: 100%" class="login-button btn-contact">@lang('Submit')</button>
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

