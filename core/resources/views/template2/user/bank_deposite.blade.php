@extends(activeTemp().'layouts.master')

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

        <section class="get-in-touch">

            <div class="thm-container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
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
                                <form id="balanceWithdraw" action="{{ route('submit.bank.deposit') }}" method="post" enctype="multipart/form-data" class="contact-form">
                                    @csrf
                                    <input type="hidden" name="data_id" value="{{$data->id}}">

                                    <div class="col-xl-12 col-lg-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading text-center">
                                                <h3>@lang('Please Send Exactly') {{$data->amount + $data->charge	}} {{__($general->currency)}}</h3>
                                            </div>
                                            <div class="panel-body text-center">
                                                <ul class="list-group">
                                                    <li class="list-group-item">@lang('Your Requested Amount'): {{__($data->amount)}}</li>
                                                    <li class="list-group-item">@lang('Account Name'): {{__($method->name)}}</li>
                                                    <li class="list-group-item">@lang('Account Detail'): {{__($method->val1)}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="frm-grp">
                                        <input type="file" name="image" required>

                                    </div><!-- /.frm-grp -->

                                    <div class="frm-grp">
                                        <textarea  rows="5" placeholder="@lang('Enter Your Payment Details...')" required name="detail"></textarea>
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
            </div>
        </section>


@endsection
@section('script')

@endsection
