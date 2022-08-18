@extends(activeTemp().'layouts.frontend')
@section('content')

        <!--Start Page Content-->
        <section class="page-content">
            <!--Start Page Heading-->
            <div class="page-heading page-heading-bg faq-page">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="title">{{__($general->blog_title)}}</h1>
                            <p>{{__($general->blog_sub_title)}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Page Heading-->

            <!--Start Blog Wrap-->
            <div class="blog-wrap blog-page">
                <!--Start Container-->
                <div class="container">
                    <!--Start Blog Post Row-->
                    <div class="row">
                        <div class="col-md-8">

                        @foreach($know as $data)
                            <!--Start Blog Post-->
                            <div class="single-blog-post">
                                <div class="post-media">
                                    <a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}"><img class="img-responsive" src="{{asset('assets/images/blog/'.$data->image)}}" alt="image"></a>
                                </div>

                                <div class="content">
                                    <div class="post-meta">
                                        <h2 class="post-title">
                                            <a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">{{ __($data->title) }}</a>
                                        </h2>
                                        <span><a href=""><i class="icofont icofont-ui-calendar"></i> {{date('d M, Y', strtotime($data->created_at)) }} </a></span>

                                    </div>
                                    <div class="post-content">
                                        <p>{{short_text($data->text, 50)}} </p>
                                        <a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">@lang('Read More')</a>
                                    </div>
                                </div>
                            </div>
                            <!--End Blog Post-->
                        @endforeach

                            <!--End Blog Post-->
                            <!--Start Pagination-->
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div class="blog-pagination text-center">
                                    {{$know->links()}}
                                    </div>
                                </div>
                            </div>
                            <!--End Pagination-->
                        </div>

                        <!--Start Blog Sidebar Col-->
                        <div class="col-md-4">

                                <!--Start Recent Post-->
                                <div class="recent-post-widget widget">
                                    <h3 class="widget-title">@lang('Related Posts')</h3>
                                    <div class="widget-body">
                                        @foreach($know_rev as $data)
                                        <div class="recent-post-item" style="margin-top: 20px;">
                                            <div class="thumb">
                                                <a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}"><img style="max-width: 80px" src="{{asset('assets/images/blog/'.$data->image)}}" class="img-responsive" alt="Blog Image"></a>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">{{__($data->title)}}</a></h4>
                                                <span><i class="icofont icofont-ui-calendar"></i> {{date('d M, Y', strtotime($data->created_at)) }}</span>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                                <!--End Recent Post-->


                            </div>
                            <!--End Sidebar-->
                        </div>
                        <!--End Blog Sidebar Col-->
                    </div>
                    <!--End Blog Post Row-->
                </div>
                <!--End Container-->
            <!--End Blog Wrap-->
        </section>

@stop
