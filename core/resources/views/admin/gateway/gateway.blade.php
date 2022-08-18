@extends('admin.layout.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap-fileinput.css')}}">
@endsection

@section('body')
<div class="tile">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">DEPOSIT PAYMENT GATEWAY</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($gateways as $gateway)
                        <div class="col-md-3" style="margin-top:10px;">
                            <div class="card text-white {{$gateway->status==1?'bg-dark':'bg-secondary'}}">
                                <div class="card-header text-center">
                                    {{$gateway->main_name}}
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{route('admin.gateup', $gateway)}}" enctype="multipart/form-data">
                                        @csrf()
                                        @method('put')
                                        <div class="form-group text-center">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                                                    <img src="{{ asset('assets/images/gateway') }}/{{$gateway->id}}.jpg" alt="*" /> 
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 150px; max-height: 150px;"> 
                                                </div>
                                                <div>
                                                    <span class="btn btn-success btn-file">
                                                        <span class="fileinput-new"> Change Logo </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                        <input type="file" name="gateimg"> 
                                                    </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ $gateway->status == "1" ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $gateway->status == "0" ? 'selected' : '' }}>Deactive</option>
                                            </select>
                                        </div>
                                        <button class="btn btn-info btn-block btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample{{$gateway->id}}" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-eye"></i> DETAILS
                                        </button>
                                        <div class="collapse" id="collapseExample{{$gateway->id}}">
                                            <hr/>
                                            <div class="form-group">
                                                <label>Name of Gateway</label>
                                                <input type="text" value="{{$gateway->name}}" class="form-control" id="name" name="name" >
                                            </div>
                                            <div class="form-group">
                                                <label>Rate</label>
                                                <div class="input-group">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            1 USD =
                                                        </span>
                                                    </div>
                                                    <input type="text" value="{{$gateway->rate}}" class="form-control" id="rate" name="rate" >
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            {{ $general->currency_sym }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="card text-center text-dark">
                                                <div class="card-header">
                                                    Deposit Limit
                                                </div>
                                                <div class="card-body">
                                                    
                                                    <div class="form-group">
                                                        <label for="minamo">Minimum Amount</label>
                                                        <div class="input-group">
                                                            <input type="text" value="{{$gateway->minamo}}" class="form-control" id="minamo" name="minamo" >
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    {{ $general->currency_sym }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="maxamo">Maximum Amount</label>
                                                        <div class="input-group">
                                                            <input type="text" value="{{$gateway->maxamo}}" class="form-control" id="maxamo" name="maxamo" >
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    {{ $general->currency_sym }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <hr/>
                                            <div class="card text-center text-dark">
                                                <div class="card-header">
                                                    Deposit Charge
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="chargefx">Fixed Charge</label>
                                                        <div class="input-group">
                                                            <input type="text" value="{{$gateway->fixed_charge}}" class="form-control" id="chargefx" name="fixed_charge" >
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    {{ $general->currency_sym }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="chargepc">Charge in Percentage</label>
                                                        <div class="input-group">
                                                            <input type="text" value="{{$gateway->percent_charge}}" class="form-control" id="chargepc" name="percent_charge" >
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    {{ $general->currency_sym }}
                                                                </span>
                                                            </div>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            @if($gateway->id==101)
                                            <div class="form-group">
                                                <label for="val1">PAYPAL BUSINESS EMAIL</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            @elseif($gateway->id==102)
                                            <div class="form-group">
                                                <label for="val1">PM USD ACCOUNT</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">ALTERNATE PASSPHRASE</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            
                                            @elseif($gateway->id==103)
                                            <div class="form-group">
                                                <label for="val1">SECRET KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">PUBLISHABLE KEY</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==104)
                                            <div class="form-group">
                                                <label for="val1">Marchant Email</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">Secret KEY</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==105)
                                            <div class="form-group">
                                                <label for="val1">Merchant ID</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">Merchant Key</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val3">Website</label>
                                                <input type="text" value="{{$gateway->val3}}" class="form-control" id="val3" name="val3" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val4">Industry Type</label>
                                                <input type="text" value="{{$gateway->val4}}" class="form-control" id="val4" name="val4" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val5">Channel ID</label>
                                                <input type="text" value="{{$gateway->val5}}" class="form-control" id="val5" name="val5" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val6">Transaction URL</label>
                                                <input type="text" value="{{$gateway->val6}}" class="form-control" id="val6" name="val6" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val7">Transaction Status URL</label>
                                                <input type="text" value="{{$gateway->val7}}" class="form-control" id="val7" name="val7" >
                                            </div>
                                            @elseif($gateway->id==106)
                                            <div class="form-group">
                                                <label for="val1">MERCHANT ID</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">Secret key</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==107)
                                            <div class="form-group">
                                                <label for="val1">Public KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">Secret key</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            <div class="form-group">
                                                <label>NGN Rate</label>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        1 NGN =
                                                    </span>
                                                    <input type="text" value="{{$gateway->val7}}" class="form-control" name="val7" >
                                                    <span class="input-group-text">
                                                        USD
                                                    </span>
                                                </div>
                                            </div>
                                            @elseif($gateway->id==108)
                                            <div class="form-group">
                                                <label for="val1">MERCHANT ID</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            @elseif($gateway->id==501)
                                            <div class="form-group">
                                                <label for="val1">API KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">XPUB CODE</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==502)
                                            <div class="form-group">
                                                <label for="val1">API KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">API PIN</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==503)
                                            <div class="form-group">
                                                <label for="val1">API KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">API PIN</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==504)
                                            <div class="form-group">
                                                <label for="val1">API KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">API PIN</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==505)
                                            <div class="form-group">
                                                <label for="val1">Public  KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">Private KEY</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==506)
                                            <div class="form-group">
                                                <label for="val1">Public  KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">Private KEY</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==507)
                                            <div class="form-group">
                                                <label for="val1">Public  KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">Private KEY</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==508)
                                            <div class="form-group">
                                                <label for="val1">Public  KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">Private KEY</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==509)
                                            <div class="form-group">
                                                <label for="val1">Public  KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">Private KEY</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==510)
                                            <div class="form-group">
                                                <label for="val1">Public  KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            <div class="form-group">
                                                <label for="val2">Private KEY</label>
                                                <input type="text" value="{{$gateway->val2}}" class="form-control" id="val2" name="val2" >
                                            </div>
                                            @elseif($gateway->id==512)
                                            <div class="form-group">
                                                <label for="val1">API  KEY</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            @elseif($gateway->id==513)
                                            <div class="form-group">
                                                <label for="val1">Merchant ID</label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            @else
                                            <div class="form-group">
                                                <label for="val1"><strong>Payment Details</strong></label>
                                                <input type="text" value="{{$gateway->val1}}" class="form-control" id="val1" name="val1" >
                                            </div>
                                            @endif
                                            
                                            @if($gateway->id < 100 || $gateway->id==101)
                                            <div class="form-group" style="height:65px;">
                                            </div>
                                            @endif
                                        </div>
                                        
                                        <hr/>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success btn-block">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>				
                        </div>   
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/admin/js/bootstrap-fileinput.js')}}"></script>
@endsection