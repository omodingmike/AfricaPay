@extends(activeTemp().'layouts.master')
@section('content')
	<!-- page title begin-->
	<div class="page-title">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6 col-lg-6">
					<h2 class="extra-margin">@lang('Deposit via Coinpay')</h2>

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
							<h3 class="panel-title text-center">@lang('Confirm Buy') </h3>
						</div>

						<div class="card-body text-center">

							<div  class="col-md-8 offset-md-2 text-center">
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
				</div>
			</div>
		</div>
	</div>
	<script>
        document.getElementById("coinPayForm").submit();
	</script>
@endsection