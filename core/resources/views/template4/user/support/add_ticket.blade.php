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


                    <div class="row">
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="col-md-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
                                        <p>{{ __($error) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="col-xl-12 col-lg-12">
                            <div class="part-form">
                                <form action="{{route('ticket.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12">
                                            <input type="text" value="{{ old('subject') }}" name="subject"  placeholder="@lang('Subject Name')*" >
                                        </div>
                                        <div class="col-xl-12 col-lg-12">
                                            <textarea name="detail" rows="10" required placeholder="@lang('Message...')"></textarea>
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
