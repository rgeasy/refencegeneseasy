@extends('layouts/master')

@section('css')
	<style type="text/css">

	</style>
@endsection

@section('content')

<div class="container-fluid">
    <div class="row div-forms">
        <div class="col-md-3" style="height: 100%;">
            <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                <a class="nav-link bg-dark text-white" href="" role="tab" style="text-align: center;" aria-selected="true">Admins</a>
            </div>
            <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                <a class="nav-link" href="{{ URL::to('admin') }}" role="tab" aria-controls="" aria-selected="false">Usuários</a>
                <a class="nav-link" href="{{ URL::to('admin/species') }}" role="tab" aria-controls="" aria-selected="false">Espécies</a>
                <a class="nav-link" href="{{ URL::to('admin/articles') }}" role="tab" aria-controls="" aria-selected="false">Artigos</a>
            </div>
        </div>
	    <div class="col-md-9" style="height: 100%; text-align: center;">
            <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                <a class="nav-link bg-dark text-white" href="#" aria-selected="true">Administração de Espécies 
                    <span style="float: right;"><input placeholder="Buscar" onkeyup="filter()" id="filtro" /></span></a>
            </div>
            <br>
            <table width="100%" border="1px solid black">
                <tr><th>Artigos</th></tr>
                @foreach ($articles as $article)
                    <tr><td><a href="{{ URL::to('admin/article/'.$article->id.'/edit') }}">{{$article->name}}</a>@if($article->active === 0) (Inativo) @endif</td></tr>
                @endforeach
            </table>
            <br>
            <div class="d-flex justify-content-center">{!! $articles->links() !!}</div>
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

@section('js')
<script type="text/javascript">

    function filter()
    {
        var input, filter, table, tr, td, i,txtValue;
        input = document.getElementById("filtro");
        filter = input.value.toUpperCase()  ;
        table = document.getElementById("tabela");
        tr = document.getElementsByTagName("tr");

        for(i=0;i<tr.length;i++)
        {
            td = tr[i].getElementsByTagName("td")[0];
            if(td)
            {
                txtValue = td.textContent || td.innerText;
                if(txtValue.toUpperCase().indexOf(filter) > -1)
                {
                    tr[i].style.display = "";
                }else
                {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
@endsection
