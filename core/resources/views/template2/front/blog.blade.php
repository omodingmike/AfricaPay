@extends(activeTemp().'layouts.frontend')

@section('content')


        <section class="tools-section pranto-tool">
            <div class="thm-container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="tools-content pranto-bread">
                            <h3>{{__($general->blog_title)}}</h3>
                            <p>{{__($general->blog_sub_title)}}</p>
                        </div><!-- /.tools-content -->
                    </div><!-- /.col-md-6 -->

                </div><!-- /.row -->
            </div><!-- /.thm-container -->
        </section><!-- /.tools-section -->


        <div class="blog-post">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        @foreach($know->chunk(2) as $chunk)
                            <div class="row">
                                @foreach($chunk as $data)
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="single-blog">
                                            <div class="part-img">
                                                <img src="{{asset('assets/images/blog/'.$data->image)}}" alt="">
                                            </div>
                                            <div class="part-text">
                                                <h3><a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">{{__($data->title)}}</a></h3>
                                                <h4>
                                                    <span class="admin">@lang('By Admin') </span>.
                                                    <span class="date">{{date('d M, Y', strtotime($data->created_at)) }} </span>.

                                                </h4>
                                                <p>{{short_text($data->text, 50)}}</p>
                                                <a class="read-more" href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}"><span><i class="fas fa-book-reader"></i></span> @lang('Read More')</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        <div class="row">
                            <div class="col-md-12">
                                {{$know->links()}}
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
