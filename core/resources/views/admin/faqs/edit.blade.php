@extends('admin.layout.master')
@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">

                <div class="tile-title ">
                     Edit Faq
                    <a href="{{route('faqs-all')}}" class="btn btn-success btn-md pull-right ">
                        <i class="fa fa-eye"></i> All Faqs
                    </a>
                    <br>
                </div>

                <div class="tile-body">

                    <form method="post" class="form-horizontal" action="{{route('faqs-update',$faqs->id)}}">
                        @csrf
                        @method('put')

                    <div class="form-body">

                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Question Title</strong></label>
                                    <div class="col-md-12">
                                        <input name="title" class="form-control form-control-lg" value="{{ $faqs->title }}" placeholder="Question Title" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Question Answer</strong></label>
                                    <div class="col-md-12">
                                        <textarea name="description" id="area1" rows="10" class="form-control form-control-lg" required placeholder="Question Answer">{{ $faqs->description }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit"  class="btn btn-primary btn-block bold btn-lg uppercase"><i class="fa fa-send"></i> Update FAQS</button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- row -->
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')

@stop
