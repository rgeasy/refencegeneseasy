@extends('layouts/master')

@section('css')
	<style type="text/css">
		.card {
			margin: .5rem 0rem;
		}
	</style>
@endsection

@section('content')

<div class="container-fluid">
  <div class="row div-forms">
	    <div class="col-md-4 ct" style="text-align: center;">
	    	<b>{{ __('commons.Animal') }}</b>
	    	<br>
	    	@foreach($animals as $animal)
			<div class="card" width="100%" >
				<a href="{{ URL::to('species/'.$animal->id) }}">
					<div style="text-align: left;">
						@if(isset($animal->realpath))
							<img src="{{ $animal->realpath }}">
						@else
							<img src="https://via.placeholder.com/75">
						@endif
						{{ ucfirst($animal->name) }} 
					</div>
				</a>
			</div>
			@endforeach
	    </div>
	    <div class="col-md-4 ct" style="text-align: center;">
	    	<b>{{ __('commons.Vegetable') }}</b> 
	    	<br> 		
			@foreach($vegetables as $vegetable)
			<div class="card" width="100%">
				<a href="{{ URL::to('species/'.$vegetable->id) }}">
					<div style="text-align: left;">
						@if(isset($vegetable->realpath))
							<img src="{{ $vegetable->realpath }}">
						@else
							<img src="https://via.placeholder.com/75">
						@endif
						{{ ucfirst($vegetable->name) }}
					</div>
				</a>
			</div>
			@endforeach
	    </div>
	    <div class="col-md-4 ct" style="text-align: center;">
	    	<b>{{ __('commons.Microorganism') }}</b>
	    	<br>
	    	@foreach($microorganisms as $microorganism)
			<div class="card" width="100%" >
				<a href="{{ URL::to('species/'.$microorganism->id) }}">
					<div style="text-align: left;">
						@if(isset($microorganism->realpath))
							<img src="{{ $microorganism->realpath }}">
						@else
							<img src="https://via.placeholder.com/75">
						@endif
						{{ ucfirst($microorganism->name) }}
					</div>
				</a>
			</div>
			@endforeach
	    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
	    <div class="col">

	    </div>
  </div>
</div>

@endsection

