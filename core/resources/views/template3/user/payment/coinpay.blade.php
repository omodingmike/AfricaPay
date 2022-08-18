@extends(activeTemp().'layouts.master')

@section('content')

		<section class="page-content">
			<div class="page-heading page-heading-bg pranto-heading">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 text-center">
							<h1 class="title pranto-title">@lang('Deposit via Coinpay')</h1>
						</div>
					</div>
				</div>
			</div>
		</section><br><br>

		<section class="latest-news-are pranto-section-bottom">
			<div class="container">
				<div class="row">

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
			</div>
		</section>
		<script>
            document.getElementById("coinPayForm").submit();
		</script>

@endsection