@extends('layouts/master')

@section('content') 
<br>
<?php
//{{asset($samples[$i][0]->eagle_article->pdf)}}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1">
 
  @for ($i = 0; $i < sizeof($samples); $i++)
  <div id="accordion{{$i}}">
  <div class="card">
    <div class="card-header">
      <a class="card-link" data-toggle="collapse" href="#collapse{{$i}}">
        
        <a href="https://doi.org/{{$samples[$i][0]->doi}}" target="_blank"><span style="color: red;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> </span>{{ $samples[$i][0]->article_name }}</a><br>
      </a>
    </div>
    <div id="collapse{{$i}}" class="collapse show" data-parent="#accordion{{$i}}"  >
      <div class="card-body">
      	<form action="{{ url('reffinder') }}" method="POST">
      	@csrf
        @foreach ($samples[$i] as $sample)
        	<div class="form-check form-check-inline">
   			  <input type="hidden" name="article" value="{{$sample->article}}" />
			  <input class="form-check-input" type="checkbox" name="checkbox_{{$sample->name}}" value="op{{$sample->name}}">
			  <label class="form-check-label col-form-label col-form-label-lg" for="checkbox_{{$sample->name}}">{{ str_replace("__"," ",$sample->name) }}</label>
			</div>
        @endforeach
        <button type="submit" class="btn btn-success btn-lg btn-block" >Run Reffinder</button>
        </form>
      </div>
    </div>
  </div>
  </div> 
  @endfor

    </div>
  </div>
</div>

@endsection
