@extends(activeTemp().'layouts.frontend')

@section('content')

        <!-- breadcrump begin-->
        <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover; ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="breadcrump-title text-center">
                            <h2 class="add-space">{{__($know->title)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrump end -->

        <!-- blog begin -->
        <div class="blog-area">
            <div class="container">
                <div class="row">

                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-details-area">
                            <div class="part-img">
                                <img src="{{asset('assets/images/blog/'.$know->image)}}" alt="">
                            </div>
                            <div class="part-text">
                                <h2>{{__($know->title)}}</h2>
                                <p>{!! $know->text !!}</p>
                            </div>

                            <div class="part-meta text-center">
                                <ul>
                                    <li><a class="fb" href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}">Facebook</a></li>
                                    <li><a class="tw" href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}">Twitter</a></li>
                                    <li><a class="gp" href="https://plus.google.com/share?url={{urlencode(url()->current()) }}">Google Plus</a></li>
                                    <li><a class="lk" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title=my share text&amp;summary=dit is de linkedin summary">Linkedin</a></li>

                                </ul>
                            </div>
                        </div>

                        <div class="comments-area">
                            <h3>@lang('Comments')</h3>
                            <div class="single-comment">
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


                    <div class="col-xl-4 col-lg-5">
                        <div class="row">

                            <div class="col-xl-12 col-lg-12 col-md-6">

                                <div class="single-widget" id="recent-post">
                                    <h3>@lang('Related Posts')</h3>

                                    @foreach($know_rev as $data)
                                    <div class="single-recent">
                                        <div class="part-img">
                                            <img style="max-width: 360px; max-height: 240px" src="{{asset('assets/images/blog/'.$data->image)}}" alt="{{$data->title}}">
                                        </div>
                                        <div class="part-text">
                                            <h4><a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">{{__($data->title)}}</a></h4>
                                            <span>{{date('d M, Y', strtotime($data->created_at)) }}</span>
                                        </div>
                                    </div><br>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- blog end -->

@stop
