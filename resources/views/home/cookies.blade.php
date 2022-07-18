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
		text-align: center;
	}
</style>
<div class="container-fluid">
  	<div class="row">
	    <div class="col-md-6  offset-md-3">
	    	<h3>{!! __('home.cookies_policy') !!}</h3>
	    	<p>
	    		{!! __('home.cookies_policy_text_whats_a_cookie') !!}
	    	</p>
			<p>
	    		{!! __('home.cookies_policy_text_why_do_we_use_it') !!}
	    	</p>
			<p>
	    		{!! __('home.cookies_policy_text_session') !!}
	    	</p>
			<p>
	    		{!! __('home.cookies_policy_text_persistent') !!}
	    	</p>
	    </div>
	</div>
</div>
@endsection
