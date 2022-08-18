@extends('layouts.master')

@section('content')
	@if(activeTemp()  == 1)
	<div class="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6 col-lg-6">
					<h2 class="extra-margin">@lang('Deposit via') {{__($pt)}}</h2>

				</div>
			</div>
		</div>
	</div>

	<div class="blog-post single-blog-post">
		<div class="container">
			<div class="row page-bar-btn">
				<div class="col-md-8 offset-md-2">

					<div class="card panel-primary">
						<div class="card-header">
							<h3 class="panel-title text-center">@lang('Deposit via') {{__($pt)}}</h3>
						</div>

						<div class="card-body text-center">

							<div  class="col-md-8 offset-md-2 text-center">
								<h3 class="text-color"> @lang('PLEASE SEND EXACTLY') <b style="color: green"> {{$bitcoin['amount']}}</b> @lang('BTC')</h3>
								<h4 class="text-color">@lang('TO') <b style="color: green"> {{$bitcoin['sendto']}}</b></h4>
								{!! $bitcoin['code'] !!}
								<h3 class="text-color" style="font-weight:bold;">@lang('SCAN TO SEND')</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@elseif(activeTemp()  == 2)
		<section class="tools-section" style="padding-bottom: 110px;">
			<div class="thm-container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="tools-content pranto-bread">
							<h3>{{__($pt)}}</h3>
						</div><!-- /.tools-content -->
					</div><!-- /.col-md-6 -->

				</div><!-- /.row -->
			</div><!-- /.thm-container -->
		</section>

		<section class="team-section sec-pad">
			<div class="thm-container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="panel panel-primary">
							<div class="panel-heading text-center">
								<h3>@lang('Deposit via') {{__($pt)}}</h3>
							</div>
							<div class="panel-body text-center">
								<h3 class="text-color"> @lang('PLEASE SEND EXACTLY') <b style="color: green"> {{$bitcoin['amount']}}</b> @lang('BTC')</h3>
								<h4 class="text-color">@lang('TO') <b style="color: green"> {{$bitcoin['sendto']}}</b></h4>
								{!! $bitcoin['code'] !!}
								<h3 class="text-color" style="font-weight:bold;">@lang('SCAN TO SEND')</h3>
							</div>
						</div>
					</div>
				</div><!-- /.row -->
			</div><!-- /.thm-container -->
		</section>

	@elseif(activeTemp()  == 3)
		<section class="page-content">
			<div class="page-heading page-heading-bg pranto-heading">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1 class="title pranto-title">{{__($pt)}}</h1>
						</div>
					</div>
				</div>
			</div>
		</section><br><br>

		<section class="latest-news-are pranto-section-bottom">
			<div class="container">
				<div class="row">

					<div class="col-md-6 col-md-offset-3">
						<div class="panel panel-primary">
							<div class="panel-heading text-center">
								<h3>@lang('Deposit via') {{__($pt)}}</h3>
							</div>
							<div class="panel-body text-center">
								<h3 class="text-color"> @lang('PLEASE SEND EXACTLY') <b style="color: green"> {{$bitcoin['amount']}}</b> @lang('BTC')</h3>
								<h4 class="text-color">@lang('TO') <b style="color: green"> {{$bitcoin['sendto']}}</b></h4>
								{!! $bitcoin['code'] !!}
								<h3 class="text-color" style="font-weight:bold;">@lang('SCAN TO SEND')</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	@elseif(activeTemp()  == 4)
		<div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-8 col-lg-8">
						<div class="breadcrump-title text-center">
							<h2 class="add-space">{{__($pt)}}</h2>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="login">
			<div class="container">
				<div class="row justify-content-center">

					<div class="card panel-primary">
						<div class="card-header">
							<h3 class="panel-title text-center">@lang('Deposit via') {{__($pt)}}</h3>
						</div>

						<div class="card-body text-center">

							<div  class="col-md-8 offset-md-2 text-center">
								<h3 class="text-color"> @lang('PLEASE SEND EXACTLY') <b style="color: green"> {{$bitcoin['amount']}}</b> @lang('BTC')</h3>
								<h4 class="text-color">@lang('TO') <b style="color: green"> {{$bitcoin['sendto']}}</b></h4>
								{!! $bitcoin['code'] !!}
								<h3 class="text-color" style="font-weight:bold;">@lang('SCAN TO SEND')</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	@endif

@endsection