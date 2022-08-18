@extends(activeTemp().'layouts.frontend')

@section('content')

        <section class="page-content">
            <!--Start Page Heading-->
            <div class="page-heading page-heading-bg faq-page">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="title">{{__($pt)}}</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Page Heading-->

            <!--Start Blog Wrap-->
            <div class="blog-single-wrap blog-single-page">
                <!--Start Container-->
                <div class="container">
                    <!--Start Row-->
                    <div class="row">
                        <!--Start Blog Post Col-->
                        <div class="col-md-12">
                            <!--Start div-->

                            <div class="blog-post">
                                <div class="post-content">
                                    <p>{!! $know->text !!}</p>
                                </div>
                            </div>

                        </div>
                        <!--End Blog Post Col-->
                    </div>
                    <!--End Row-->
                </div>
                <!--End Container-->
            </div>
            <!--End Blog Wrap-->
        </section>

@stop
