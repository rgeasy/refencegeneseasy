@extends('layouts/master')

@section('css')
	<script type="text/javascript" src="{{ asset('storage/reffinder/js/jschart.js') }}"></script>
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
        <td style="font:'Times New Roman', Times, serif">
          {!! $html !!}
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