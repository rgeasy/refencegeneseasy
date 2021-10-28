@extends('layouts/master')

@section('css')
	<style type="text/css">
		.card {
			margin: .5rem 0rem;
		}

        .card:hover {
            cursor: grab;
        }

        .bloco:hover{
            backgrond-color: rgb(19, 63, 59);
            opacity: 75%;
        }
	</style>
@endsection

@section('content')

<div class="container-fluid">
  <div class="row div-forms">
	    <div class="col-md-12 ct" style="text-align: center;">
	    	<b>{{ __('commons.Articles') }}</b>
	    	<br>
            @foreach($articles as $article)
                <div class="row">
                    <div class="col-md-8 offset-md-2 ct">
                        <div class="card bloco" width="100%" id="{{$article->id}}"  onclick="sure({{$article->id}})">
                            <div style="text-align: center; height: 75px; padding-top: 25px; background-color: gray;">
                                {{ ucfirst($article->name) }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function sure(id)
    {
        (async function(){
            const res = await Swal.fire({
            title: "{{ __('species.Are You Sure') }}",
            showDenyButton: true,
            confirmButtonText: `{{ __('commons.Activate') }}`,
            denyButtonText: `{{ __('commons.Cancel') }}`,
            }).then((res) => {
                /* Read more about isConfirmed, isDenied below */
                if (res.isConfirmed)
                {
                    $.ajax({
                        type: "POST",
                        url: `{{ url('/articles') }}/activate`,
                        data: { 'id' : id, '_token' : "{{ csrf_token() }}"},
                        dataType: 'JSON',
                    }).done(function(result){
                        Swal.fire("{{ __('species.Successfully Activated')}}", '', 'success');
                        setTimeout(()=> {window.location = "{{url('/species')}}";}, 2500);
                    }).fail(function(result)
                    {
                        Swal.fire("{{ __('species.Not Activated')}}",'','error');
                    });

                } else if (res.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info');
                }
            });
        })()
    }

</script>
@endsection
