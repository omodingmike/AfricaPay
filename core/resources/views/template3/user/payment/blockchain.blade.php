@extends(activeTemp().'layouts.master')

@section('content')

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


@endsection