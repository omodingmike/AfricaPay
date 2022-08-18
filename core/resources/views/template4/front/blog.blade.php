@extends(activeTemp().'layouts.frontend')

@section('content')

    <!-- breadcrump begin-->
    <div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover; ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="breadcrump-title text-center">
                        <h2 class="add-space">{{__($general->blog_title)}}</h2>
                        <span>{{__($general->blog_sub_title)}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrump end -->

    <!-- blog begin -->
    <div class="blog-area blog-grid-page">
        <div class="container">
            @foreach($know->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $data)
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="single-blog">
                        <div class="part-img">
                            <img src="{{asset('assets/images/blog/'.$data->image)}}" alt="{{$data->title}}">

                        </div>
                        <div class="part-text">
                            <span>{{date('d M, Y', strtotime($data->created_at)) }}</span>
                            <h3><a href="{{route('blog.detail', ['id'=>$data->id,'any'=> Replace($data->title)])}}">{{__($data->title)}}</a></h3>
                            <p>{{short_text($data->text, 50)}}</p>
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
    </div>
    <!-- blog end -->

@stop
