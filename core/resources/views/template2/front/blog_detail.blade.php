@extends(activeTemp().'layouts.frontend')

@section('content')

        <section class="tools-section pranto-tool">
            <div class="thm-container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="tools-content pranto-bread">
                            <h3>{{__($know->title)}}</h3>
                        </div><!-- /.tools-content -->
                    </div><!-- /.col-md-6 -->

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.tools-section -->

        <div class="blog-post single-blog-post">
            <div class="container">
                <div class="row">

                    <div class="col-xl-8 col-lg-8">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12">
                                <div class="single-blog blog-details">
                                    <div class="post-shadow">
                                        <div class="part-img">
                                            <img src="{{asset('assets/images/blog/'.$know->image)}}" alt="">
                                        </div>
                                        <div class="part-text">
                                            <h3><a href="{{url()->current()}}">{{__($know->title)}}</a></h3>
                                            <h4>
                                                <span class="admin">@lang('By Admin') </span>.
                                                <span class="date">{{date('d M, Y', strtotime($know->created_at)) }} </span>.
                                            </h4>
                                            <p>{!! $know->text !!}</p>

                                            <br>
                                            <div class="post-share-area"><!-- post share area -->
                                                <!-- //.left content area -->
                                                <div class="right-conent-area list-inline"><!-- eight content area -->
                                                    <ul class="share">
                                                        <li  class="list-inline-item">@lang('Share'):</li>
                                                        <li  class="list-inline-item">
                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}">
                                                                <i class="fa fa-facebook-f"></i>
                                                            </a>
                                                        </li>
                                                        <li  class="list-inline-item">
                                                            <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}">
                                                                <i class="fa fa-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li  class="list-inline-item">
                                                            <a href="https://plus.google.com/share?url={{urlencode(url()->current()) }}">
                                                                <i class="fa fa-google"></i>
                                                            </a>
                                                        </li>
                                                        <li  class="list-inline-item">
                                                            <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary">
                                                                <i class="fa fa-linkedin"></i>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div><!-- //.eight content area -->
                                            </div><!-- //.post share area -->
                                        </div>


                                    </div>

                                    <div class="comment-area" >
                                        <div class="comment-shadow" style="width: 100%">
                                            <h3 class="comment-area-title"> @lang('Comments')</h3>
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
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-12">

                        <div class="sidebar">
                            <div class="row">

                                <div class="col-xl-12 col-lg-12 col-md-6">
                                    <div class="widget widget-popular-post">
                                        <h6 class="widgettitle">
                                            <span>@lang('Related Posts')</span>
                                        </h6>
                                        @foreach($know_rev as $data)

                                            <div class="single-post">
                                                <div class="part-img">
                                                    <img src="{{asset('assets/images/blog/'.$data->image)}}" alt="">
                                                </div>
                                                <div class="part-text">
                                                    <h4><a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">{{__($data->title)}}</a></h4>
                                                    <h5>{{date('d M, Y', strtotime($data->created_at)) }}</h5>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
@stop
