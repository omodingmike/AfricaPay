@extends(activeTemp().'layouts.master')

@section('content')

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


@endsection