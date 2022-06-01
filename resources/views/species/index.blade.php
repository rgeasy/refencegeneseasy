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
							{{ ucfirst($animal->name) }} {{$animal->index}}
						</div>
					</a>
				</div>
			@endforeach
			@if($animals->hasPages())
				<div class="d-flex justify-content-center">
					<a href="#link" class="btn btn-secondary btn-lg btn-block" role="button">Full List</a>
				</div >
			@endif
			<!--div class="d-flex justify-content-center">{!! $animals->links() !!}</div -->
	    </div>
	    <div class="col-md-4 ct" style="text-align: center;">
	    	<b>{{ __('commons.Vegetable') }}</b> 
	    	<br> 		
			@foreach($vegetables as $vegetable)
			<div class="card" width="100%">
				<div class="row">
					<div class="col-md-9 col-sm-12">
						<a href="{{ URL::to('species/'.$vegetable->id) }}" style="display: inline;">
							<div style="float: left;">
								@if(isset($vegetable->realpath))
									<img src="{{ $vegetable->realpath }}">
								@else
									<img src="https://via.placeholder.com/75">
								@endif
								{{ ucfirst($vegetable->name) }}
							</div>
						</a>
					</div>
					<!--div class="col-md-1 col-sm-1" style="width: 100%; height: 100%; padding-left: 0px; padding-top: 25px;">
						<a href="{{ URL::to('species/'.$vegetable->id.'/edit') }}">
							@include('partials.editIcon')
						</a>
					</div>
					<div class="col-md-1 col-sm-1" style="width: 100%; height: 100%; padding-left: 0px; padding-top: 18px;">
						<form action="{{ URL::to('species/'.$vegetable->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn">
								@include('partials.trashIcon')
							</button>
						</form>
					</div-->
				</div>

			</div>
			@endforeach
			@if($vegetables->hasPages())
			<div class="d-flex justify-content-center">
				<a href="#link" class="btn btn-secondary btn-lg btn-block" role="button">Full List</a>
			</div >
		@endif
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
			@if($microorganisms->hasPages())
			<div class="d-flex justify-content-center">
				<a href="#link" class="btn btn-secondary btn-lg btn-block" role="button">Full List</a>
			</div >
		@endif
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

