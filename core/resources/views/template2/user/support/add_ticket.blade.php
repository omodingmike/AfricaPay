@extends(activeTemp().'layouts.master')
@section('style')

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

        <section class="get-in-touch" id="contact">

            <div class="thm-container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-content">
                            <div class="inner">
                                <div class="title text-center">
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                {{__($error)}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div><!-- /.title -->
                                <form  action="{{route('ticket.store')}}" method="post" class="contact-form">
                                    @csrf
                                    <div class="frm-grp">
                                        <input type="text" value="{{ old('subject') }}" name="subject"  placeholder="@lang('Subject Name')*" required>
                                    </div><!-- /.frm-grp -->
                                    <div class="frm-grp">
                                        <textarea name="detail" rows="10" required placeholder="@lang('Message...')"></textarea>
                                    </div><!-- /.frm-grp -->

                                    <div class="frm-grp">
                                        <button type="submit">@lang('Submit')</button>
                                    </div><!-- /.frm-grp -->

                                    <div class="form-result"></div><!-- /.form-result -->

                                </form>
                            </div><!-- /.inner -->
                        </div><!-- /.form-content -->
                    </div><!-- /.col-md-5 -->
                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section>
        
@endsection
@section('script')

@stop
