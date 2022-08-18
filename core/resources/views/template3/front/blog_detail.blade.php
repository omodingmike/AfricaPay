@extends(activeTemp().'layouts.frontend')

@section('content')

        <!--Start Page Content-->
        <section class="page-content">
            <!--Start Page Heading-->
            <div class="page-heading page-heading-bg faq-page">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h1 class="title">{{__($know->title)}}</h1>
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
                        <div class="col-md-8">
                            <!--Start div-->

                            <div class="blog-post">
                                <div class="post-media">
                                    <img class="img-responsive" src="{{asset('assets/images/blog/'.$know->image)}}" alt="image">
                                </div>
                                <div class="post-meta">
                                    <h2 class="post-title">{{__($know->title)}}</h2>
                                    <span><a href="{{url()->current()}}"><i class="icofont icofont-ui-calendar"></i> {{date('d M, Y', strtotime($know->created_at)) }}</a></span>
                                </div>
                                <div class="post-content">
                                    <blockquote class="blocquote">
                                        <p>{!! $know->text !!}</p>
                                    </blockquote>
                                </div>
                            </div>

                            <!--End div-->
                            <div class="blog-social">
                                <h4 class="title">@lang('Share Post'):</h4>
                                <ul>
                                    <li><a class="fb" href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}">Facebook</a></li>
                                    <li><a class="tw" href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}">Twitter</a></li>
                                    <li><a class="gp" href="https://plus.google.com/share?url={{urlencode(url()->current()) }}">Google Plus</a></li>
                                    <li><a class="lk" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary">Linkedin</a></li>
                                </ul>
                            </div>
                            <!--Start Blog Comments-->
                            <div class="post-comments">
                                <h3 class="title">@lang('Comments')</h3>
                                <!--Start Comments List-->
                                <div class="comment-list" style="width: 100%">
                                    <div id="fb-root"></div>
                                    <script>(function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) return;
                                            js = d.createElement(s); js.id = id;
                                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1421567158073949";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));
                                    </script>
                                    <div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
                                </div>
                                <!--End Comments List-->
                            </div>
                            <!--End Blog Comments-->
                        </div>
                        <!--End Blog Post Col-->

                        <!--Start Blog Sidebar Col-->
                        <div class="col-md-4">
                            <!--Start Sidebar-->
                            <div class="blog-sidebar">

                                <!--Start Recent Post-->
                                <div class="recent-post-widget widget">
                                    <h3 class="widget-title">@lang('Related Posts')</h3>
                                    <div class="widget-body">
                                        @foreach($know_rev as $data)
                                        <div class="recent-post-item">
                                            <div class="thumb">
                                                <a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}"><img src="{{asset('assets/images/blog/'.$data->image)}}" style="max-width: 80px" class="img-responsive" alt="Image"></a>
                                            </div>
                                            <div class="content">
                                                <h4 class="title"><a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">{{__($data->title)}}</a></h4>
                                                <span><i class="icofont icofont-ui-calendar"></i> {{date('d M, Y', strtotime($data->created_at)) }}</span>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--End Recent Post-->

                            </div>
                            <!--End Sidebar-->
                        </div>
                        <!--End Blog Sidebar Col-->
                    </div>
                    <!--End Row-->
                </div>
                <!--End Container-->
            </div>
            <!--End Blog Wrap-->

        </section>

@stop
