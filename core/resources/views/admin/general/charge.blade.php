@extends('admin.layout.master')

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title ">{{$page_title}}</h3>
                <div class="tile-body">
                    <form role="form" method="POST" action="{{route('general.store')}}">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-4">
                                <h6>Balance Transfer Fixed Charge </h6>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->bal_trans_fixed_charge}}" name="bal_trans_fixed_charge">
                                    <div class="input-group-append"><span class="input-group-text">
                                        {{$general->currency}}
                                        </span>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-4">
                                <h6>Balance Transfer Percentage Charge </h6>
                                <div class="input-group">
                                    <input type="text" class="form-control input-lg" value="{{$general->bal_trans_per_charge}}" name="bal_trans_per_charge">
                                    <div class="input-group-append"><span class="input-group-text">
                                        %
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <hr/>
                            <div class="col-md-12 ">
                                <button class="btn btn-primary btn-block btn-lg">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@stop
