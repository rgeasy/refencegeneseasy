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
	    	<h3>{!! __('about.LAM') !!}</h3>
	    	<p>
	    		{{ __('about.LAM_text') }}
	    	</p>
	    </div>
	</div>
	<div class="row">
	    <div class="col-md-8  offset-md-2">
	    	<h3>{{ __('about.LFMP') }}</h3>
	    	<p>
	    		{{ __('about.LFMP_text') }}
	    	</p>
	    </div>
  	</div>
</div>
@endsection

