@extends(activeTemp().'layouts.master')

@section('content')

	<section class="tools-section" style="padding-bottom: 110px;">
		<div class="thm-container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="tools-content pranto-bread">
						<h3>@lang('Deposit via Coinpay')</h3>
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
							<h3>@lang('Confirm Buy')</h3>
						</div>
						<div class="panel-body text-center">
							<h4 class="text-color">$ {{$amon}} <i class="fa fa-exchange"></i>
								<i class="fa fa-bitcoin"></i>{{ $bcoin }}</h4>

							<b style="color: red;"> @lang('Minimum 3 Confirmation Required to Credited Your Account.')<br/>@lang('(It May Take Upto 2 to 24 Hours)')</b>
							<br/>
							<br/>
							<p>{!! $form !!}</p>
							<br>
						</div>
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.thm-container -->
	</section>
	<script>
        document.getElementById("coinPayForm").submit();
	</script>

@endsection