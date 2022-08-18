@extends(activeTemp().'layouts.frontend')

@section('content')

    <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrump-title text-center">
                        <h2 class="add-space">{{__($pt)}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-details-area">
                        <div class="part-text">
                            <p>{!! $know->text !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
