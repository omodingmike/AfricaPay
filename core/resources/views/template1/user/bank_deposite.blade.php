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


                <div class="col-xl-8">
                    <form class="contact-form" action="{{ route('submit.bank.deposit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="data_id" value="{{$data->id}}">

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

                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h3>@lang('Please Send Exactly') {{$data->amount + $data->charge	}} {{__($general->currency)}}</h3>
                                    </div>
                                    <div class="card-body text-center">
                                        <ul class="list-group">
                                            <li class="list-group-item">@lang('Your Requested Amount'): {{__($data->amount)}}</li>
                                            <li class="list-group-item">@lang('Account Name'): {{__($method->name)}}</li>
                                            <li class="list-group-item">@lang('Account Detail'): {{__($method->val1)}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <br>

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputFirstname">@lang('Upload Image/Photo (Deposit Verify)')<span class="requred">*</span></label>
                                    <input type="file" class="form-control"  name="image" required>
                                </div>
                            </div>

                            <div class="col-xl-12 col-lg-12">
                                <div class="form-group">
                                    <label for="InputFirstname">@lang('Payment Detail(Deposit Verify)')<span class="requred">*</span></label>
                                    <textarea class="form-control" placeholder="@lang('Enter Your Payment Details...')" name="detail" ></textarea>
                                </div>
                            </div>


                            <div class="col-xl-12 col-lg-12">
                                <div class="row d-flex">
                                    <div class="col-xl-12 col-lg-12">
                                        <button id="btn-confirm" type="submit" style="width: 100%" class="login-button btn-contact"> @lang('Submit')</button>
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

@endsection
