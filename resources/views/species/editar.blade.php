@extends('layouts/master')

@section('css')
  <style type="text/css">
    .card {
      margin: .5rem 0rem;
    }
  </style>
@endsection

@section('content') 
<br>

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1">
      <p style="text-align: center;"><b >{{ __('home.edit species') }}</b></p>
      @foreach($species as $specie)
        <div class="ct">
          <div class="card" width="100%">
            <a href="{{ URL::to('species/'.$specie->id.'/edit') }}">
              <div style="text-align: left;">
                @if(isset($specie->realpath))
                  <img src="{{ asset( $specie->realpath ) }}">
                @else
                  <img src="https://via.placeholder.com/75">
                @endif
                {{ ucfirst($specie->name) }} 
              </div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

@endsection
