@extends('layouts/master')


@section('content')
<br>
<div class="container-fluid">
  <div class="row">
    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1">
      <div style="padding-left: .3rem; padding-right: .3rem;">
        <form action="{{ url('/articles/') }}/{{$article->id}}" method="POST" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="form-row" >
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="name">{{ __('commons.Name') }}</label>
              <input type="text" class="form-control" name="name" value="{{$article->name}}">
            </div>
          </div>
          <div class="form-row" >
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="doi">{{ __('genes.DOI') }}</label>
              <input type="text" class="form-control" name="doi" value="{{$article->doi}}">
            </div>
          </div>
          <div class="form-row" >
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="year">{{ __('genes.Year') }}</label>
              <input type="text" class="form-control" name="year" value="{{$article->year}}">
            </div>
          </div>
          <div class="form-row" >
            <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <label for="author">{{ __('commons.Authors') }}</label>
              <input type="text" class="form-control" name="author" value="{{$article->author}}">
            </div>
          </div>
          <div class="form-group form-check col-lg-2 col-md-2 col-sm-3" style='padding-left: 1.3rem;'>
              <input type="checkbox" class="form-check-input" name="active" @if($article->active === 1) checked @endif>
              <label class="form-check-label" for="active">{{ __('commons.Activate')}}</label>
          </div>
            <button type="submit" class="btn btn-success btn-lg btn-block"
             id="#">{{ __('commons.Update') }}</button>
          </div>
          <br>
          <br>
        </form>


        <h4 class="text-center">Genes</h4>

        <table  align='center' border="0" width="950px">
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
        </table>

        <h4 class="text-center">{{ __('commons.Samples') }}</h4>
        
        <?php //dd($samples); ?>
        <div class="table-responsive">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Samples</th>
                @foreach($genes as $gene)
                  <th>{{$gene->name}}</th>
                @endforeach
              </tr>
            </thead>
            <tbody>
              @foreach($samples[0] as $sample)
                <?php $sample_array = explode(" ", $sample['values']); ?>
                <tr>
                @for($i = 0; $i < count($sample_array); $i++)
                  <td>{{str_replace("_", " ", $sample_array[$i])}}</td>
                @endfor
                <tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</div>




@endsection

