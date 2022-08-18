@extends(activeTemp().'layouts.frontend')
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
    <!-- page title end -->
    <!-- blog post begin-->
    <div class="blog-post single-blog-post">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-lg-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="single-blog blog-details">
                                <div class="post-shadow">
                                    <div class="part-text">
                                        <p>{!! $know->text !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
