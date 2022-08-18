@extends(activeTemp().'layouts.master')

@section('content')

		<div class="hyip-breadcrump" style="background-image: url({{asset('assets/images/bred.jpg')}}); background-size: cover;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xl-8 col-lg-8">
						<div class="breadcrump-title text-center">
							<h2 class="add-space">@lang('Deposit via') {{__($pt)}}</h2>
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
								<h3 class="text-color"> @lang('PLEASE SEND EXACTLY') <b style="color: green"> {{ $bcoin }}</b> @lang('DOGE')</h3>
								<h4 class="text-color">@lang('TO') <b style="color: green"> {{ $wallet}}</b></h4>
								{!! $qrurl !!}
								<h3 class="text-color" style="font-weight:bold;">@lang('SCAN TO SEND')</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection