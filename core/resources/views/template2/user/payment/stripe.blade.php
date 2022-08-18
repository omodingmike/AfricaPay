@extends(activeTemp().'layouts.master')


@section('style')

	<style>
		.credit-card-box .form-control.error {
			border-color: red;
			outline: 0;
			box-shadow: inset 0 1px 1px rgba(0,0,0,0.075),0 0 8px rgba(255,0,0,0.6);
		}
		.credit-card-box label.error {
			font-weight: bold;
			color: red;
			padding: 2px 8px;
			margin-top: 2px;
		}
		.error{
			color: red;
		}
		.well{
			background: #202d3a;
		}
		.form-control, .fileinput .thumbnail {
			/*background: #202d3a;*/
			color: #1a0000;
		}
		hr{
			border-color: #329f86;
		}
		.form-control, .input-group-addon{
			border: 1px solid #329f86;
			padding: 5px;
		}
		.stripe-details{
			margin-top: 20px !important;
		}
	</style>
@stop

@section('content')


		<section class="tools-section" style="padding-bottom: 110px;">
			<div class="thm-container">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="tools-content pranto-bread">
							<h3>@lang('Stripe Payment')</h3>
						</div><!-- /.tools-content -->
					</div><!-- /.col-md-6 -->

				</div><!-- /.row -->
			</div><!-- /.thm-container -->
		</section>

		<section class="team-section sec-pad">
			<div class="thm-container">

				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="card">
							<h1 class="text-center text-color">@lang('Stripe Payment')</h1>
							<hr/>
							<div class="card-body">
								<div class="row ">
									<div class="col-xs-12 mx-auto">
										<div class="card-wrapper"></div>
									</div>
								</div>
								<form role="form" class="form-horizontal" id="payment-form" method="POST" action="{{ route('ipn.stripe')}}" >
									{{csrf_field()}}

									<input type="hidden" value="{{ $track }}" name="track">

									<div class="row stripe-details">
										<div class="col-xs-6 col-md-6">
											<div class="form-group" style="margin-right: 5px;">
												<label for="name" class="text-color">@lang('CARD HOLDER NAME')</label>
												<div class="input-group">
													<input
															type="text"
															class="form-control input-lg"
															name="name"
															placeholder="@lang('Card Name')"
															autocomplete="off"
													/>
													<span class="input-group-addon"><i class="fa fa-font"></i></span>
												</div>
											</div>
										</div>

										<div class="col-xs-6 col-md-6">
											<div class="form-group">
												<label for="cardNumber" class="text-color">@lang('CARD NUMBER')</label>
												<div class="input-group">
													<input
															type="tel"
															class="form-control input-lg"
															name="cardNumber"
															placeholder="@lang('Valid Card Number')"
															autocomplete="off"
															required
													/>
													<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
												</div>
											</div>
										</div>
									</div>
									<br>

									<div class="row">
										<div class="col-xs-7 col-md-7">
											<div class="form-group" style="margin-right: 5px;">
												<label for="cardExpiry" class="text-color">@lang('EXPIRATION DATE')</label>
												<input
														type="tel"
														class="form-control input-lg input-sz"
														name="cardExpiry"
														placeholder="@lang('MM / YYYY')"
														autocomplete="off"
														required
												/>
											</div>
										</div>
										<div class="col-xs-5 col-md-5">
											<div class="form-group">
												<label for="cardCVC" class="text-color">@lang('CVC CODE')</label>
												<input
														type="tel"
														class="form-control input-lg input-sz"
														name="cardCVC"
														placeholder="@lang('CVC')"
														autocomplete="off"
														required
												/>
											</div>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-xs-12">
											<button class="btn btn-success btn-lg btn-block login-button" type="submit"> @lang('PAY NOW') </button>
										</div>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div><!-- /.row -->

			</div><!-- /.thm-container -->
		</section>


@endsection
@section('script')
	<script type="text/javascript" src="{{url('/')}}/assets/front/js/stripe-design.js"></script>
	<script>
        (function ($) {
            $(document).ready(function () {
                var card = new Card({
                    form: '#payment-form',
                    container: '.card-wrapper',
                    formSelectors: {
                        numberInput: 'input[name="cardNumber"]',
                        expiryInput: 'input[name="cardExpiry"]',
                        cvcInput: 'input[name="cardCVC"]',
                        nameInput: 'input[name="name"]'
                    }
                });
            });
        })(jQuery);
	</script>
@stop



