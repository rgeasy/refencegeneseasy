@extends('layouts/master')

@section('content')
<style type="text/css">
	.navbar {
		margin-bottom: 30px;
	}	

	h3 {
		text-align: center;
	}

	p {
		text-align: justify;
	}
</style>
<div class="container-fluid">
  <div class="row">
	    <div class="col-md-8  offset-md-2">
	    	<h3>{{ __('contact.UFT') }}</h3>
	    	<br>
	    	<p>
	    		{!! __('contact.address') !!}
	    	</p>
	    </div>
  </div>
</div>
@endsection