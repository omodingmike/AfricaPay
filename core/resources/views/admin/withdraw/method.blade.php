@extends('admin.layout.master')

@section('body')


    <div class="row">
        <div class="col-md-12">

            @if (count($errors) > 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong class="col-md-12"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Alert!</strong>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <div class="tile">
                <div class="tile-body">
                    <div class="table">

                        <div class="caption font-dark pull-right">
                            <i class="icon-settings font-dark"></i>
                            <button id="btn_add" data-toggle="modal" data-target="#myModal" class="btn btn-primary bold"><i class="fa fa-plus"></i> Add New </button>
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>


                        <div class="row">

                            <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>
                                    Method Name
                                </th>
                                <th>
                                    Method Logo
                                </th>
                                <th>
                                    Min Amount
                                </th>
                                <th>Max Amount</th>
                                <th>Fix Charge</th>
                                <th>Percent of Charge</th>
                                <th>Rate</th>
                                <th>Processing Day</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($team as $data)
                                <tr id="row1">
                                    <td> <b>{{$data->name}}</b></td>
                                    <td> <img style="height: 80px; width: 80px" src="{{asset('assets/images/withdraw/'.$data->image)}}"></td>
                                    <td> {{$data->min_amo}} {{$general->currency}}</td>
                                    <td> {{$data->max_amo}} {{$general->currency}}</td>
                                    <td> {{$data->chargefx}} {{$general->currency}}</td>
                                    <td> {{$data->chargepc}} %</td>
                                    <td> {{$data->rate}} {{$data->currency}}</td>
                                    <td> {{$data->processing_day}} Days</td>
                                    <td>
                                        @if($data->status == 1)
                                            <span class="badge badge-info">Active</span>
                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td><a class="btn btn-primary" data-toggle="modal" href="#editModal{{$data->id}}">Edit </a></td>
                                </tr>








                                <div class="modal fade" id="editModal{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel"> Edit Team Member</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <form id="frmProducts" method="post" action="{{route('withdraw_method.update', $data->id)}}" class="form-horizontal" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <strong>Payment Method Image:</strong>
                                                        <div class="col-md-9 offset-1">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">

                                                                @if($data->image != null)
                                                                    <div class="fileinput-new thumbnail" style="width: 215px; height: 215px;" data-trigger="fileinput">
                                                                        <img style="width: 215px" src="{{asset('assets/images/withdraw/'. $data->image)}}/" alt="...">
                                                                    </div>
                                                                @endif

                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 215px; max-height: 215px"></div>
                                                                <div>
                                                <span class="btn btn-info btn-file">
                                                    <span class="fileinput-new bold uppercase"><i class="fa fa-file-image-o"></i> Select image</span>
                                                    <span class="fileinput-exists bold uppercase"><i class="fa fa-edit"></i> Change</span>
                                                    <input type="file" name="image" accept="image/*">
                                                </span>
                                                                    <a href="#" class="btn btn-danger fileinput-exists bold uppercase" data-dismiss="fileinput"><i class="fa fa-trash"></i> Remove</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="control-label">Payment Method Name</label>
                                                        <input class="form-control text-capitalize" placeholder="Method Name" value="{{$data->name}}" type="text" required name="name">
                                                    </div>


                                                    <div class="row">
                                                        <div class="input-group col-md-6">
                                                            <label class="control-label col-md-12">Minimum Amount For Withdraw</label>
                                                            <input type="number" class="form-control input-lg" required name="min_amo" value="{{$data->min_amo}}" placeholder="Minimum Amount">
                                                            <div class="input-group-append">
                                        <span class="input-group-text">
                                             {{$general->currency_sym}}
                                            </span>
                                                            </div>
                                                        </div>

                                                        <div class="input-group col-md-6">
                                                            <label class="control-label col-md-12">Maximum Amount For Withdraw</label>
                                                            <input type="number" class="form-control input-lg" placeholder="Maximum Amount" value="{{$data->max_amo}}" required name="max_amo">
                                                            <div class="input-group-append">
                                        <span class="input-group-text">
                                             {{$general->currency_sym}}
                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="row">
                                                        <div class="input-group col-md-6">
                                                            <label class="control-label col-md-12">Fixed Charge For With Draw</label>
                                                            <input class="form-control input-lg"  placeholder="Charge" type="text" required value="{{$data->chargefx}}" name="chargefx">
                                                            <div class="input-group-append">
                                        <span class="input-group-text">
                                             {{$general->currency_sym}}
                                            </span>
                                                            </div>
                                                        </div>

                                                        <div class="input-group col-md-6">
                                                            <label class="control-label col-md-12">Charge Percentage</label>
                                                            <input  class="form-control input-lg" placeholder="Charge Percentage" type="text" value="{{$data->chargepc}}" required name="chargepc">
                                                            <div class="input-group-append">
                                        <span class="input-group-text">
                                             %
                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="input-group ">
                                                        <label class="control-label col-md-12">Rate for 1 Method Currency</label>
                                                        <input class="form-control" placeholder="Rate" type="text" value="{{$data->rate}}" required name="rate">
                                                        <div class="input-group-append">
                                        <span class="input-group-text">
                                             {{$general->currency_sym}}
                                            </span>
                                                        </div>
                                                    </div>




                                                    <div class="form-group">
                                                        <label class="control-label">Method Currency</label>
                                                        <input class="form-control"  placeholder="Currency" type="text" value="{{$data->currency}}" required name="currency">
                                                    </div>




                                                    <div class="input-group">
                                                        <label class="control-label col-md-12">Payback Days</label>
                                                        <input class="form-control" placeholder="Day" type="text" required value="{{$data->processing_day}}" name="processing_day">
                                                        <div class="input-group-append">
                                        <span class="input-group-text">
                                            Days
                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <select class="form-control" name="status">
                                                            <option {{$data->status == 1 ? 'selected': ''}} value="1">Active</option>
                                                            <option {{$data->status == 0 ? 'selected': ''}} value="0">Inactive</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                                    <button type="submit" class="btn btn-primary bold uppercase"><i class="fa fa-send"></i> Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>

                            @endforeach
                            </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"> Add New Withdraw Method</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form id="frmProducts" method="post" action="{{route('withdraw_method.store')}}" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label">Payment Method Image</label>
                                <input class="form-control"  type="file" required name="image">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Payment Method Name</label>
                                <input class="form-control text-capitalize" placeholder="Method Name" type="text" required name="name">
                            </div>


                           <div class="row">
                               <div class="input-group col-md-6">
                                   <label class="control-label col-md-12">Minimum Amount For Withdraw</label>
                                   <input type="number" class="form-control input-lg" required name="min_amo" placeholder="Minimum Amount">
                                   <div class="input-group-append">
                                        <span class="input-group-text">
                                             {{$general->currency_sym}}
                                            </span>
                                   </div>
                               </div>

                               <div class="input-group col-md-6">
                                   <label class="control-label col-md-12">Maximum Amount For Withdraw</label>
                                   <input type="number" class="form-control input-lg" placeholder="Maximum Amount" required name="max_amo">
                                   <div class="input-group-append">
                                        <span class="input-group-text">
                                             {{$general->currency_sym}}
                                            </span>
                                   </div>
                               </div>
                           </div>



                            <div class="row">
                               <div class="input-group col-md-6">
                                   <label class="control-label col-md-12">Fixed Charge For With Draw</label>
                                   <input class="form-control input-lg"  placeholder="Charge" type="text" required name="chargefx">
                                   <div class="input-group-append">
                                        <span class="input-group-text">
                                             {{$general->currency_sym}}
                                            </span>
                                   </div>
                               </div>

                               <div class="input-group col-md-6">
                                   <label class="control-label col-md-12">Charge Percentage</label>
                                   <input  class="form-control input-lg" placeholder="Charge Percentage" type="text" required name="chargepc">
                                   <div class="input-group-append">
                                        <span class="input-group-text">
                                             %
                                            </span>
                                   </div>
                               </div>
                           </div>



                               <div class="input-group ">
                                   <label class="control-label col-md-12">Rate for 1 Method Currency</label>
                                   <input class="form-control" placeholder="Rate" type="text" required name="rate">
                                   <div class="input-group-append">
                                        <span class="input-group-text">
                                             {{$general->currency_sym}}
                                            </span>
                                   </div>
                               </div>




                            <div class="form-group">
                                <label class="control-label">Method Currency</label>
                                <input class="form-control"  placeholder="Currency" type="text" required name="currency">
                            </div>




                               <div class="input-group">
                                   <label class="control-label col-md-12">Payback Days</label>
                                   <input class="form-control" placeholder="Day" type="text" required name="processing_day">
                                   <div class="input-group-append">
                                        <span class="input-group-text">
                                            Days
                                            </span>
                                   </div>
                               </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            <button type="submit" class="btn btn-primary bold uppercase"><i class="fa fa-send"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>


    </div>

@stop
