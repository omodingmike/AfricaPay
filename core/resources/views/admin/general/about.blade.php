@extends('admin.layout.master')


@section('body')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title"> Manage About </h3>
                <div class="tile-body">
                    <form class="form-horizontal" method="post" action="{{route('general.store')}}" role="form" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-body">

                            <div class="form-group ">
                                <h5> Title</h5>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-lg"
                                           value="{{$general->about_title}}"
                                           name="about_title">
                                    <div class="input-group-append"><span class="input-group-text">
                                            <i class="fa fa-font"></i>
                                            </span>
                                    </div>
                                </div>
                                @if ($errors->has('about_title'))
                                    <div class="error">{{ $errors->first('about_title') }}</div>
                                @endif
                            </div>


                            <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                                <h5>Detail </h5>

                                <textarea id="area1" class="form-control form-control-lg" rows="15" name="about_detail">{{ $general->about_detail }}</textarea>
                                @if ($errors->has('about'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('about') }}</strong>
                                        </span>
                                @endif

                            </div>
                            <br>


                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"><i
                                            class="fa fa-send"></i> Update About
                                    </button>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop

