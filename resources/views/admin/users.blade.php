@extends('layouts/master')

@section('css')
	<style type="text/css">

	</style>
@endsection

@section('content')

<div class="container-fluid">
  <div class="row div-forms">
	    <div class="col-md-12" style="text-align: center;">
            <h5>Administração de Usuários</h5>
            <table width="100%" border="1px solid black">
                <tr><th>Usuários</th></tr>
                @foreach ($users as $user)
                    <tr><td><a href="{{ URL::to('admin/users/'.$user->id.'/edit') }}">{{$user->name}}</a></td></tr>
                @endforeach
            </table> 
            <br>
            <div class="d-flex justify-content-center">{!! $users->links() !!}</div>
            <table width="100%" border="1px solid black">
                <tr><th>Admin</th></tr>
                @foreach ($admins as $admin)
                    <tr><td><a href="{{ URL::to('admin/users/'.$admin->id.'/edit') }}"">{{$admin->name}}</a></td></tr>
                @endforeach
            </table>
	    </div>
        <div class="col-md-8" style="text-align: center;">
            <h5>Espécies</h5>
            <table width="100%" border="1px solid black">
                <tr><th>Espécies</th></tr>
                @foreach ($species as $specie)
                    <tr><td><a href="{{ URL::to('admin/users/'.$specie->id.'/edit') }}"">{{$specie->name}}</a></td></tr>
                @endforeach
            </table>
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
<script>

</script>
@endsection
