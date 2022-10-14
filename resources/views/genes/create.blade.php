@extends('layouts/master')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-select.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-tagsinput.css') }}">

  <link rel="stylesheet" type="text/css" href="{{ asset('/css/genes.create.css') }}">

  <style>
@media screen and (min-width: 768px) {
  label[for=img], label[for=file]{
    margin-left: .5rem;
  }
}
  </style>
@endsection

@section('content')
<br>

<div class="container-fluid">
  <div class="row">
    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1">
      <div style="padding-left: .3rem; padding-right: .3rem;">
        <form id="form-new-species" action="{{ url('/species') }}" method="POST"  enctype="multipart/form-data"> <!-- Tem que ser aqui para centralizar corretamente. -->
          @csrf
          <div class="form-row" >
            <div class="form-group col-lg-1 col-md-2 col-sm-3">
               <img id="show-image" src="" width="75" height="75"/>
            </div>
            <div class="form-group col-lg-3 col-md-4 col-sm-10 col-12">
              <label for="img">{{ __('genes.File') }}</label>
              <label for="file"  class="btn btn-secondary">{{__('genes.Image Input Text')}}</label>  
              <input type="file" class="form-control-file" name="file" id="file" 
                    onchange="readURL(this);" style="display:none">
            </div>
            <div class="form-group col-lg-8">
              <div class="form-row justify-content-center">
                <label for="tipo">{{__('species.Choose Species')}}</label><br>
              </div>
              <div class="form-row justify-content-center">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="tipo" value="1">
                  <label class="form-check-label" for="animal">{{__('commons.Animal')}}</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="tipo" value="2">
                  <label class="form-check-label" for="vegetable">{{ __('commons.Vegetable') }}</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="tipo" value="3">
                  <label class="form-check-label" for="microorganism">{{ __('commons.Microorganism') }}</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-row" >
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="image_citation">{{ __('genes.Add Image Link') }}</label><br>
              <input type="text" class="form-control" value="" name="image_citation" id="image_citation"  placeholder="{{__('genes.Not Mandatory Field')}}"/>
            </div>
          </div>  
          <br>
          <div class="form-row" >
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="artigo">{{ __('genes.Add the Species Here:') }}</label><br>
              <input type="text" class="form-control" value="" data-role="tagsinput" id="species-tag-input"/>
            </div>
          </div>
          <div class="form-row" >
            <div class="form-group col-lg-7 col-md-12 col-sm-12">
              <label for="article">{{ __('commons.Article') }}</label>
              <input type="text" class="form-control" name="article">
            </div>
            <div class="form-group col-lg-3 col-md-12 col-sm-12">
              <label for="doi">{{ __('genes.DOI') }}</label>
              <input type="text" class="form-control" name="doi" placeholder="10.1007/s11240-016-1147-6">
            </div>
            <div class="form-group col-lg-2 col-md-12 col-sm-12">
              <label for="year">{{ __('genes.Year') }}</label>
              <input type="text" class="form-control" name="year" placeholder="2015">
            </div>
          </div>
          <div class="form-row" >
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="authors">{{ __('commons.Authors') }}</label>
              <input type="text" class="form-control" name="authors">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-sm-12">
                <label for="area">{{ __('genes.Cq Values') }}</label>
                <textarea id="cq_area" name="cq_area" rows="4" cols="50" class="form-control">
                </textarea>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-sm-12">
                <label for="gene_area">{{ __('genes.Reference Genes Information') }}</label>
                <textarea id="gene_area" name="gene_area" rows="4" cols="50" class="form-control">
                </textarea>
            </div>
          </div>

          <button type="button" class="btn btn-success btn-lg btn-block" id="generateRG">{{ __('genes.Generate Table') }}</button>
          <br>
        </form>
      </div>
    </div>
  </div>

  <div class="row">
  </div>

</div>

@endsection

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="{{ asset('/js/genes/Gene.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/paper/register.js') }}"></script>

<script type="text/javascript">
    var locale = '{{ config('app.locale') }}';
   /**
   * Main application element, simply registers the web components
   */
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
