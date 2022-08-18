<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo/favicon.png')}}" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/font-awesome.min.css')}}">
    <title>{{$page_title}} | {{$general->sitename}}</title>

</head>
<body>
<section class="material-half-bg">
    <div class="cover" style="background-color: #{{$general->color}};"></div>
</section>
<section class="login-content" style="background-color: #{{$general->color}};">
    <div class="logo">
        <h1>
        <img style="max-width: 160px;" src="{{asset('assets/images/logo/logo.png')}}" alt="logo image">
        </h1>
    </div>
    <div class="login-box">
        <form class="login-form" id="login-form" action="{{ url('/admin/login') }}" method="post">
            {{ csrf_field() }}
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN AS ADMIN</h3>
            <div id="error">
                @if ($errors->has('username'))
                    <div class="alert alert-danger alert-dismissible" role="alert" style="font-size: 13px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $errors->first('username') }}
                    </div>
                @endif
                @if ($errors->has('password'))
                    <div class="alert alert-danger alert-dismissible" role="alert"  style="font-size: 13px;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label">USERNAME</label>
                <input class="form-control" style="border-color: #{{$general->color}}" name="username" type="text" placeholder="Username" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">PASSWORD</label>
                <input class="form-control" style="border-color: #{{$general->color}}" name="password" type="password" placeholder="Password">
            </div>


            <div class="form-group btn-container" id="working">
                <button class="btn btn-primary btn-block login-button-pranto" style="background: #{{$general->color}}; border-color: #{{$general->color}}"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
            <br>
            <a href="{{route('admin.password.request')}}" style="color: #{{$general->color}};">Forgot Password?</a>

        </form>

    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="{{asset('assets/admin/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.validate.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('assets/admin/js/pace.min.js')}}"></script>

</body>
</html>
