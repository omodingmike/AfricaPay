@extends('admin.layout.master')
@section('body')


    <div class="row">
        @if (count($errors) > 0)

                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</strong>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                </div>

        @endif
        <div class="col-md-12">
            <div class="tile">

                <div class="tile-title ">

                    <a href="{{route('plan.index')}}" class="btn btn-success btn-md pull-right ">
                        <i class="fa fa-eye"></i> All Plan
                    </a>
                    <br>
                </div>

                <div class="tile-body">

                    <form method="post" class="form-horizontal" action="{{route('plan.update', $plan->id)}}">
                        @csrf
                        @method('put')

                        <div class="form-body">

                            <div class="form-group">
                                <strong>Plan Name</strong>
                                <input type="text" class="form-control" name="name" value="{{$plan->name}}" required>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <strong>Amount</strong>
                                    <input data-toggle="toggle" id="amount" class="amount" data-onstyle="success"
                                    data-offstyle="info" data-on="Fixed" data-off="Range" data-width="100%" type="checkbox" {{$plan->fixed_amount != 0 ? 'checked': ''}} name="amount_type">
                                </div>


                                <div class="form-group offman col-md-3">
                                    <strong>Minimum Amount</strong>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{$plan->minimum}}" name="minimum">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{$general->currency_sym}}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group offman col-md-3" >
                                    <strong>Maximum Amount</strong>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{$plan->maximum}}" name="maximum">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{$general->currency_sym}}</div>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group onman col-md-3" style="display: none">
                                    <strong>Fixed Amount</strong>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{$plan->fixed_amount}}" name="amount">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{$general->currency_sym}}</div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-4">
                                    <strong>Time</strong>
                                    <select class="form-control" name="times">
                                        @foreach($time as $data)
                                            <option {{$plan->times == $data->time? 'selected': ''}} value="{{$data->time}}">{{$data->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <strong>Return /Interest</strong>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="{{$plan->interest}}" name="interest"  required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <select name="interest_status">
                                                    <option {{$plan->interest_status == '1'? 'selected': ''}} value="%">%</option>
                                                    <option {{$plan->interest_status == '0'? 'selected': ''}} value="{{$general->currency_sym}}">{{$general->currency_sym}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <strong>Return Interest</strong>
                                    <input data-toggle="toggle" id="lifetime" class="lifetime" data-onstyle="success" data-offstyle="danger"
                                           data-on="Times Wise" data-off="Lifetime" data-width="100%" type="checkbox" {{$plan->lifetime_status == 0? 'checked':''}} name="lifetime_status" >
                                </div>

                                <div class="form-group return col-md-3" style="display: none">
                                    <div class="form-group">
                                        <strong>Return Times</strong>
                                        <input type="text" class="form-control" value="{{$plan->repeat_time}}" name="repeat_time">
                                    </div>
                                </div>

                                <div class="form-group col-md-3" id="capitalBack">
                                    <strong>Capital Back</strong>
                                    <input data-toggle="toggle" data-onstyle="success" {{$plan->capital_back_status == 1? 'checked':''}} data-offstyle="danger"
                                           data-on="Yes" data-off="No" data-width="100%" type="checkbox" name="capital_back_status" >
                                </div>



                            </div>

                            <div class="form-group">
                                <strong>Status</strong>
                                <input data-toggle="toggle" data-onstyle="success" {{$plan->status == 1? 'checked':''}} data-offstyle="danger"
                                       data-on="Active" data-off="Disable" data-width="100%" type="checkbox" name="status" >
                            </div>




                        </div>

                        <div class="col-md-12">

                            <button type="submit" class="btn btn-primary btn-block">Update</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@stop
@section('script')
    <script>
       $(document).ready(function () {


           if ($('#amount').prop('checked') == false){
               $('.offman').css('display', 'block');
               $('.onman').css('display', 'none');
           }else {
               $('.offman').css('display', 'none');
               $('.onman').css('display', 'block');
           }

           if ($('#lifetime').prop('checked') == true){
               $('.return').css('display', 'block');
           }else {
               $('.return').css('display', 'none');
           }


           $('#amount').on('change', function () {
               var isCheck = $(this).prop('checked');
               if (isCheck == false)
               {
                    $('.offman').css('display', 'block');
                    $('.onman').css('display', 'none');
               }else {
                   $('.offman').css('display', 'none');
                   $('.onman').css('display', 'block');
               }
           });

           $('#lifetime').on('change', function () {
               var isCheck = $(this).prop('checked');
               if (isCheck == true)
               {
                    $('.return').css('display', 'block');

               }else {

                   $('.return').css('display', 'none');

               }
           });




       })
    </script>
@stop
