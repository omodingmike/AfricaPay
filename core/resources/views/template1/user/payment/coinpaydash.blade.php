@extends(activeTemp().'layouts.master')

@section('content')
	<!-- page title begin-->
	<div class="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6 col-lg-6">
					<h2 class="extra-margin">@lang('Deposit via') {{__($pt)}}</h2>

				</div>
			</div>
		</div>
	</div>
	<!-- page title end -->
	<!-- blog post begin-->
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
								<h3 class="text-color"> @lang('PLEASE SEND EXACTLY') <b style="color: green"> {{ $bcoin }}</b> @lang('DASH')</h3>
								<h4 class="text-color">@lang('TO') <b style="color: green"> {{ $wallet}}</b></h4>
								{!! $qrurl !!}
								<h3 class="text-color" style="font-weight:bold;">@lang('SCAN TO SEND')</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection