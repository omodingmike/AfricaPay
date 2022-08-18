@extends(activeTemp().'layouts.master')

@section('content')

        <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="breadcrump-title text-center">
                            <h2 class="add-space">{{__($pt)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="contact">


            <div class="get-in-touch">
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


                            <div class="col-xl-12">
                                <div class="part-form">
                                    <form action="{{ route('submit.bank.deposit') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="data_id" value="{{$data->id}}">
                                        <div class="row">
                                            <div class="col-xl-12 col-lg-12">
                                                <strong>@lang('Upload Image/Photo (Deposit Verify)')</strong>
                                                <input type="file" style="padding: 15px;"  name="image" required >
                                            </div>
                                            <div class="col-xl-12 col-lg-12">
                                                <strong>@lang('Payment Detail(Deposit Verify)')</strong>
                                                <textarea placeholder="@lang('Enter Your Payment Details...')" name="detail" ></textarea>
                                            </div>

                                            <div class="col-xl-12">
                                                <button type="submit">@lang('Submit')</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>


@endsection