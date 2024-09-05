@extends('layouts/master')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/genes.create.css') }}">
	<script type="text/javascript" src="{{ asset('/vendor/reffinder/js/jschart.js') }}"></script>
  <style type="text/css">
    .navbar-light .navbar-nav .nav-link{
      font-size: initial;
    }
  </style>  
@endsection

@section('content')

<br>

<div class="container-fluid">
  <div class="row div-forms">
    <div class="col-md-10 offset-md-1">

    </div>
  </div>


<div id="fragment-3">
  <form name="blast" method="post" action="?type=reference">
    <table  align='center' border="0" width="950px">
      <tr>
        <td>
          <h5 align="center">{{ __('reffinder.Result Obtained by the New Samples Combination') }}:</h5>
        </td>
      </tr>
      <br>
      <tr>
        <td style="font:'Times New Roman', Times, serif">
          {!! $html !!}
        </td>
      </tr>
    </table>

    <table  align='center' border="0" width="950px">
      <tr>
        <td>
          <h5 align="center">{{ __('reffinder.General Information About the Genes') }}:</h5>
        </td>
      </tr>
      <br>
      <tr>
        <td>
          <div id="geneCards" width="100%">
           @foreach ($genes as $key => $gene)
            @if(intval($key+1) % 2)
             <div style="display: flex; flex-direction: row; flex-wrap: wrap; width: 100%;">
            @endif
              <div style="display: flex; flex-basis: 50%; padding: .3rem;">

                <div class='card border-secondary mb-3' style="min-width: 450px;">
                  <div class='card-header'>
                      <div class='form-group col-lg-6 col-md-6 col-sm-6'>
                      <label for='select_gene' style='padding-top: 8px;'>Gene: <b>{{$gene->name}}</b></label>
                    </div>

                  </div><!-- end card-header -->
                  <div class='card-body text-secondary'>
                    <div class='row'>
                      <div class='form-group col-lg-6 col-md-6 col-sm-6'>
                        <label for='primer_forward'>{{ __('reffinder.Primer Sequence (Forward)') }}</label><br>
                        <label for='primer_forward'><b>{{$gene->primer_forward}}</b></label>
                      </div>
                      <div class='form-group col-lg-6 col-md-6 col-sm-6'>
                        <label for='primer_reverse'>{{ __('reffinder.Primer Sequence (Reverse)') }}</label><br>
                        <label for='primer_reverse'><b>{{$gene->primer_reverse}}</b></label>
                      </div>
                    </div><!-- end row -->
                    <div class='row'>
                      <div class='form-group col-lg-4 col-md-4 col-sm-6'>
                        <label>R2</label><br>
                        <label><b>{{$gene->r2}}</b></label>
                      </div>
                      <div class='form-group col-lg-3 col-md-3 col-sm-6'>
                        <label>
                          <span data-tooltip='Overall Stability Value'>
                            e*
                          </span>
                        </label><br>
                        <label><b>{{$gene->e}}</b></label>
                      </div>
                      <div class='form-group col-lg-5 col-md-5 col-sm-6'>
                        <label>Accession n</label><br>
                        <label><b>{{$gene->accession}}</b></label>
                      </div>
                    </div>
                    <div class='row'>
                      <div class='form-group col-lg-12 col-md-12 col-sm-12'>
                        <label>{{ __('reffinder.Bank') }}</label><br>
                        <label><b>{{$gene->bank}}</b></label>
                      </div>
                    </div><!-- end row -->
                  </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            @if(intval($key+1)%2 == 0)
             </div>
            @endif
          @endforeach
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <h5>{{ __('reffinder.How to Cite') }}</h5>
          <p>
            {{ trans('reffinder.Tool Phrase', ['author' => ucfirst($article->author)." (".$article->year.")"]) }}
          </p>
          <h5>{{ __('reffinder.References') }}:</h5>
          <ul>
            <li><a href="#">Reference Genes Easy</a></li>
            <li><a target="_blank" href="https://pubmed.ncbi.nlm.nih.gov/22290409/">RefFinder (XIE et al., 2012)</a></li>
            <li><a target="_blank" href="https://pubmed.ncbi.nlm.nih.gov/37060478/">RefFinder (XIE et al., 2023)</a></li>
            <li><a target="_blank" href="https://doi.org/{{$article->doi}}">{{ $article->name }}</a></li>
          </ul>
        </td>
      </tr>
    </table>
  </form>
</div>


@endsection

@section('js')

  <script type="text/javascript">

      $(function() {
        $('#tabs' ).tabs().find( '.ui-tabs-nav' ).sortable({ axis: 'x' });
      });

      $('#bestkeeper tr, #deltaCT tr, #normfinderTable tr, #GenormdetectTable tr, #comRNAking tr').hover(
        function(){
        $(this).addClass('detailedESThover');
        },
        function(){
        $(this).removeClass('detailedESThover');
        }
      );

      $('#detactAnchor').click(function(){
      var $tabs = $('#tabs').tabs();
       $tabs.tabs('select', 1);
        return false;
      });

      $('#bestkeeperAnchor').click(function(){
      var $tabs = $('#tabs').tabs();
       $tabs.tabs('select', 2);
        return false;
      });

      $('#normdetect').click(function(){
      var $tabs = $('#tabs').tabs();
       $tabs.tabs('select',3);
        return false;
      });

      $('#Genormdetect').click(function(){
      var $tabs = $('#tabs').tabs();
       $tabs.tabs('select', 4);
        return false;
      });

      $('#comprehensiveRank').click(function(){
      var $tabs = $('#tabs').tabs();
       $tabs.tabs('select', 0);
        return false;
      });
  </script>
@endsection
