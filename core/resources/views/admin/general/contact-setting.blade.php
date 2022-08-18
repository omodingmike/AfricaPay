@extends('admin.layout.master')
@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                <form role="form" method="POST" action="{{route('general.store')}}">
                        {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-12"><strong style="text-transform: uppercase;">Contact
                                Phone</strong></label>
                        <div class="col-12">
                            <div class="input-group">
                                <input type="text" name="phone" class="form-control bold input-lg"
                                       value="{{ $general->phone }}" required>
                                <div class="input-group-append"><span class="input-group-text"><i class="fa fa-phone"></i></span></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-12"><strong style="text-transform: uppercase;">Contact
                                Email</strong></label>
                        <div class="col-12">
                            <div class="input-group">
                                <input type="text" name="email" class="form-control bold input-lg"
                                       value="{{ $general->email }}" required>
                                <div class="input-group-append"><span class="input-group-text"><i class="fa fa-envelope-open"></i></span></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-12"><strong style="text-transform: uppercase;">Contact
                                Address</strong></label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <input type="text" name="address" class="form-control bold input-lg"
                                       value="{{ $general->address }}" required>
                                <div class="input-group-append"><span class="input-group-text"><i class="fa fa-map-marker"></i></span></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-lg"><i class="fa fa-send"></i> UPDATE
                            </button>
                        </div>
                    </div>


                </form>

                </div>
            </div>
        </div>
    </div>

@stop
