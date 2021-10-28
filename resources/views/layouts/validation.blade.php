@if ($errors->any())
<br>
<style type="text/css">
	.error_ul{
		list-style-type: none;
	}

	@media only screen and (max-width: 420px) {
		.error_ul{
			padding: 0px;
		}
	}
</style>
<div class="container-fluid">
	
		<div class="row">
			<div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1">
				<div style="padding-left: .3rem; padding-right: .3rem;">
					<ul class="error_ul">
						@foreach ($errors->all() as $error)
							<li class="alert alert-danger">{!! $error !!}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		
</div>
@endif
