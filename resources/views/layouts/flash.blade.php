@if(session('message'))
    <div id="flash-message" class="alert alert-success" role="alert" style="text-align: center;">
        <p>{{ session('message') }}</p>
    </div>
<script type="text/javascript">
	setTimeout(function(){
		var flash = document.getElementById('flash-message');
		flash.style.display = 'none';
	},3000);
	
</script>
@endif