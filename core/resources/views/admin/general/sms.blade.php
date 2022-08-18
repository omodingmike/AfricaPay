@extends('admin.layout.master')

@section('body')
	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title ">SMS Template</h3>
				<div class="tile-body">
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<thead>
							<tr>
								<th> # </th>
								<th> CODE </th>
								<th> DESCRIPTION </th>
							</tr>
							</thead>
							<tbody>


							<tr>
								<td> 1 </td>
								<td> <pre>&#123;&#123;message&#125;&#125;</pre> </td>
								<td> Details Text From Script</td>
							</tr>

							<tr>
								<td> 2 </td>
								<td> <pre>&#123;&#123;number&#125;&#125;</pre> </td>
								<td> Users Number. Will Pull From Database</td>
							</tr>



							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="tile">
				<h3 class="tile-title ">SMS API</h3>
				<div class="tile-body">
					<form role="form" method="POST" action="{{route('general.store')}}" >
						{{ csrf_field() }}
						<div class="form-body">
							<div class="form-group">
								<input type="text" name="smsapi" id="smsapi" class="form-control" value="{{$general->smsapi}}">
							</div>
						</div>
							<button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>

					</form>
				</div>
			</div>
		</div>
	</div>










	
	@endsection

@section('js')
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">
        new nicEditor().panelInstance('smsapi');
	</script>
@stop
