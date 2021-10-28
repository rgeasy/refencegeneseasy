
@extends('layouts/master')

@section('content')
	<div class="container-fluid" style="margin-top: 5%;">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h4 style="text-align: center;">{{__('commons.Hello') }}, {{ $name }}.</h4>
			</div>
		</div>
	</div>
@endsection

