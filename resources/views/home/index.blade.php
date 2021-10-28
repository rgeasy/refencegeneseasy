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
	    	<h3>{!! __('home.Who_developed') !!}</h3>
	    	<p>
	    		{{ __('home.Who_developed_text') }}
	    	</p>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-8  offset-md-2">
	    	<h3>{{ __('home.What_does_it_do') }}</h3>
	    	<p>
	    		{{ __('home.What_does_it_do_text') }}
	    	</p>
	    </div>
  	</div>
	<div class="row">
	    <div class="col-md-8  offset-md-2">
	    	<h3>{{ __('commons.Manual') }}</h3>
	    	<p style="text-align: center;">
	    		<a href="{{ url('/') }}/files/Manual de instruções.pdf" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> </span>Manual</a>
	    	</p>
	    </div>
  	</div>
</div>
@endsection
