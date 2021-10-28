@extends('layouts/master')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-select.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/genes.create.css') }}">
@endsection

@section('content')
<br>

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1">
      <div style="padding-left: .3rem; padding-right: .3rem;">
        <form id="form-new-species" action="{{ url('/species/') }}/{{$species->id}}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="form-row" >
            <div class="form-group col-lg-1 col-md-2 col-sm-3">
               <img id="show-image" src="{{asset($species->realpath)}}" width="75" height="75"/>
            </div>
            <div class="form-group col-lg-2 col-md-2 col-sm-3">
              <label for="doi">{{ __('genes.ArticleFile') }}</label>
              <input type="file" class="form-control-file" name="file" id="file" onchange="readURL(this);">
            </div>
          </div>
          <div class="form-row" >
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="name">{{ __('commons.Name') }}</label>
              <input type="text" class="form-control" name="name" value="{{$species->name}}">
            </div>
          </div>
            @can('edit species')
                <div class="form-group form-check col-lg-2 col-md-2 col-sm-3" style='padding-left: 1.3rem;'>
                    <input type="checkbox" class="form-check-input" name="active">
                    <label class="form-check-label" for="active">{{ __('species.Active')}}</label>
                </div>
            @endcan
          <div class="form-row" >
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for='tipo'>Espécie:</label>
              <select name="tipo" class='form-control' required>
				<option value="-1">{{ __('species.Type') }}</option>
				<option value='1' @if($species->tipo == 1) selected @endif>{{ __('commons.Animal') }}</option>
				<option value='2' @if($species->tipo == 2) selected @endif>{{ __('commons.Vegetable') }}</option>
				<option value='3' @if($species->tipo == 3) selected @endif>{{ __('commons.Microorganism') }}</option>
			  </select>
            </div>
          </div>
            <button type="submit" class="btn btn-success btn-lg btn-block"
             id="#">{{ __('commons.Update') }}</button>
          </div>
          <br>
          <br>
        </form>
      </div>
    </div>
  </div>


</div>




@endsection

@section('js')

<script type="text/javascript">

function readURL(input)
{
    if (input.files && input.files[0])
    {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#show-image')
                .attr('src', e.target.result)
                .width(75)
                .height(75);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


</script>
@endsection
